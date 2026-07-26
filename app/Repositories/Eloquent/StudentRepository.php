<?php

namespace App\Repositories\Eloquent;

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
        $courseIds = $data['courses'] ?? null;
        $slotIds = $data['slot_ids'] ?? null;

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        unset($data['courses']);
        unset($data['slot_ids']);

        return DB::transaction(function () use ($user, $data, $courseIds, $slotIds): User {
            if (! empty($data)) {
                $user->fill($data);

                if ($user->isDirty()) {
                    $user->save();
                }
            }

            $user->loadMissing('student');

            if ($courseIds !== null && $user->student) {
                $user->student->courses()->sync($courseIds);
            }

            if (is_array($slotIds) && $user->student) {
                $this->syncSlotEnrollments($user->student, $slotIds);
            }

            return $user->fresh([
                'student.courses',
                'student.enrollments.slot.course',
                'student.enrollments.slot.trainingCenter',
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
