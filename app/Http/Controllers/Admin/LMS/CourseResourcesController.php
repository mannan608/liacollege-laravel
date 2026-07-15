<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreModuleRequest;
use App\Http\Requests\LMS\UpdateModuleRequest;
use App\Models\Course;
use App\Models\LMS\Module;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseResourcesController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->search;
        $courseId = $request->course_id;

        $modules = Module::query()
            ->with('course')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($courseId, function ($query) use ($courseId) {
                $query->where('course_id', $courseId);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('backend.pages.LMS.modules.index', [
            'modules' => $modules,
            'courses' => Course::orderBy('title')->get(),
            'title' => 'Modules',
        ]);
    }

    public function create(): View
    {
        return view('backend.pages.LMS.modules.create', [
            'courses' => Course::orderBy('title')->get(),
            'title' => 'Create Module',
        ]);
    }

    public function store(StoreModuleRequest $request): RedirectResponse
    {
        try {

            Module::create([
                'course_id' => $request->course_id,
                'title' => $request->title,
                'description' => $request->description,
                'sort_order' => $request->sort_order ?? 0,
            ]);

             return redirect(role_route('role.modules.index'))
                ->with('success', 'Module created successfully.');

        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with('error', 'Unable to create module.');
        }
    }

    public function show(Module $module): View
    {
        $module->load([
            'course',
            'lessons',
        ]);

        return view('backend.pages.LMS.modules.show', [
            'module' => $module,
            'title' => 'Module Details',
        ]);
    }

    public function edit(Module $module): View
    {
        return view('backend.pages.LMS.modules.edit', [
            'module' => $module,
            'courses' => Course::orderBy('title')->get(),
            'title' => 'Edit Module',
        ]);
    }

    public function update(
        UpdateModuleRequest $request,
        Module $module
    ): RedirectResponse {
        try {

            $module->update([
                'course_id' => $request->course_id,
                'title' => $request->title,
                'description' => $request->description,
                'sort_order' => $request->sort_order ?? 0,
            ]);

           return redirect(role_route('role.modules.index'))
                ->with('success', 'Module updated successfully.');

        } catch (QueryException $e) {

            return back()
                ->withInput()
                ->with('error', 'Unable to update module.');
        }
    }

    public function destroy(Module $module): RedirectResponse
    {
        try {

            $module->delete();
             return redirect()
                ->route('role.modules.index')
                ->with('success', 'Module deleted successfully.');

        } catch (\Exception $e) {

            return back()
                ->with('error', 'Unable to delete module.');
        }
    }
}
