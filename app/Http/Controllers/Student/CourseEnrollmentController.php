<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CourseEnrollmentController extends Controller
{
    public function create(
        Course $course,
        CourseSlot $slot
    ) {
        abort_unless(
            $slot->course_id === $course->id,
            404
        );

        $slot->load([
            'course',
            'trainingCenter',
        ]);

        return view(
            'frontend.pages.course-enrollment.create',
            compact('course', 'slot')
        );
    }

public function success(Enrollment $enrollment)
{
    $enrollment->load([
        'student.user',
        'slot.course',
        'slot.trainingCenter',
        'latestPayment',
    ]);

    return view(
        'frontend.pages.course-enrollment.success',
        compact('enrollment')
    );
}

   public function checkout(Request $request)
{
    $validated = $request->validate([
        'course_id' => ['required', 'integer', 'exists:courses,id'],
        'slot_id' => ['required', 'integer', 'exists:course_slots,id'],

        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],

        'email' => ['required', 'email', 'confirmed'],
        'phone' => ['required', 'string', 'max:50'],

        'date_of_birth' => ['required', 'date'],
        'usi' => ['required', 'string', 'max:255'],

        'payment_method' => ['required', Rule::in([
            'visa',
            'mastercard',
            'bank_transfer',
            'cash',
        ])],

        'voucher_code' => ['nullable', 'string', 'max:255'],
        'purchase_order_ref' => ['nullable', 'string', 'max:255'],
    ]);

    $enrollment = DB::transaction(function () use ($validated) {

        $course = Course::findOrFail(
            $validated['course_id']
        );

        $slot = CourseSlot::with([
            'course',
        ])->findOrFail(
            $validated['slot_id']
        );

        abort_unless(
            $slot->course_id === $course->id,
            404
        );

        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        if (auth()->check()) {

            $user = auth()->user();

        } else {

            /*
            |--------------------------------------------------------------------------
            | Existing User By Email
            |--------------------------------------------------------------------------
            */

            $user = User::where(
                'email',
                $validated['email']
            )->first();

            /*
            |--------------------------------------------------------------------------
            | Create New User
            |--------------------------------------------------------------------------
            */

            if (! $user) {

                $studentRole = Role::where(
                    'name',
                    'student'
                )->firstOrFail();

                $password = '12345678';

                $user = User::create([
                    'name' => trim(
                        $validated['first_name'].' '.$validated['last_name']
                    ),
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'status' => 'active',
                    'primary_role_id' => $studentRole->id,
                    'password' => Hash::make($password),
                ]);

                $user->assignRole($studentRole);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Update User Basic Info
        |--------------------------------------------------------------------------
        */

        $user->update([
            'name' => trim(
                $validated['first_name'].' '.$validated['last_name']
            ),
            'phone' => $validated['phone'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Student If Missing
        |--------------------------------------------------------------------------
        */

        $student = Student::firstOrCreate([
            'user_id' => $user->id,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Missing Student Information
        |--------------------------------------------------------------------------
        */

        $student->update([
            'date_of_birth' => $student->date_of_birth
                ?: $validated['date_of_birth'],

            'usi' => $student->usi
                ?: $validated['usi'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Enrollment
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Create Payment
        |--------------------------------------------------------------------------
        */

        Payment::updateOrCreate(
            [
                'enrollment_id' => $enrollment->id,
            ],
            [
                'student_id' => $student->id,

                'transaction_id' => strtoupper(
                    Str::random(12)
                ),

                'amount' => $slot->price
                    ?? $slot->course->sale_price
                    ?? $slot->course->price
                    ?? 0,

                'payment_method' => $validated['payment_method'],

                'status' => 'paid',
            ]
        );

        return $enrollment;
    });

    return redirect()->route(
        'course-enrollment.success',
        $enrollment->id
    );
}
}
