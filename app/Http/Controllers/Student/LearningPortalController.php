<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
use App\Models\Payment;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class LearningPortalController extends Controller
{
    public function launchLearningPortal(Course $course, Module $module)
    {
        abort_unless($module->course_id === $course->id, 404);

        $module->load([
            'lessons.resourceSections.resources',
        ]);

        $lesson = $module->lessons->first();
        // return $lesson;

        return view(
            'frontend.pages.student.learning-portal.index',
            compact('course', 'module', 'lesson')
        );
    }

    public function lessonResources(
        Course $course,
        Module $module,
        Lesson $lesson
    ) {
        abort_unless($module->course_id === $course->id, 404);
        abort_unless($lesson->module_id === $module->id, 404);

        $module->load([
            'lessons.resourceSections.resources',
        ]);

        $lesson->load([
            'resourceSections.resources',
        ]);

        return view(
            'frontend.pages.student.learning-portal.index',
            compact('course', 'module', 'lesson')
        );
    }


}
