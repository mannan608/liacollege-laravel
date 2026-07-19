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
            'submitLabel' => 'Save Modules',
        ]);
    }

    public function edit(Request $request, string $role, Course $course, Module $module)
    {

        $module->load('lessons');

        $course->load(['modules' => function ($query) use ($module) {
            $query->where('id', $module->id);
        }, 'modules.lessons']);

        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'module' => $module,
            'title' => 'Edit Module',
            'submitLabel' => 'Update Modules',
        ]);
    }

    // public function store(StoreQuizResourceRequest $request, string $role, Course $course): JsonResponse
    // {
    //     try {
    //         DB::transaction(function () use ($request, $course) {

    //             $validated = $request->validated();
    //             $oldLessonIds = collect();
    //             if (!empty($validated['modules'])) {
    //                 foreach ($validated['modules'] as $moduleData) {
    //                     if (!empty($moduleData['id'])) {
    //                         $existingModule = Module::find($moduleData['id']);
    //                         if ($existingModule) {
    //                             $oldLessonIds = $oldLessonIds->merge(
    //                                 $existingModule->lessons()->pluck('id')
    //                             );
    //                         }
    //                     }
    //                 }
    //             }

    //             $keptLessonIds = collect();

    //             foreach ($validated['modules'] ?? [] as $moduleData) {
    //                 $module = Module::updateOrCreate(
    //                     [
    //                         'id' => $moduleData['id'] ?? null,
    //                     ],
    //                     [
    //                         'course_id' => $course->id,
    //                         'title' => $moduleData['title'],
    //                     ]
    //                 );

    //                 foreach ($moduleData['lessons'] ?? [] as $lessonData) {
    //                     $lesson = Lesson::updateOrCreate(
    //                         [
    //                             'id' => $lessonData['id'] ?? null,
    //                         ],
    //                         [
    //                             'module_id' => $module->id,
    //                             'title' => $lessonData['title'],
    //                             'content' => $lessonData['content'] ?? null,
    //                             'duration' => $lessonData['duration'] ?? 0,
    //                             'lesson_types' => $lessonData['lesson_types'] ?? [],
    //                         ]
    //                     );

    //                     $keptLessonIds->push($lesson->id);
    //                 }
    //             }
    //         });

    //         Cache::forget('navbar_courses');

    //         session()->flash('success', true);
    //         session()->flash('message', 'Course modules saved successfully.');

    //         return response()->json([
    //             'success' => true,
    //             'redirect' => role_route('role.modules.index', [
    //                 'course' => $course->id
    //             ]),
    //         ]);
    //     } catch (\Throwable $e) {
    //         report($e);

    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    public function store(StoreQuizResourceRequest $request, string $role, Course $course): JsonResponse
    {
        try {
            DB::transaction(function () use ($request, $course) {

                $validated = $request->validated();

                $existingModuleIds = collect();
                $existingLessonIds = collect();

                if (!empty($validated['modules'])) {
                    foreach ($validated['modules'] as $moduleData) {
                        if (!empty($moduleData['id'])) {
                            $existingModuleIds->push($moduleData['id']);

                            // Get lessons BEFORE they get modified
                            $moduleLessons = Lesson::where('module_id', $moduleData['id'])->pluck('id');
                            $existingLessonIds = $existingLessonIds->merge($moduleLessons);
                        }
                    }
                }


                $keptModuleIds = collect();
                $keptLessonIds = collect();

                foreach ($validated['modules'] ?? [] as $moduleData) {

                    if (!empty($moduleData['id'])) {
                        $module = Module::updateOrCreate(
                            ['id' => $moduleData['id']],
                            [
                                'course_id' => $course->id,
                                'title' => $moduleData['title'],
                            ]
                        );
                    } else {
                        $module = Module::create([
                            'course_id' => $course->id,
                            'title' => $moduleData['title'],
                        ]);
                    }

                    $keptModuleIds->push($module->id);


                    foreach ($moduleData['lessons'] ?? [] as $lessonData) {

                        if (!empty($lessonData['id'])) {
                            $lesson = Lesson::updateOrCreate(
                                ['id' => $lessonData['id']],
                                [
                                    'module_id' => $module->id,
                                    'title' => $lessonData['title'],
                                    'content' => $lessonData['content'] ?? null,
                                    'duration' => $lessonData['duration'] ?? 0,
                                    'lesson_types' => $lessonData['lesson_types'] ?? [],
                                ]
                            );
                        } else {
                            // CREATE new lesson
                            $lesson = Lesson::create([
                                'module_id' => $module->id,
                                'title' => $lessonData['title'],
                                'content' => $lessonData['content'] ?? null,
                                'duration' => $lessonData['duration'] ?? 0,
                                'lesson_types' => $lessonData['lesson_types'] ?? [],
                            ]);
                        }

                        $keptLessonIds->push($lesson->id);
                    }
                }


                $lessonsToDelete = $existingLessonIds->diff($keptLessonIds);
                if ($lessonsToDelete->isNotEmpty()) {
                    Lesson::whereIn('id', $lessonsToDelete)->delete();
                }

                $modulesToDelete = Module::where('course_id', $course->id)
                    ->whereNotIn('id', $keptModuleIds)
                    ->pluck('id');

                if ($modulesToDelete->isNotEmpty()) {
                    Lesson::whereIn('module_id', $modulesToDelete)->delete();
                    Module::whereIn('id', $modulesToDelete)->delete();
                }
            });

            Cache::forget('navbar_courses');


            // $redirectUrl = route($role . '.modules.index', ['course' => $course->id]);
            $redirectUrl = role_route('role.modules.index', ['course' => $course->id]);


            return response()->json([
                'success' => true,
                'redirect' => $redirectUrl,
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Failed to save modules: ' . $e->getMessage(),
            ], 500);
        }
    }
}
