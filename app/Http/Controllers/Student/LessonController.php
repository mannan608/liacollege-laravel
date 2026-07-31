<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use App\Models\QuizModels\Quiz;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{

// public function index(Request $request, ?string $slug = null)
// {
//     $courseId   = $request->query('course');
//     $moduleSlug = $request->query('module');

//     $course = $courseId ? Course::find($courseId) : null;
//     $module = $moduleSlug 
//         ? Module::where('slug', $moduleSlug)->first() 
//         : null;

//     $lessons = $module
//         ? Lesson::where('module_id', $module->id)
//             ->orderBy('id')
//             ->get()
//         : collect();

//     $currentLesson = $lessons->isNotEmpty()
//         ? ($slug ? $lessons->firstWhere('slug', $slug) : $lessons->first())
//         : null;

//     return view('student.lessons.index', compact(
//         'lessons',
//         'course',
//         'module',
//         'currentLesson'
//     ));
// }

public function index(Request $request, ?string $slug = null)
{
    $courseId   = $request->query('course');
    $moduleSlug = $request->query('module');

    $course = $courseId ? Course::findOrFail($courseId) : null;
    $module = $moduleSlug
        ? Module::where('slug', $moduleSlug)->firstOrFail()
        : null;

    $userId = auth()->id();

    // All active lessons of this module
    $lessons = $module->lessons()
        ->where('status', true)
        ->orderBy('id')
        ->get();

    abort_if($lessons->isEmpty(), 404, 'No lessons found.');

    // Completed lesson IDs for this user
    $completedLessonIds = UserLessonProgress::query()
        ->where('user_id', $userId)
        ->whereIn('lesson_id', $lessons->pluck('id'))
        ->where('is_completed', true)
        ->pluck('lesson_id');

    // ========== PROGRESS CALCULATIONS ==========
    $totalLessons     = $lessons->count();
    $totalCompleted   = $completedLessonIds->count();
    $progressPercent  = $totalLessons > 0
        ? (int) round(($totalCompleted / $totalLessons) * 100)
        : 0;

    // ========== CURRENT / ACTIVE LESSON ==========
    if ($slug) {
        $currentLesson = $lessons->firstWhere('slug', $slug);
        abort_if(!$currentLesson, 404, 'Lesson not found in this module.');
    } else {
        // First incomplete lesson
        $currentLesson = $lessons->first(
            fn ($lesson) => !$completedLessonIds->contains($lesson->id)
        );

        // All completed → last lesson
        if (!$currentLesson) {
            $currentLesson = $lessons->last();
        }
    }

    return view('student.lessons.index', compact(
        'lessons',
        'course',
        'module',
        'currentLesson',
        'totalLessons',
        'totalCompleted',
        'progressPercent'
    ));
}

   public function content(Request $request, $slug)
{
    $moduleSlug = $request->query('module');

    $lesson = Lesson::where('slug', $slug)
        ->when($moduleSlug, function ($q) use ($moduleSlug) {
            $q->whereHas('module', fn ($q) => $q->where('slug', $moduleSlug));
        })
        ->firstOrFail();

    return view('student.lessons.partials.lesson-content', compact('lesson'));
}
}
