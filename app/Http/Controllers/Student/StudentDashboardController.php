<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Module;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
// use App\Models\LMS\Module;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class StudentDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();

        // return $enrollments;

        return view('frontend.pages.student.dashboard', compact('enrollments'));
    }

    public function CourseDetails(Course $course)
    {
         $course->load([
            'modules.lessons',
        ]);
        //    return $course;

        return view('frontend.pages.student.courses.show', compact('course'));
    }

    public function CourseModule(Course $course,Module $module)
{
        //    return $course;
 

    return view(
        'frontend.pages.student.course-module.index',
        compact('course', 'module')
    );
}
}
