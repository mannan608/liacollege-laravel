<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreCourseLessonRequest;
use App\Http\Requests\CourseResources\UpdateCourseLessonRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CourseLessonController extends Controller
{
    /**
     * Display lessons.
     */
    public function index(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        $this->validateModuleBelongsToCourse($module, $course);

        $lessons = $module->lessons()
            ->latest()
            ->paginate(
                $request->integer('per_page', 15)
            )
            ->withQueryString();
            // return $lessons;

        return view('backend.pages.CourseResources.Lessons.index',compact(
                'course',
                'module',
                'lessons'
            )
        );
    }


    /**
     * Show create lesson form.
     */
    public function create(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        $this->validateModuleBelongsToCourse($module, $course);

        return view('backend.pages.CourseResources.Lessons.create',
            compact(
                'course',
                'module'
            )
        );
    }


    /**
     * Store lesson.
     */
    public function store(
        StoreCourseLessonRequest $request,
        string $role,
        Course $course,
        Module $module
    ): RedirectResponse {
        $this->validateModuleBelongsToCourse($module, $course);

        $validated = $request->validated();

        DB::beginTransaction();

        try {

            $module->lessons()->create([
                'title' => $validated['title'],
                'content' => $validated['content'] ?? null,
                'duration' => $validated['duration'] ?? 0,
                'lesson_types' => $validated['lesson_types'] ?? [],
                'status' => $validated['status'] ?? true,
            ]);

            DB::commit();

            return redirect(
                role_route('role.lessons.index', [
                    'course' => $course->id,
                    'module' => $module->id,
                ])
            )->with(
                'success',
                'Lesson created successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to create lesson.'
                );
        }
    }


    /**
     * Display lesson.
     */
    public function show(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ) {
        $request->user()->can('course.edit') || abort(403);

        $this->validateLessonBelongsToModule(
            $module,
            $lesson
        );

        return view('backend.pages.CourseResources.Lessons.show',
            compact(
                'course',
                'module',
                'lesson'
            )
        );
    }


    /**
     * Show edit lesson form.
     */
    public function edit(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ) {
        $request->user()->can('course.edit') || abort(403);

        $this->validateLessonBelongsToModule(
            $module,
            $lesson
        );

        return view('backend.pages.CourseResources.Lessons.edit',
            compact(
                'course',
                'module',
                'lesson'
            )
        );
    }


    /**
     * Update lesson.
     *
     * Only fields sent in the request are updated.
     * Fields not sent remain unchanged.
     */
    public function update(
        UpdateCourseLessonRequest $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ): RedirectResponse {
        $this->validateLessonBelongsToModule(
            $module,
            $lesson
        );

        $validated = $request->validated();

        DB::beginTransaction();

        try {

            /*
             * IMPORTANT:
             *
             * Only update fields that were sent.
             *
             * Example:
             * title not sent       => original title remains
             * content not sent     => original content remains
             * status = false       => false is correctly saved
             */
            $updateData = [];

            if (array_key_exists('title', $validated)) {
                $updateData['title'] = $validated['title'];
            }

            if (array_key_exists('content', $validated)) {
                $updateData['content'] = $validated['content'];
            }

            if (array_key_exists('duration', $validated)) {
                $updateData['duration'] = $validated['duration'];
            }

            if (array_key_exists('lesson_types', $validated)) {
                $updateData['lesson_types'] = $validated['lesson_types'];
            }

            if (array_key_exists('status', $validated)) {
                $updateData['status'] = $validated['status'];
            }

            if (!empty($updateData)) {
                $lesson->update($updateData);
            }

            DB::commit();

            return redirect(
                role_route('role.lessons.index', [
                    'course' => $course->id,
                    'module' => $module->id,
                ])
            )->with(
                'success',
                'Lesson updated successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to update lesson.'
                );
        }
    }


    /**
     * Delete lesson.
     */
    public function destroy(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ): RedirectResponse {
        $request->user()->can('course.edit') || abort(403);

        $this->validateLessonBelongsToModule(
            $module,
            $lesson
        );

        DB::beginTransaction();

        try {

            $lesson->delete();

            DB::commit();

            return redirect(
                role_route('role.lessons.index', [
                    'course' => $course->id,
                    'module' => $module->id,
                ])
            )->with(
                'success',
                'Lesson deleted successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()->with(
                'error',
                'Failed to delete lesson.'
            );
        }
    }


    /**
     * Ensure module belongs to course.
     */
    private function validateModuleBelongsToCourse(
        Module $module,
        Course $course
    ): void {
        abort_unless(
            $module->course_id === $course->id,
            404
        );
    }


    /**
     * Ensure lesson belongs to module.
     */
    private function validateLessonBelongsToModule(
        Module $module,
        Lesson $lesson
    ): void {
        abort_unless(
            $lesson->module_id === $module->id,
            404
        );
    }
}