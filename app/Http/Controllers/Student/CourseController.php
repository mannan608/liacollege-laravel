<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\CourseResources\Module;
use App\Models\Document;
use App\Models\Student;
use App\Services\CoursePermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    public function __construct(
        private readonly CoursePermissionService $coursePermissionService,
    ) {}

  public function index(Request $request)
{
     $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();
        $course = $enrollments->first()?->slot?->course;
        $courseContentModule = $course
            ? $this->coursePermissionService->filterCourseContentForStudent($course, $student)
            : collect();

        // $courseQuizModule = Module::all();
        $courseQuizModule = $course->modules()->get();


        // return $courseQuizModule;
    return view('student.course.index', compact('enrollments','course','courseContentModule','courseQuizModule'));
}


    public function show(Course $course)
    {
       $course->load('documents');

    $courseContentModule = $this->coursePermissionService->filterCourseContentForStudent($course, auth()->user()->student);
    $courseQuizModule = $course->modules()->get();

    $student = Auth::user()->student;

    $documents = $student->documents()
        ->with('uploadedBy')
        ->latest()
        ->get();

        //    return $documents;

        return view('student.course.show', compact('course','courseContentModule','courseQuizModule','documents'));
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

        $course->setRelation(
            'coursecontentcategories',
            $this->coursePermissionService->filterCourseContentForStudent($course, $student)
        );

        return view('student.course.module.content.index', [
            'course' => $course,
            'student' => $student,
        ]);
    }

    public function ContentModule(Request $request, Course $course,CourseContentCategory $module)
    {
        $student = auth()->user()->student;

        abort_unless($student, 403);

        $visibleCategories = $this->coursePermissionService->filterCourseContentForStudent($course, $student);
        $module = $visibleCategories->firstWhere('id', $module->id);
        abort_unless($module, 403);

        return view('student.course.module.content.show', [
            'course' => $course,
            'module' => $module,
            'student' => $student,
        ]);
    }

 

      public function contentMetarialLinkView(string $slug)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $student = Auth::user()->student;

        if (!$student) {
            abort(403);
        }

        $view = "frontend.pages.student.private-pages.$slug";

        abort_unless(view()->exists($view), 404);

        return view($view, compact('student'));
    }
}
