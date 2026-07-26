<?php

namespace App\Repositories\Eloquent;

use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
use App\Models\Student;
use App\Models\User;
use App\Services\CourseEnrollmentCheckoutService;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(
        private readonly CourseEnrollmentCheckoutService $checkoutService,
    ) {}

    public function paginate(int $perPage = 25): LengthAwarePaginator
    {
        return Student::query()
            ->with([
                'user.roles:id,name',
                'user.primaryRole:id,name',
                'courses:id,name',
            ])
            ->latest()
            ->paginate($perPage);
    }

    public function all(): Collection
    {
        return User::query()
            ->with('roles:id,name', 'primaryRole:id,name', 'student.courses:id,name')
            ->where('primary_role_id', '=', 4)
            ->latest()
            ->get();
    }

    public function create(array $data): Student
    {
        $enrollment = $this->checkoutService->checkout($data);

        return $enrollment->student->load(
            'user.roles',
            'user.primaryRole',
            'courses',
            'enrollments.slot.course',
            'enrollments.slot.trainingCenter'
        );
    }

    public function update(User $user, array $data): User
    {
        return DB::transaction(function () use ($user, $data): User {
            $user->fill([
                'name' => trim($data['first_name'] . ' ' . $data['last_name']),
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);

            if ($user->isDirty()) {
                $user->save();
            }

            $user->loadMissing('student');

            if (! $user->student) {
                return $user->fresh();
            }

            $student = $user->student;
            $student->update([
                'date_of_birth' => $data['date_of_birth'],
                'usi' => $data['usi'],
            ]);

            $courseId = (int) $data['course_id'];
            $slot = CourseSlot::query()
                ->with('course')
                ->findOrFail($data['slot_id']);

            abort_unless((int) $slot->course_id === $courseId, 404);

            $student->courses()->sync([$courseId]);

            $enrollment = $student->enrollments()
                ->latest('created_at')
                ->first();

            if ($enrollment) {
                $enrollment->update([
                    'course_slot_id' => $slot->id,
                ]);
            } else {
                $enrollment = Enrollment::create([
                    'student_id' => $student->id,
                    'course_slot_id' => $slot->id,
                    'status' => 'pending',
                    'enrolled_at' => now(),
                ]);
            }

            $payment = $enrollment->latestPayment ?: $enrollment->payments()->latest('created_at')->first();
            $paymentData = [
                'student_id' => $student->id,
                'payment_method' => $data['payment_method'],
            ];

            if ($payment) {
                $payment->update($paymentData);
            } else {
                $paymentData['enrollment_id'] = $enrollment->id;
                $paymentData['transaction_id'] = null;
                $paymentData['amount'] = $slot->price
                    ?? data_get($slot, 'course.sale_price')
                    ?? data_get($slot, 'course.price')
                    ?? 0;
                $paymentData['status'] = 'paid';

                $enrollment->payments()->create($paymentData);
            }

            return $user->fresh([
                'student.courses',
                'student.enrollments.slot.course',
                'student.enrollments.slot.trainingCenter',
                'student.enrollments.latestPayment',
            ]);
        });
    }

    public function delete(User $user): bool
    {
        return DB::transaction(function () use ($user): bool {
            $user->loadMissing('student');

            if ($user->student) {
                $user->student->courses()->detach();
                $user->student->coursePermissions()->delete();
                $user->student->assignmentSubmissions()->delete();
                $user->student->forceDelete();
            }

            $user->syncRoles([]);

            return (bool) $user->delete();
        });
    }
}
