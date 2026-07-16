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
use Spatie\Permission\Models\Role;

class CourseEnrollmentController extends Controller
{
 public function create(Course $course,
    CourseSlot $slot)
    {
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
  


//    public function checkout(Request $request)
// {
//     $validated = $request->validate([
//         'course_id' => ['required', 'exists:courses,id'],
//         'slot_id' => ['required', 'exists:course_slots,id'],

//         'name' => ['required', 'string', 'max:255'],
//         'email' => ['required', 'email'],
//         'phone' => ['required', 'string'],
//     ]);

//     $course = Course::findOrFail(
//         $validated['course_id']
//     );

//     $slot = CourseSlot::with([
//         'course',
//         'trainingCenter',
//     ])->findOrFail(
//         $validated['slot_id']
//     );

//     abort_unless(
//         $slot->course_id === $course->id,
//         404
//     );

//     DB::transaction(function () use (
//         $validated,
//         $course,
//         $slot
//     ) {

//         $user = User::where(
//             'email',
//             $validated['email']
//         )->first();

//         if (! $user) {

//             $studentRole = Role::where(
//                 'name',
//                 'student'
//             )->firstOrFail();

//            $password = '12345678';

//             $user = User::create([
//                 'name' => $validated['name'],
//                 'email' => $validated['email'],
//                 'phone' => $validated['phone'],
//                 'status' => 'active',
//                 'primary_role_id' => $studentRole->id,
//                 'password' => Hash::make($password),
//             ]);

//             $user->assignRole($studentRole);

//             $student = Student::create([
//                 'user_id' => $user->id,
//             ]);

//         } else {

//             $student = Student::firstOrCreate([
//                 'user_id' => $user->id,
//             ]);
//         }

//         Enrollment::firstOrCreate(
//             [
//                 'student_id' => $student->id,
//                 'course_slot_id' => $slot->id,
//             ],
//             [
//                 'status' => 'pending',
//                 'enrolled_at' => now(),
//             ]
//         );
//     });

//     return view(
//         'frontend.pages.course-enrollment.success',
//         compact(
//             'course',
//             'slot'
//         )
//     );
// }

public function checkout(Request $request)
{
    $validated = $request->validate([
        'course_id' => ['required'],
        'slot_id' => ['required'],

        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required'],

        'payment_method' => ['required'],
    ]);

    DB::transaction(function () use ($validated) {

        $slot = CourseSlot::with('course')
            ->findOrFail(
                $validated['slot_id']
            );

        $user = User::where(
            'email',
            $validated['email']
        )->first();

        if (! $user) {

            $studentRole = Role::where(
                'name',
                'student'
            )->firstOrFail();

            $password = Str::random(8);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'status' => 'active',
                'primary_role_id' => $studentRole->id,
                'password' => Hash::make($password),
            ]);

            $user->assignRole($studentRole);
        }

        $student = Student::firstOrCreate([
            'user_id' => $user->id,
        ]);

        $enrollment = Enrollment::firstOrCreate(
            [
                'student_id' => $student->id,
                'course_slot_id' => $slot->id,
            ],
            [
                'course_version_id' => $slot->course_version_id,
                'status' => 'pending',
                'enrolled_at' => now(),
            ]
        );

        Payment::create([
            'student_id' => $student->id,

            'enrollment_id' => $enrollment->id,

            'transaction_id' => strtoupper(
                Str::random(12)
            ),

            'amount' => $slot->course->sale_price
                ?? $slot->course->price,

            'payment_method' => $validated['payment_method'],

            'status' => 'paid',
        ]);
    });

    return redirect()->route(
        'course-enrollment.success'
    );
}

}