<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use App\Models\CourseResources\UserLessonProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\View as ViewResponse;

class LearningPortalController extends Controller
{
    /**
     * Open module learning portal.
     *
     * Redirect student to:
     * - first incomplete lesson
     * - or last lesson if everything is completed
     */
    public function launchLearningPortal(
        Course $course,
        Module $module
    ): RedirectResponse {

        $this->validateHierarchy($course, $module);

        $userId = auth()->id();

        $lessons = $module->lessons()
            ->where('status', true)
            ->orderBy('id')
            ->get();

        abort_if($lessons->isEmpty(), 404, 'No lessons found.');

        $completedLessonIds = UserLessonProgress::query()
            ->where('user_id', $userId)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->where('is_completed', true)
            ->pluck('lesson_id');

        /*
        |--------------------------------------------------------------------------
        | Find first incomplete lesson
        |--------------------------------------------------------------------------
        */

        $lesson = $lessons->first(
            fn ($lesson) => !$completedLessonIds->contains($lesson->id)
        );

        /*
        |--------------------------------------------------------------------------
        | All lessons completed
        |--------------------------------------------------------------------------
        */

        if (!$lesson) {
            $lesson = $lessons->last();
        }

        return redirect()->route('student.lesson.resources', [
            $course,
            $module,
            $lesson,
        ]);
    }


