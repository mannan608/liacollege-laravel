<?php

namespace App\Services;

use App\Models\Course;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class CourseEnrollmentCheckoutService
{
    public function checkout(array $data, ?User $existingUser = null): Enrollment
    {
        return DB::transaction(function () use ($data, $existingUser): Enrollment {
            $course = Course::query()->findOrFail($data['course_id']);

            $slot = CourseSlot::query()
                ->with('course')
                ->findOrFail($data['slot_id']);

            abort_unless($slot->course_id === $course->id, 404);

            $user = $this->resolveUser($data, $existingUser);

            $user->update([
                'name' => trim($data['first_name'] . ' ' . $data['last_name']),
                'phone' => $data['phone'],
            ]);

            $student = Student::firstOrCreate([
                'user_id' => $user->id,
            ]);

            $student->update([
                'date_of_birth' => $student->date_of_birth ?: $data['date_of_birth'],
                'usi' => $student->usi ?: $data['usi'],
            ]);

            $enrollment = Enrollment::firstOrCreate(
                [
                    'student_id' => $student->id,
                    'course_slot_id' => $slot->id,
                ],
                [
                    'status' => 'pending',
                    'enrolled_at' => now(),
                ]
            );

            Payment::updateOrCreate(
                [
                    'enrollment_id' => $enrollment->id,
                ],
                [
                    'student_id' => $student->id,
                    'transaction_id' => strtoupper(Str::random(12)),
                    'amount' => $slot->price
                        ?? data_get($slot, 'course.sale_price')
                        ?? data_get($slot, 'course.price')
                        ?? 0,
                    'payment_method' => $data['payment_method'],
                    'status' => 'paid',
                ]
            );

            return $enrollment->load([
                'student.user',
                'slot.course',
                'slot.trainingCenter',
                'latestPayment',
            ]);
        });
    }

    private function resolveUser(array $data, ?User $existingUser): User
    {
        if ($existingUser) {
            return $existingUser;
        }

        $user = User::query()
            ->where('email', $data['email'])
            ->first();

        if ($user) {
            return $user;
        }

        $studentRole = Role::query()
            ->where('name', 'student')
            ->firstOrFail();

        $user = User::create([
            'name' => trim($data['first_name'] . ' ' . $data['last_name']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => 'active',
            'primary_role_id' => $studentRole->id,
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole($studentRole);

        return $user;
    }
}
