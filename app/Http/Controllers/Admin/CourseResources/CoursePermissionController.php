<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseResources\CoursePermissionRole;
use App\Models\CourseResources\CoursePermissions;
use App\Models\Student;
use Illuminate\Http\Request;

class CoursePermissionController extends Controller
{
    // 1. List all roles for a course
    public function index(Course $course)
    {
        $roles = $course->permissionRoles()->withCount('accessRules')->get();
        return view('admin.courses.permissions.index', compact('course', 'roles'));
    }

    // 2. Store a new role
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'is_full_access' => 'boolean',
        ]);

        $course->permissionRoles()->create([
            'name' => $request->name,
            'description' => $request->description,
            'is_full_access' => $request->boolean('is_full_access'),
            // Default future capabilities
            'capabilities' => ['can_download' => false, 'can_submit_assignment' => false]
        ]);

        return back()->with('success', 'Role created successfully.');
    }

    // 3. Edit Role Permissions (Content Tree)
    public function edit(Course $course, CoursePermissionRole $role)
    {
        $course->load(['contentCategories.sections.rows']);
        
        $allowedCategories = $role->accessRules()->where('entity_type', 'category')->pluck('entity_id')->toArray();
        $allowedSections = $role->accessRules()->where('entity_type', 'section')->pluck('entity_id')->toArray();
        $allowedRows = $role->accessRules()->where('entity_type', 'row')->pluck('entity_id')->toArray();

        return view('admin.courses.permissions.edit', compact('course', 'role', 'allowedCategories', 'allowedSections', 'allowedRows'));
    }

    // 4. Update Role Permissions (Content Tree)
    public function update(Request $request, Course $course, CoursePermissionRole $role)
    {
        if ($role->is_full_access) {
            return back()->with('success', 'Full Access role requires no content changes.');
        }

        $role->accessRules()->delete();

        // Sync Categories
        if ($request->has('categories')) {
            foreach ($request->categories as $id) {
                CoursePermissions::create(['permission_role_id' => $role->id, 'entity_type' => 'category', 'entity_id' => $id]);
            }
        }
        // Sync Sections
        if ($request->has('sections')) {
            foreach ($request->sections as $id) {
                CoursePermissions::create(['permission_role_id' => $role->id, 'entity_type' => 'section', 'entity_id' => $id]);
            }
        }
        // Sync Rows
        if ($request->has('rows')) {
            foreach ($request->rows as $id) {
                CoursePermissions::create(['permission_role_id' => $role->id, 'entity_type' => 'row', 'entity_id' => $id]);
            }
        }

        return redirect()->route('backend.courses.permissions.index', $course)->with('success', 'Permissions updated.');
    }

    // 5. Update Future Capabilities (Downloads, Submissions)
    public function updateCapabilities(Request $request, Course $course, CoursePermissionRole $role)
    {
        $role->update([
            'capabilities' => $request->only(['can_download', 'can_submit_assignment'])
        ]);
        return back()->with('success', 'Capabilities updated.');
    }

    // 6. Assign Role to Student
    public function assignStudent(Request $request, Course $course, Student $student)
    {
        $request->validate(['permission_role_id' => 'nullable|exists:course_permission_roles,id']);

        // Update pivot table
        $course->students()->updateExistingPivot($student->id, [
            'permission_role_id' => $request->permission_role_id
        ]);

        return back()->with('success', 'Student role updated.');
    }
}