    /**
     * Display lesson.
     */
    public function show(
        Course $course,
        Module $module,
        Lesson $lesson
    ): ViewResponse {

        $this->validateHierarchy($course, $module, $lesson);

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Load lessons
        |--------------------------------------------------------------------------
        */

        $lessons = $module->lessons()
            ->where('status', true)
            ->orderBy('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Completed lessons
        |--------------------------------------------------------------------------
        */

        $progress = UserLessonProgress::query()
            ->where('user_id', $userId)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->get()
            ->keyBy('lesson_id');

        /*
        |--------------------------------------------------------------------------
        | Find current accessible lesson
        |--------------------------------------------------------------------------
        |
        | The first incomplete lesson is the student's active lesson.
        |
        */

        $activeLesson = $lessons->first(function ($item) use ($progress) {

            $lessonProgress = $progress->get($item->id);

            return !$lessonProgress?->is_completed;
        });

        /*
        |--------------------------------------------------------------------------
        | Everything completed
        |--------------------------------------------------------------------------
        */

        if (!$activeLesson) {
            $activeLesson = $lessons->last();
        }

        /*
        |--------------------------------------------------------------------------
        | Security: prevent jumping forward
        |--------------------------------------------------------------------------
        */

        $requestedIndex = $lessons->search(
            fn ($item) => $item->id === $lesson->id
        );

        $activeIndex = $lessons->search(
            fn ($item) => $item->id === $activeLesson->id
        );

        if ($requestedIndex > $activeIndex) {
            return redirect()->route('student.lesson.resources', [
                $course,
                $module,
                $activeLesson,
            ])->with('warning', 'Please complete the current lesson first.');
        }

        /*
        |--------------------------------------------------------------------------
        | Mark lesson started
        |--------------------------------------------------------------------------
        */

        UserLessonProgress::firstOrCreate(
            [
                'user_id' => $userId,
                'lesson_id' => $lesson->id,
            ],
            [
                'started_at' => now(),
                'completion_percentage' => 0,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Blade file
        |--------------------------------------------------------------------------
        */

        $lessonView = "student.modules.{$module->slug}.{$lesson->slug}";

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $completedCount = $progress
            ->filter(fn ($item) => $item->is_completed)
            ->count();

        $totalLessons = $lessons->count();

        $progressPercentage = $totalLessons > 0
            ? round(($completedCount / $totalLessons) * 100)
            : 0;

        return view('student.course.module.quiz.portal', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
            'lessons' => $lessons,
            'progress' => $progress,
            'activeLesson' => $activeLesson,
            'lessonView' => View::exists($lessonView)
                ? $lessonView
                : null,
            'completedCount' => $completedCount,
            'totalLessons' => $totalLessons,
            'progressPercentage' => $progressPercentage,
        ]);
    }


    /**
     * Complete current lesson and return next lesson.
     */
   public function complete(
    Course $course,
    Module $module,
    Lesson $lesson
): JsonResponse {

    $this->validateHierarchy($course, $module, $lesson);

    $userId = auth()->id();

    $lessons = $module->lessons()
        ->where('status', true)
        ->orderBy('id')
        ->get();

    /*
    |--------------------------------------------------------------------------
    | Get completed lessons
    |--------------------------------------------------------------------------
    */

    $completedIds = UserLessonProgress::query()
        ->where('user_id', $userId)
        ->whereIn('lesson_id', $lessons->pluck('id'))
        ->where('is_completed', true)
        ->pluck('lesson_id');


    /*
    |--------------------------------------------------------------------------
    | Find current accessible lesson
    |--------------------------------------------------------------------------
    */

    $currentAccessibleLesson = $lessons->first(function ($item) use ($completedIds) {
        return !$completedIds->contains($item->id);
    });


    /*
    |--------------------------------------------------------------------------
    | Prevent completing locked/future lesson
    |--------------------------------------------------------------------------
    */

    if (
        $currentAccessibleLesson &&
        $currentAccessibleLesson->id !== $lesson->id
    ) {
        return response()->json([
            'success' => false,
            'message' => 'This lesson cannot be completed yet.',
        ], 403);
    }


    /*
    |--------------------------------------------------------------------------
    | Get/Create Progress
    |--------------------------------------------------------------------------
    */

    $progress = UserLessonProgress::firstOrNew([
        'user_id' => $userId,
        'lesson_id' => $lesson->id,
    ]);


    /*
    |--------------------------------------------------------------------------
    | Started At
    |--------------------------------------------------------------------------
    */

    if (!$progress->started_at) {
        $progress->started_at = now();
    }


    /*
    |--------------------------------------------------------------------------
    | Mark Complete
    |--------------------------------------------------------------------------
    */

    $progress->is_completed = true;
    $progress->completion_percentage = 100;

    if (!$progress->completed_at) {
        $progress->completed_at = now();
    }

    $progress->save();


    /*
    |--------------------------------------------------------------------------
    | Find Current Lesson Position
    |--------------------------------------------------------------------------
    */

    $currentIndex = $lessons->search(function ($item) use ($lesson) {
        return $item->id === $lesson->id;
    });


    /*
    |--------------------------------------------------------------------------
    | Find Next Lesson
    |--------------------------------------------------------------------------
    */

    $nextLesson = $lessons->get($currentIndex + 1);


    /*
    |--------------------------------------------------------------------------
    | No Next Lesson
    |--------------------------------------------------------------------------
    */

    if (!$nextLesson) {

        return response()->json([
            'success' => true,
            'completed' => true,
            'has_next' => false,
            'message' => 'Module completed successfully.',
            'redirect' => route('student.dashboard'),
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Next Lesson Available
    |--------------------------------------------------------------------------
    */

    return response()->json([
        'success' => true,
        'completed' => true,
        'has_next' => true,

        'next_lesson' => [
            'id' => $nextLesson->id,
            'title' => $nextLesson->title,
            'slug' => $nextLesson->slug,
        ],

        'redirect' => route('student.lesson.resources', [
            $course,
            $module,
            $nextLesson,
        ]),
    ]);
}


    /**
     * Validate Course -> Module -> Lesson relationship.
     */
    private function validateHierarchy(
        Course $course,
        Module $module,
        ?Lesson $lesson = null
    ): void {

        abort_unless(
            $module->course_id === $course->id,
            404
        );

        if ($lesson) {
            abort_unless(
                $lesson->module_id === $module->id,
                404
            );
        }
    }
}