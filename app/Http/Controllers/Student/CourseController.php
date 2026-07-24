<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function ContentModules(Request $request,Course $course)
    {
    $student = auth()->user()->student;

        $student->load([
        'courses.coursecontentcategories.sections.rows',
    ]);

    $courses = $student->courses;
    return  $courses;

        return view('student.course.module.content.index');
    }
}