<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreQuizResourceRequest;
use App\Http\Requests\CourseResources\UpdateQuizResourceRequestRequest;
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
        $modules = $course
            ->modules()
            ->with('lessons')
            ->latest()
            ->paginate(20);

        return view(
            'backend.pages.CourseResources.Quizs.index',
            [
                'course'=>$course,
                'items'=>$modules,
                'title'=>'Course Modules'
            ]
        );
    }



    public function create(Request $request, string $role, Course $course)
    {
        return view(
            'backend.pages.CourseResources.Quizs.create',
            [
                'course'=>$course,
                'title'=>'Create Module'
            ]
        );
    }


    public function store(
        StoreQuizResourceRequest $request,
        string $role,
        Course $course
    )
    {

        DB::transaction(function () use ($request, $course) {

            $module = Module::create([

                'course_id'=>$course->id,
                'title'=>$request->title,

            ]);

            foreach ($request->lessons as $lesson) {

                $module->lessons()->create([

                    'title'=>$lesson['title'],

                    'content'=>$lesson['content'] ?? null,

                    'duration'=>$lesson['duration'] ?? 0,

                    'lesson_types'=>$lesson['lesson_types'] ?? []

                ]);

            }

        });

        Cache::forget('navbar_courses');

        return response()->json([

            'success'=>true,

            'message'=>'Module Created Successfully',

            'redirect'=>role_route(
                'role.modules.index',
                [
                    'course'=>$course->id
                ]
            )

        ]);

    }


    public function edit(
        Request $request,
        string $role,
        Course $course,
        Module $module
    )
    {

        abort_if($module->course_id != $course->id,404);

        $module->load('lessons');

        return view(
            'backend.pages.CourseResources.Quizs.edit',
            [

                'course'=>$course,

                'module'=>$module,

                'title'=>'Edit Module'

            ]
        );

    }


    public function update(
        UpdateQuizResourceRequestRequest $request,
        string $role,
        Course $course,
        Module $module
    )
    {

        abort_if($module->course_id != $course->id,404);

        DB::transaction(function () use ($request,$module) {

            $module->update([

                'title'=>$request->title

            ]);

            $submittedLessonIds = [];

            foreach ($request->lessons as $lessonData) {
              

                if (!empty($lessonData['id'])) {

                    $lesson = Lesson::where('module_id',$module->id)

                        ->findOrFail($lessonData['id']);

                    $lesson->update([

                        'title'=>$lessonData['title'],

                        'content'=>$lessonData['content'] ?? null,

                        'duration'=>$lessonData['duration'] ?? 0,

                        'lesson_types'=>$lessonData['lesson_types'] ?? []

                    ]);

                    $submittedLessonIds[] = $lesson->id;

                }

                else {

                    $lesson = $module->lessons()->create([

                        'title'=>$lessonData['title'],

                        'content'=>$lessonData['content'] ?? null,

                        'duration'=>$lessonData['duration'] ?? 0,

                        'lesson_types'=>$lessonData['lesson_types'] ?? []

                    ]);

                    $submittedLessonIds[] = $lesson->id;

                }

            }

            $module->lessons()

                ->whereNotIn('id',$submittedLessonIds)

                ->delete();

        });

        Cache::forget('navbar_courses');

        return response()->json([

            'success'=>true,

            'message'=>'Module Updated Successfully',

            'redirect'=>role_route(

                'role.modules.index',

                [

                    'course'=>$course->id

                ]

            )

        ]);

    }



    public function destroy(
        string $role,
        Course $course,
        Module $module
    )
    {

        abort_if($module->course_id != $course->id,404);

        DB::transaction(function () use ($module){

            $module->delete();

        });

        return response()->json([

            'success'=>true

        ]);

    }
}
