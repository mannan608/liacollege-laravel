<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Models\CoursePermissions;
use App\Models\CourseSectionRow;
use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\CoursePermissionService;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    use HandlesFiles;
    public function __construct(
        private readonly StudentRepositoryInterface $students,
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('student.list') || abort(403);

        return view('backend.pages.students.index', [
            'students' => $this->students->paginate(),
            'title' => 'students',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('student.create') || abort(403);

        return view('backend.pages.students.create', [
            'student' => null,
            'roles' => $this->roles(),
            'courses' => Course::orderBy('name')->get(),
            'title' => 'Create Student',
        ]);
    }

    public function store(StudentStoreRequest $request): RedirectResponse
    {
        $this->students->create($request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student created successfully.');
    }

    public function show(Request $request, string $role, Student $student): View
    {
        $request->user()->can('student.view') || abort(403);

        $student->load([
            'user.roles',
            'user.primaryRole',
            'courses',
        ]);

        return view('backend.pages.students.show', [
            'student' => $student,
            'title' => 'Student Details',
        ]);
    }

    public function edit(Request $request, string $role, Student $student): View
    {
        $request->user()->can('student.edit') || abort(403);

        $student->load([
            'user',
            'courses',
        ]);

        return view('backend.pages.students.edit', [
            'student' => $student,
            'courses' => Course::orderBy('name')->get(),
            'title' => 'Edit Student',
        ]);
    }

    public function update(StudentUpdateRequest $request, string $role, Student $student): RedirectResponse
    {
        $this->students->update($student->user, $request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $role])
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Request $request, string $role, Student $student): RedirectResponse
    {
        $request->user()->can('student.delete') || abort(403);

        if ($student->user && $request->user()->is($student->user)) {
            abort(403, 'You cannot delete your own account.');
        }

        abort_unless($student->user, 404);

        $this->students->delete($student->user);

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student deleted successfully.');
    }

    private function roles()
    {
        return Role::query()->orderBy('name')->get(['id', 'name']);
    }

    public function coursePermission(Request $request, string $role, Student $student)
    {
        $student->load([
            'user',
            'courses.sections.rows',
        ]);

        $permissions = CoursePermissions::where('student_id', $student->id)
            ->get();

        $grantedCourses = [];
        $grantedSections = [];
        $grantedRows = [];

        foreach ($permissions as $permission) {

            // Full Course
            if (is_null($permission->section_id) && is_null($permission->row_id)) {
                $grantedCourses[] = $permission->course_id;
            }

            // Full Section
            elseif (! is_null($permission->section_id) && is_null($permission->row_id)) {
                $grantedSections[] = $permission->section_id;
            }

            // Single Row
            elseif (! is_null($permission->row_id)) {
                $grantedRows[] = $permission->row_id;
            }
        }

        $existingPermissions = CoursePermissions::where('student_id', $student->id)
            ->whereNotNull('row_id')
            ->get()
            ->keyBy('row_id')
            ->map(function ($item) {
                return $item->doc_permissions ?? [];
            })
            ->toArray();

        // return $grantedRows;

        return view('backend.pages.students.course-permission', [
            'student' => $student,
            'enrolledCourses' => $student->courses,
            'grantedCourses' => $grantedCourses,
            'grantedSections' => $grantedSections,
            'grantedRows' => $grantedRows,
            'existingPermissions' => $existingPermissions,
        ]);
    }

    public function saveCoursePermission(Request $request, string $role, Student $student)
    {

        DB::transaction(function () use ($request, $student) {

            CoursePermissions::where('student_id', $student->id)->delete();

            foreach ($request->permissions ?? [] as $courseId => $permission) {

                if (! empty($permission['full_course'])) {

                    CoursePermissions::create([
                        'student_id' => $student->id,
                        'course_id' => $courseId,
                        'section_id' => null,
                        'row_id' => null,
                    ]);

                    continue;
                }

                if (! empty($permission['sections'])) {

                    foreach ($permission['sections'] as $sectionId) {

                        CoursePermissions::create([
                            'student_id' => $student->id,
                            'course_id' => $courseId,
                            'section_id' => $sectionId,
                            'row_id' => null,
                        ]);
                    }
                }

                if (! empty($permission['rows'])) {

                    foreach ($permission['rows'] as $rowId) {

                        $row = CourseSectionRow::find($rowId);

                        if (! $row) {
                            continue;
                        }

                        $docPermissions = [
                            'download' => isset($permission['doc_permissions'][$rowId]['download']),

                            'submission' => isset($permission['doc_permissions'][$rowId]['submission']),
                        ];

                        CoursePermissions::create([
                            'student_id' => $student->id,
                            'course_id' => $courseId,
                            'section_id' => $row->course_section_id,
                            'row_id' => $row->id,
                            'doc_permissions' => $docPermissions,
                        ]);
                    }
                }
            }
        });

        return redirect()->route('role.students.index', ['role' => $role, 'student' => $student->id])->with('success', 'Permission updated successfully.');
    }

    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;
        $student->load([
            'courses.sections.rows',
        ]);

        $permissions = CoursePermissions::where('student_id', $student->id)->get();

        $grantedCourses = $permissions
            ->whereNull('section_id')
            ->whereNull('row_id')
            ->pluck('course_id')
            ->toArray();

        $grantedSections = $permissions
            ->whereNotNull('section_id')
            ->whereNull('row_id')
            ->pluck('section_id')
            ->toArray();

        $grantedRows = $permissions
            ->whereNotNull('row_id')
            ->pluck('row_id')
            ->toArray();

        $courses = $student->courses->filter(function ($course) use (
            $grantedCourses,
            $grantedSections,
            $grantedRows
        ) {

            // Full course access
            if (in_array($course->id, $grantedCourses)) {
                return true;
            }

            // Filter sections
            $course->setRelation(
                'sections',
                $course->sections->filter(function ($section) use (
                    $grantedSections,
                    $grantedRows
                ) {

                    // Full section access
                    if (in_array($section->id, $grantedSections)) {
                        return true;
                    }

                    // Filter rows
                    $section->setRelation(
                        'rows',
                        $section->rows->filter(function ($row) use ($grantedRows) {
                            return in_array($row->id, $grantedRows);
                        })
                    );

                    return $section->rows->isNotEmpty();
                })
            );

            return $course->sections->isNotEmpty();
        });

        return view('frontend.pages.student.dashboard', [
            'courses' => $courses,
        ]);
    }
   

    public function submit(Request $request, CourseSectionRow $row, CoursePermissionService $permission)
    {

        $student = auth()->user()->student;

        if (! $permission->canAccessRow($student, $row)) {
            abort(403);
        }

        if (! $row->is_document_submission) {
            abort(403);
        }

        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $path = $request->file('file')
            ->store('submissions', 'public');

        AssignmentSubmission::updateOrCreate(

            [
                'student_id' => $student->id,
                'course_section_row_id' => $row->id,
            ],

            [
                'file' => $path,
            ]

        );

        return back()->with('success', 'Assignment submitted successfully.');
    }

    public function download(
        CourseSectionRow $row,
        CoursePermissionService $permissionService
    ) {

        $student = auth()->user()->student;

        if (! $permissionService->canAccessRow($student, $row)) {
            abort(403);
        }

        if (! $row->is_downloadable) {
            abort(403);
        }

        return response()->download(public_path($row->data['file']));
    }


    public function profileEdit(Request $request): View
    {
        return view('frontend.pages.student.profile', [
            'user' => $request->user(),
        ]);
    }

       public function studentProfileUpdate(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['nullable', 'string', 'max:191'],
            'phone' => ['nullable', 'string', 'max:191'],

            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'current_password' => [
                'required_with:password'
            ],

            'password' => [
                'nullable',
                'min:8',
                'confirmed'
            ],
        ]);

        $data = [];

        // Name
        if ($request->filled('name')) {
            $data['name'] = $request->name;
        }

        // Phone
        if ($request->filled('phone')) {
            $data['phone'] = $request->phone;
        }

        // Avatar
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $this->replaceFile(
                $request->file('avatar'),
                $user->avatar,
                'users'
            );
        }

        // Password
        if ($request->filled('password')) {

            if (! Hash::check(
                $request->current_password,
                $user->password
            )) {
                return back()->withErrors([
                    'current_password' => 'Current password is incorrect.'
                ]);
            }

            $data['password'] = bcrypt($request->password);
        }

        if (! empty($data)) {
            $user->update($data);
        }

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }
}
