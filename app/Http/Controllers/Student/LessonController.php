<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use App\Models\CourseResources\UserLessonProgress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonController extends Controller
{
    public function index(Request $request, ?string $slug = null): View
    {
        $courseId   = $request->query('course');
        $moduleSlug = $request->query('module');

        $course = $courseId ? Course::findOrFail($courseId) : null;
        $module = $moduleSlug
            ? Module::where('slug', $moduleSlug)->firstOrFail()
            : null;

        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | All active lessons of this module
        |--------------------------------------------------------------------------
        */

        $lessons = $module->lessons()
            ->where('status', true)
            ->orderBy('id')
            ->get();

        abort_if($lessons->isEmpty(), 404, 'No lessons found.');

        /*
        |--------------------------------------------------------------------------
        | Completed lesson IDs for this user
        |--------------------------------------------------------------------------
        */

        $completedLessonIds = UserLessonProgress::query()
            ->where('user_id', $userId)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->where('is_completed', true)
            ->pluck('lesson_id');

        /*
        |--------------------------------------------------------------------------
        | Progress calculations
        |--------------------------------------------------------------------------
        */

        $totalLessons    = $lessons->count();
        $totalCompleted  = $completedLessonIds->count();
        $progressPercent = $totalLessons > 0
            ? (int) round(($totalCompleted / $totalLessons) * 100)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | Active lesson = first incomplete lesson
        |--------------------------------------------------------------------------
        */

        $activeLesson = $lessons->first(
            fn($lesson) => !$completedLessonIds->contains($lesson->id)
        );

        // All completed → last lesson is active
        if (!$activeLesson) {
            $activeLesson = $lessons->last();
        }

        /*
        |--------------------------------------------------------------------------
        | Current lesson being viewed
        |--------------------------------------------------------------------------
        */

        if ($slug) {
            $currentLesson = $lessons->firstWhere('slug', $slug);
            abort_if(!$currentLesson, 404, 'Lesson not found in this module.');
        } else {
            $currentLesson = $activeLesson;
        }

        /*
        |--------------------------------------------------------------------------
        | Progress keyed by lesson_id for the sidebar
        |--------------------------------------------------------------------------
        */

        $progress = UserLessonProgress::query()
            ->where('user_id', $userId)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->get()
            ->keyBy('lesson_id');

        return view('student.lessons.index', compact(
            'lessons',
            'course',
            'module',
            'currentLesson',
            'activeLesson',
            'totalLessons',
            'totalCompleted',
            'progressPercent',
            'completedLessonIds',
            'progress'
        ));
    }

    public function content(Request $request, $slug)
    {
        $moduleSlug = $request->query('module');

        $lesson = Lesson::where('slug', $slug)
            ->when($moduleSlug, function ($q) use ($moduleSlug) {
                $q->whereHas('module', fn($q) => $q->where('slug', $moduleSlug));
            })
            ->firstOrFail();

        return view('student.lessons.partials.lesson-content', compact('lesson'));
    }

    public function complete(Request $request, string $slug): JsonResponse
    {
        $moduleSlug = $request->query('module');
        $courseId   = $request->query('course');

        $lesson = Lesson::where('slug', $slug)->firstOrFail();
        $module = $lesson->module;
        $course = $courseId ? Course::find($courseId) : null;

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
    !$completedIds->contains($lesson->id) &&
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
            'user_id'   => $userId,
            'lesson_id' => $lesson->id,
        ]);

        if (!$progress->started_at) {
            $progress->started_at = now();
        }

        $progress->is_completed = true;
        $progress->completion_percentage = 100;

        if (!$progress->completed_at) {
            $progress->completed_at = now();
        }

        $progress->save();

        /*
        |--------------------------------------------------------------------------
        | Find current lesson position
        |--------------------------------------------------------------------------
        */

        $currentIndex = $lessons->search(function ($item) use ($lesson) {
            return $item->id === $lesson->id;
        });

        /*
        |--------------------------------------------------------------------------
        | Find next lesson
        |--------------------------------------------------------------------------
        */

        $nextLesson = $lessons->get($currentIndex + 1);

        /*
        |--------------------------------------------------------------------------
        | Build lesson URL helper
        |--------------------------------------------------------------------------
        */

        $buildLessonUrl = function ($lessonSlug, $extraParams = []) use ($courseId, $moduleSlug) {
            $url = "/student/e-learning-portal/lessons/{$lessonSlug}";
            $params = array_filter(array_merge([
                'course' => $courseId,
                'module' => $moduleSlug,
            ], $extraParams));

            if (!empty($params)) {
                $url .= '?' . http_build_query($params);
            }

            return $url;
        };

        /*
        |--------------------------------------------------------------------------
        | No next lesson
        |--------------------------------------------------------------------------
        */

        if (!$nextLesson) {
            return response()->json([
                'success'   => true,
                'completed' => true,
                'has_next'  => false,
                'message'   => 'Module completed successfully.',
                'redirect'  => $buildLessonUrl($lesson->slug, [
                    'quiz_notice' => 'There is no next lesson available yet.',
                ]),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Next lesson available
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'success'     => true,
            'completed'   => true,
            'has_next'    => true,
            'next_lesson' => [
                'id'    => $nextLesson->id,
                'title' => $nextLesson->title,
                'slug'  => $nextLesson->slug,
            ],
            'redirect' => $buildLessonUrl($nextLesson->slug),
        ]);
    }
}