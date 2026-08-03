<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use App\Models\CourseResources\CoursePermissionRole;
use App\Models\CourseResources\CourseSectionRow;
use App\Models\LMS\Enrollment;
use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use App\Services\CoursePermissionService;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // public function index(Request $request)
    // {
    //     $request->user()->can('student.list') || abort(403);

    //     // return $this->students->paginate();

    //     return view('backend.pages.students.index', [
    //         'students' => $this->students->paginate(),
    //         'title' => 'students',
    //     ]);
    // }


public function index(Request $request)
{
    $enrollments = Enrollment::query()
        ->select([
            'id',
            'student_id',
            'course_slot_id',
        ])
        ->with([
            'student:id,user_id',
            'student.user:id,name,email',
            'slot:id,course_id,training_center_id,training_date,start_time,end_time',
            'slot.course:id,name',
            'slot.trainingCenter:id,name,city'
        ])
        ->when($request->status, function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->latest()
        ->paginate(20);
        // return $enrollments;

    return view(
        'backend.pages.students.index',
        compact('enrollments')
    );
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
            'enrollments.slot.course.permissionRoles',
            'enrollments.permissionRole',
        ]);

        $enrollments = $student->enrollments()
            ->with([
                'slot.course.permissionRoles',
                'permissionRole',
            ])
            ->latest()
            ->get();

        return view('backend.pages.students.course-permission', [
            'student' => $student,
            'enrollments' => $enrollments,
        ]);
    }

    public function saveCoursePermission(Request $request, string $role, Student $student)
    {
        $validated = $request->validate([
            'enrollments' => ['nullable', 'array'],
            'enrollments.*.permission_role_id' => ['nullable', 'integer', 'exists:course_permission_roles,id'],
        ]);

        DB::transaction(function () use ($validated, $student) {
            foreach (($validated['enrollments'] ?? []) as $enrollmentId => $payload) {
                $enrollment = Enrollment::query()
                    ->with('slot.course')
                    ->where('student_id', $student->id)
                    ->findOrFail($enrollmentId);

                $permissionRoleId = data_get($payload, 'permission_role_id');

                if ($permissionRoleId) {
                    CoursePermissionRole::query()
                        ->whereKey($permissionRoleId)
                        ->where('course_id', $enrollment->slot->course_id)
                        ->firstOrFail();
                }

                $enrollment->update([
                    'course_permission_role_id' => $permissionRoleId ?: null,
                ]);
            }
        });

        return redirect()
            ->route('role.students.course-permission', [
                'role' => $role,
                'student' => $student->id,
            ])
            ->with('success', 'Course permission roles updated successfully.');
    }

    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;
        $student->load([
            'enrollments.slot.course.coursecontentcategories.sections.rows',
            'assignmentSubmissions.courseSectionRow',
        ]);

        $courses = $student->enrollments
            ->pluck('slot.course')
            ->filter()
            ->unique('id')
            ->values();

        $courses = $courses->map(function (Course $course) use ($student) {
            $course->setRelation(
                'coursecontentcategories',
                app(CoursePermissionService::class)->filterCourseContentForStudent($course, $student)
            );

            return $course;
        })->filter(function (Course $course) {
            return $course->coursecontentcategories->isNotEmpty();
        })->values();

        $submissions = AssignmentSubmission::where(
            'student_id',
            $student->id
        )
            ->get()
            ->keyBy('course_section_row_id');

        return view('frontend.pages.student.dashboard', [
            'courses' => $courses,
            'submissions' => $submissions,
        ]);
    }


  
    public function assignmentSubmit(Request $request,    CourseSectionRow $row)
    {
        $student = auth()->user()->student;


        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $row->loadMissing('section.category.course');

        abort_unless(app(CoursePermissionService::class)->canSubmitRow($student, $row), 403);

        $submission = AssignmentSubmission::where([
            'student_id' => $student->id,
            'course_section_row_id' => $row->id,
        ])->first();

        $path = $this->replaceFile(
            $request->file('file'),
            $submission?->file,
            'submissions'
        );

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
   
    public function download(CourseSectionRow $row)
    {
        $student = auth()->user()->student;
        $row->loadMissing('section.category.course');

        abort_unless(app(CoursePermissionService::class)->canDownloadRow($student, $row), 403);

        abort_unless(! empty($row->data['file']), 404);

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

    public function view(string $slug)
    {
        if (!Auth::check()) {
            abort(403);
        }

        $student = Auth::user()->student;

        if (!$student) {
            abort(403);
        }

        $view = "frontend.pages.student.private-pages.$slug";

        abort_unless(view()->exists($view), 404);

        return view($view, compact('student'));
    }


public function assignment(string $role, Student $student)
{
    $student->load([
        'user',
        'courses',
        'assignmentSubmissions' => function ($query) {
            $query->latest()->with([
                'courseSectionRow.section.category.course',
            ]);
        },
    ]);

    return view('backend.pages.students.assignments', compact('student'));
}
public function enrollmentCourses()
{
    return view('frontend.pages.student.courses.index');
}
public function studentCertificate(){
    return view('frontend.pages.student.certificates.certificate');
    
}
public function studentDocumnet(){
    return view('frontend.pages.student.certificates.my-document');
    
}

public function studentBilling(){
    return view('frontend.pages.student.billing');
    
}

public function CourseDetails(){
    return view('frontend.pages.student.courses.show');
}

public function CourseModule(){
    return view('frontend.pages.student.course-module.index');
}


}
