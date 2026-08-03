<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\CourseResources\CoursePermissionRole;
use App\Models\CourseResources\CourseSection;
use App\Models\CourseResources\CourseSectionRow;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CoursePermissionController extends Controller
{
    public function __construct(
        private readonly CourseRepositoryInterface $courses
    ) {}

public function index(string $role, ?Course $course = null)
{
    $courses = Course::query()
        ->with('permissionRoles')
        ->latest()
        ->paginate(20);

    return view('backend.pages.course-permission.permission-role.index', [
        
        'courses' => $courses,
    ]);
}

    public function create(string $role, Course $course): View
    {
        $course->load('coursecontentcategories.sections.rows');

        return view('backend.pages.course-permission.permission-role.create', [
            'course' => $course,
            'role' => new CoursePermissionRole([
                'course_id' => $course->id,
            ]),
            'selectedCategories' => [],
            'selectedSections' => [],
            'selectedRows' => [],
        ]);
    }

    public function store(string $role, Request $request, Course $course): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string'],
            'is_full_access' => ['sometimes', 'boolean'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:course_content_categories,id'],
            'sections' => ['nullable', 'array'],
            'sections.*' => ['integer', 'exists:course_sections,id'],
            'rows' => ['nullable', 'array'],
            'rows.*' => ['integer', 'exists:course_section_rows,id'],
        ]);

        $permissionRole = DB::transaction(function () use ($course, $request, $data) {
            $permissionRole = $course->permissionRoles()->create([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'is_full_access' => $request->boolean('is_full_access'),
            ]);

            if (! $permissionRole->isFullAccess()) {
                $this->syncPermissions($permissionRole, $data);
            }

            return $permissionRole;
        });

        return redirect()->to(role_route('role.course-permissions.index',['course' => $course->id]))->with('success', "Permission role created successfully.");
    }

    public function edit(string $role, Course $course, CoursePermissionRole $permission_role): View
    {
        $this->ensureCourseRole($course, $permission_role);

        $course->load('coursecontentcategories.sections.rows');
        $permission_role->load('permissions');

        return view('backend.pages.course-permission.permission-role.edit', [
            'course' => $course,
            'role' => $permission_role,
            'selectedCategories' => $this->selectedIds($permission_role, CourseContentCategory::class),
            'selectedSections' => $this->selectedIds($permission_role, CourseSection::class),
            'selectedRows' => $this->selectedIds($permission_role, CourseSectionRow::class),
        ]);
    }

    public function update(string $role, Request $request, Course $course, CoursePermissionRole $permission_role): RedirectResponse
    {
        $this->ensureCourseRole($course, $permission_role);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'description' => ['nullable', 'string'],
            'is_full_access' => ['sometimes', 'boolean'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer', 'exists:course_content_categories,id'],
            'sections' => ['nullable', 'array'],
            'sections.*' => ['integer', 'exists:course_sections,id'],
            'rows' => ['nullable', 'array'],
            'rows.*' => ['integer', 'exists:course_section_rows,id'],
        ]);

        DB::transaction(function () use ($request, $permission_role, $data): void {
            $permission_role->update([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'is_full_access' => $request->boolean('is_full_access'),
            ]);

            $permission_role->permissions()->delete();

            if ($permission_role->isFullAccess()) {
                return;
            }

            $this->syncPermissions($permission_role, $data);
        });     

        return redirect()->to(role_route('role.course-permissions.index',['course' => $course->id]))->with('success', "Permission role updated successfully.");
    }

    public function destroy(string $role, Request $request, Course $course, CoursePermissionRole $permission_role): RedirectResponse
    {
        $this->ensureCourseRole($course, $permission_role);

        $permission_role->delete();

        return redirect()
            ->route('role.course-permissions.index', [
                'course' => $course->id,
            ])
            ->with('success', 'Permission role deleted successfully.');
    }

    private function ensureCourseRole(Course $course, CoursePermissionRole $permission_role): void
    {
        abort_unless((int) $permission_role->course_id === (int) $course->id, 404);
    }

    private function selectedIds(CoursePermissionRole $role, string $modelClass): array
    {
        return $role->permissions()
            ->where('permissionable_type', $modelClass)
            ->pluck('permissionable_id')
            ->map(fn ($id) => (int) $id)
            ->all();
    }

    private function syncPermissions(CoursePermissionRole $role, array $data): void
    {
        foreach ($data['categories'] ?? [] as $categoryId) {
            CourseContentCategory::find($categoryId)?->permissions()->create([
                'course_permission_role_id' => $role->id,
            ]);
        }

        foreach ($data['sections'] ?? [] as $sectionId) {
            CourseSection::find($sectionId)?->permissions()->create([
                'course_permission_role_id' => $role->id,
            ]);
        }

        foreach ($data['rows'] ?? [] as $rowId) {
            CourseSectionRow::find($rowId)?->permissions()->create([
                'course_permission_role_id' => $role->id,
            ]);
        }
    }
}
