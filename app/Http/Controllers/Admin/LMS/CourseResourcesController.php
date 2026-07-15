<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreModuleRequest;
use App\Models\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseResourcesController extends Controller
{
    public function index(Request $request, string $role, Course $course): View
    {

        return view('backend.pages.LMS.module-lessions.index', [
            'course' => $course,
        ]);
    }

    public function create(Request $request, string $role, Course $course)
    {

        return view('backend.pages.LMS.module-lessions.create');
    }

  public function store(StoreModuleRequest $request, string $role, Course $course)
{
    DB::transaction(function () use ($request, $course) {

        foreach ($request->validated('modules') as $moduleIndex => $moduleData) {

            $module = $course->modules()->create([
                'title' => $moduleData['title'],
                // 'sort_order' => $moduleIndex + 1,
            ]);

            foreach ($moduleData['lessons'] as $lessonIndex => $lessonData) {

                $module->lessons()->create([
                    'title' => $lessonData['title'],
                    'content' => $lessonData['content'] ?? null,
                    'duration' => $lessonData['duration'] ?? 0,
                    'lesson_types' => $lessonData['lesson_types'] ?? ['text'],
                    // 'sort_order' => $lessonIndex + 1,
                    'status' => true,
                ]);
            }
        }
    });

    return redirect()
        ->back()
        ->with('success', 'Course structure saved successfully.');
}
}
