<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Module;
use App\Models\Document;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use HandlesFiles;
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
    return view(
        'frontend.pages.student.course-module.index',
        compact('course', 'module')
    );
}


}
