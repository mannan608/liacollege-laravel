<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\CourseResources\Module;
use App\Models\Document;
use Illuminate\Http\Request;


class CourseController extends Controller
{

  public function index(Request $request)
{
     $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();

        $courseContentModule = CourseContentCategory::all();
        $courseQuizModule = Module::all();


        // return $courseQuizModule;
    return view('student.course.index', compact('enrollments','courseContentModule','courseQuizModule'));
}


    public function show(Course $course)
    {
        $course->load(['documents']);
     $courseContentModule = CourseContentCategory::all();
        $courseQuizModule = Module::all();

        //    return $course;

        return view('student.course.show', compact('course','courseContentModule','courseQuizModule'));
    }

    public function CourseQuizModule(Course $course,Module $module)
{
    return view('student.course.module.quiz.index',
        compact('course', 'module')
    );
}

public function viewlearningDocument(Document $document)
{

 $student = auth()->user()->student;
  
 abort_unless(auth()->check(), 403);
    $path = public_path($document->file);

    abort_unless(file_exists($path), 404);

    return response()->file($path);
}



    public function ContentModules(Request $request, Course $course)
    {
        $student = auth()->user()->student;

        abort_unless($student, 403);

        $course->load([
            'coursecontentcategories.sections.rows',
        ]);

        return view('student.course.module.content.index', [
            'course' => $course,
            'student' => $student,
        ]);
    }

    public function ContentModule(Request $request, Course $course,CourseContentCategory $module)
    {
        $student = auth()->user()->student;

        abort_unless($student, 403);

        // Make sure module/category belongs to this course
        // abort_unless(
        //     (int) $module->course_id === (int) $course->id,
        //     404
        // );

        // Only this module/category's sections + rows
        $module->load([
            'sections.rows',
        ]);

        return view('student.course.module.content.show', [
            'course' => $course,
            'module' => $module,
            'student' => $student,
        ]);
    }
}
