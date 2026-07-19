<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class CourseLessonController extends Controller
{
    /**
     * Display modules.
     */
    public function index(Request $request, string $role, Course $course)
    {
        $request->user()->can('course.edit') || abort(403);

        try {
            $query = $course->modules();

            if ($request->filled('search')) {
                $query->where(
                    'title',
                    'like',
                    '%' . trim($request->search) . '%'
                );
            }

            $modules = $query
                ->latest()
                ->paginate($request->integer('per_page', 15))
                ->withQueryString();

            return view(
                'backend.pages.CourseResources.Modules.index',
                compact('modules', 'course')
            );

        } catch (Throwable $e) {

            report($e);

            return back()
                ->with('error', 'Unable to load modules.');
        }
    }

    /**
     * Show create form.
     */
    public function create(Request $request, string $role, Course $course)
    {
        $request->user()->can('course.edit') || abort(403);

        return view(
            'backend.pages.CourseResources.Modules.create',
            compact('course')
        );
    }

    /**
     * Store module.
     */
    public function store(
        Request $request,
        string $role,
        Course $course
    ) {
        $request->user()->can('course.edit') || abort(403);

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        DB::beginTransaction();

        try {

            $course->modules()->create([
                'title' => $validated['title'],
            ]);

            DB::commit();

            return redirect(
                role_route('role.modules.index', [
                    'course' => $course->id,
                ])
            )->with(
                'success',
                'Course module created successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to create course module.'
                );
        }
    }

    /**
     * Display module.
     */
    public function show(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        abort_unless(
            $module->course_id === $course->id,
            404
        );

        return view(
            'backend.pages.CourseResources.Modules.show',
            compact('course', 'module')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        abort_unless(
            $module->course_id === $course->id,
            404
        );

        return view('backend.pages.CourseResources.Modules.edit',compact('course', 'module')
        );
    }

    /**
     * Update module.
     */
    public function update(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        abort_unless(
            $module->course_id === $course->id,
            404
        );

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        DB::beginTransaction();

        try {

            $module->title = $validated['title'];

            $module->save();

            DB::commit();

            return redirect(
                role_route('role.modules.index', [
                    'course' => $course->id,
                ])
            )->with(
                'success',
                'Course module updated successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to update course module.'
                );
        }
    }

    /**
     * Delete module.
     */
    public function destroy(
        Request $request,
        string $role,
        Course $course,
        Module $module
    ) {
        $request->user()->can('course.edit') || abort(403);

        abort_unless(
            $module->course_id === $course->id,
            404
        );

        DB::beginTransaction();

        try {

            $module->delete();

            DB::commit();

            return redirect(
                role_route('role.modules.index', [
                    'course' => $course->id,
                ])
            )->with(
                'success',
                'Course module deleted successfully.'
            );

        } catch (Throwable $e) {

            DB::rollBack();

            report($e);

            return back()
                ->with(
                    'error',
                    'Failed to delete course module.'
                );
        }
    }
}