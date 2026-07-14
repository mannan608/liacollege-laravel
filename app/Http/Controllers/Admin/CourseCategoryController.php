<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\TrainingCenter;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTrainingCenterRequest;
use App\Http\Requests\UpdateTrainingCenterRequest;
use App\Models\CourseCategory;
use App\Services\ActivityLogService;

class CourseCategoryController extends Controller
{

    /**
     * List Training Centers
     */
    public function index(Request $request)
    {
        $request->user()->can('course-categories.list') || abort(403);
        try {
            $query = CourseCategory::query();

            if ($request->filled('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            $categories = $query
                ->latest()
                ->paginate($request->integer('per_page', 15))
                ->withQueryString();

            return view('backend.pages.course-categories.index', compact('categories'));
        } catch (Throwable $e) {
            report($e);

            return back()->with(
                'error',
                'Unable to load categories.'
            );
        }
    }

    /**
     * Create Form
     */
    public function create(Request $request)
    {
        $request->user()->can('course-categories.create') || abort(403);

        return view('backend.pages.course-categories.create');
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
        $request->user()->can('course-categories.create') || abort(403);
         $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'unique:course_categories,name',
        ],
    ]);

        DB::beginTransaction();

        try {
            CourseCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

            DB::commit();
            return redirect(role_route('role.course-categories.index'))
                ->with('success', 'Course category created successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to create training center.');
        }
    }

    /**
     * Show Details
     */
    public function show(Request $request, string $role)
    {
        $request->user()->can('course-categories.view') || abort(403);

        try {

            return view(
                'backend.pages.course-categories.show',
                compact('categories')
            );
        } catch (Throwable $e) {
            report($e);

            return redirect()
                ->route('role.course-categories.index')
                ->with('error', 'Training center not found.');
        }
    }

    /**
     * Edit Form
     */
    public function edit(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.edit') || abort(403);
        return view(
            'backend.pages.course-categories.edit',
            ['category' => $courseCategory]
        );
    }

    /**
     * Update
     */
    public function update(
        UpdateTrainingCenterRequest $request,
        string $role,
        CourseCategory $courseCategory
    ) {
        $request->user()->can('course-categories.edit') || abort(403);

        DB::beginTransaction();

        try {

            $data = collect($request->validated())
                ->filter(fn($value) => $value !== '')
                ->toArray();

            $courseCategory->fill($data);

            if ($courseCategory->isDirty()) {
                
                $courseCategory->save();
             
            }



            DB::commit();

            return redirect(role_route('role.course-categories.index'))
                ->with('success', 'Training center updated successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Failed to update training center.');
        }
    }

    /**
     * Delete
     */
    public function destroy(Request $request, string $role, CourseCategory $courseCategory)
    {
        $request->user()->can('course-categories.delete') || abort(403);

        DB::beginTransaction();

        try {

            $courseCategory->delete();

            DB::commit();

            return redirect()
                ->route('role.course-categories.index')
                ->with('success', 'Training center deleted successfully.');
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->with('error', 'Failed to delete training center.');
        }
    }
}
