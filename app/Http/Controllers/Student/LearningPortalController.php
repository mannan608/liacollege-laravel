<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Support\Facades\View;

class LearningPortalController extends Controller
{
    public function launchLearningPortal(Course $course, Module $module)
    {
        abort_unless($module->course_id === $course->id, 404);

        $module->load('lessons');

        $lesson = $module->lessons()->orderBy('id')->first();

        abort_if(!$lesson, 404, 'No lessons found.');

        $lessonView = "student.modules.{$module->slug}.{$lesson->slug}";

        return view('student.course.module.quiz.portal', [
            'course' => $course,
            'module' => $module,
            'lesson' => $lesson,
            'activeLessonId' => $lesson->id,
            'lessonView' => View::exists($lessonView) ? $lessonView : null,
        ]);
    }

    // public function show(Course $course, Module $module, Lesson $lesson)
    // {
    //     abort_unless($module->course_id === $course->id, 404);
    //     abort_unless($lesson->module_id === $module->id, 404);

    //     $module->load('lessons');

    //     $lessonView = "student.modules.{$module->slug}.{$lesson->slug}";

   

    //     return view('student.course.module.quiz.portal', [
    //         'course' => $course,
    //         'module' => $module,
    //         'lesson' => $lesson,
    //         'activeLessonId' => $lesson->id,
    //         'lessonView' => View::exists($lessonView) ? $lessonView : null,
    //     ]);
    // }
}