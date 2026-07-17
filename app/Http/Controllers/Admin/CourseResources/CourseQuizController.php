<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreQuizResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Traits\HandlesFiles;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CourseQuizController extends Controller
{

     public function index(Request $request, string $role, Course $course)
    {
      
        $modules = $course->modules()->with('lessons')->latest()->paginate(20);
//   return $modules;
        return view('backend.pages.CourseResources.Quizs.index', [
            'course' => $course,
            'items' => $modules,
            'title' => 'Course Modules',
        ]);
    }

    public function create(Request $request, string $role, Course $course)
    {
        $course->load('modules.lessons');

        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'module' => new Module(),
            'title' => 'Course Modules',
        ]);
    }

    public function edit(Request $request, string $role, Course $course, Module $module)
    {
        $module->load('lessons');

        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'module' => $module,
            'title' => 'Edit Module',
        ]);
    }

    public function store(StoreQuizResourceRequest $request, string $role, Course $course): JsonResponse
    {
        try {
            DB::transaction(function () use ($request, $course) {

                $validated = $request->validated();
                $oldLessonIds = collect();
                if (!empty($validated['modules'])) {
                    foreach ($validated['modules'] as $moduleData) {
                        if (!empty($moduleData['id'])) {
                            $existingModule = Module::find($moduleData['id']);
                            if ($existingModule) {
                                $oldLessonIds = $oldLessonIds->merge(
                                    $existingModule->lessons()->pluck('id')
                                );
                            }
                        }
                    }
                }

                $keptLessonIds = collect();

                foreach ($validated['modules'] ?? [] as $moduleData) {
                    $module = Module::updateOrCreate(
                        [
                            'id' => $moduleData['id'] ?? null,
                        ],
                        [
                            'course_id' => $course->id,
                            'title' => $moduleData['title'],
                        ]
                    );

                    foreach ($moduleData['lessons'] ?? [] as $lessonData) {
                        $lesson = Lesson::updateOrCreate(
                            [
                                'id' => $lessonData['id'] ?? null,
                            ],
                            [
                                'module_id' => $module->id,
                                'title' => $lessonData['title'],
                                'content' => $lessonData['content'] ?? null,
                                'duration' => $lessonData['duration'] ?? 0,
                                'lesson_types' => $lessonData['lesson_types'] ?? [],
                            ]
                        );

                        $keptLessonIds->push($lesson->id);
                    }
                }
            });

            Cache::forget('navbar_courses');

            session()->flash('success', true);
            session()->flash('message', 'Course modules saved successfully.');

            return response()->json([
                'success' => true,
                'redirect' => role_route('role.modules.index', [
                    'course' => $course->id
                ]),
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
