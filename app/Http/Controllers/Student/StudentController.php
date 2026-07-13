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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            'courses.categories.sections.rows',
        ]);

        $permissions = CoursePermissions::where('student_id', $student->id)
            ->get();

        $grantedCourses = [];
        $grantedCategories = [];
        $grantedSections = [];
        $grantedRows = [];

        foreach ($permissions as $permission) {

            // Full Course
            if (is_null($permission->section_id) && is_null($permission->row_id)) {
                $grantedCourses[] = $permission->course_id;
            }
            // Full Category
            elseif (
                !is_null($permission->category_id) &&
                is_null($permission->section_id) &&
                is_null($permission->row_id)
            ) {
                $grantedCategories[] = $permission->category_id;
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

                return [
                    'download' => data_get($item->doc_permissions, 'download', false),
                    'submission' => data_get($item->doc_permissions, 'submission', false),
                ];
            })
            ->toArray();

        // return $student;

        return view('backend.pages.students.course-permission', [
            'student' => $student,
            'enrolledCourses' => $student->courses,
            'grantedCategories' => $grantedCategories,
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
                        'category_id' => null,
                        'section_id' => null,
                        'row_id' => null,
                    ]);

                    continue;
                }

                if (! empty($permission['categories'])) {

                    foreach ($permission['categories'] as $categoryId) {

                        CoursePermissions::create([
                            'student_id' => $student->id,
                            'course_id' => $courseId,
                            'category_id' => $categoryId,
                            'section_id' => null,
                            'row_id' => null,
                        ]);
                    }
                }

                if (! empty($permission['sections'])) {

                    foreach ($permission['sections'] as $sectionId) {

                        CoursePermissions::create([
                            'student_id' => $student->id,
                            'course_id' => $courseId,
                            'category_id' => null,
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
                            'download' => $row->is_downloadable
                                ? isset($permission['doc_permissions'][$rowId]['download'])
                                : false,

                            'submission' => $row->is_document_submission
                                ? isset($permission['doc_permissions'][$rowId]['submission'])
                                : false,
                        ];

                        CoursePermissions::create([
                            'student_id' => $student->id,
                            'course_id' => $courseId,
                            'category_id' => null,
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
            'courses.categories.sections.rows',
            'assignmentSubmissions.courseSectionRow',
        ]);

        $access = $this->studentCourseAccess($student);

        $courses = $student->courses->filter(function ($course) use ($access) {

            if (in_array($course->id, $access['courses'])) {
                return true;
            }

            $course->setRelation(
                'categories',
                $course->categories->filter(function ($category) use ($access) {

                    if (in_array($category->id, $access['categories'])) {
                        return true;
                    }

                    $category->setRelation(
                        'sections',
                        $category->sections->filter(function ($section) use ($access) {

                            if (in_array($section->id, $access['sections'])) {
                                return true;
                            }

                            $section->setRelation(
                                'rows',
                                $section->rows->filter(function ($row) use ($access) {
                                    return in_array($row->id, $access['rows']);
                                })
                            );

                            return $section->rows->isNotEmpty();
                        })
                    );

                    return $category->sections->isNotEmpty();
                })
            );

            return $course->categories->isNotEmpty();
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
            'rowPermissions' => $access['rowPermissions'],
        ]);
    }


    // public function assignmentSubmit(Request $request,    CourseSectionRow $row)
    // {
    //     $student = auth()->user()->student;
    //     abort_unless($student, 403);

    //     $rowAccess = $this->rowAccess($student, $row);
    //     abort_unless($rowAccess['visible'] && $rowAccess['submission'], 403);


    //     $request->validate([
    //         'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
    //     ]);

    //     $submission = AssignmentSubmission::where([
    //         'student_id' => $student->id,
    //         'course_section_row_id' => $row->id,
    //     ])->first();

    //     $path = $this->replaceFile(
    //         $request->file('file'),
    //         $submission?->file,
    //         'submissions'
    //     );

    //     AssignmentSubmission::updateOrCreate(
    //         [
    //             'student_id' => $student->id,
    //             'course_section_row_id' => $row->id,
    //         ],
    //         [
    //             'file' => $path,
    //         ]
    //     );

    //     return back()->with('success', 'Assignment submitted successfully.');
    // }
    public function assignmentSubmit(Request $request,    CourseSectionRow $row)
    {
        $student = auth()->user()->student;


        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

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
    // public function download(CourseSectionRow $row)
    // {

    //     $student = auth()->user()->student;
    //     abort_unless($student, 403);

    //     $rowAccess = $this->rowAccess($student, $row);
    //     abort_unless($rowAccess['visible'] && $rowAccess['download'], 403);

    //     abort_unless(! empty($row->data['file']), 404);

    //     return response()->download(public_path($row->data['file']));
    // }
    public function download(CourseSectionRow $row)
    {

        $student = auth()->user()->student;

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

    private function studentCourseAccess(Student $student): array
    {
        $permissions = CoursePermissions::where('student_id', $student->id)->get();

        return [
            'courses' => $permissions
                ->whereNull('category_id')
                ->whereNull('section_id')
                ->whereNull('row_id')
                ->pluck('course_id')
                ->toArray(),
            'categories' => $permissions
                ->whereNotNull('category_id')
                ->whereNull('section_id')
                ->whereNull('row_id')
                ->pluck('category_id')
                ->toArray(),
            'sections' => $permissions
                ->whereNotNull('section_id')
                ->whereNull('row_id')
                ->pluck('section_id')
                ->toArray(),
            'rows' => $permissions
                ->whereNotNull('row_id')
                ->pluck('row_id')
                ->toArray(),
            'rowPermissions' => $permissions
                ->whereNotNull('row_id')
                ->keyBy('row_id')
                ->map(function ($item) {

                    return [
                        'download' => data_get($item->doc_permissions, 'download', false),
                        'submission' => data_get($item->doc_permissions, 'submission', false),
                    ];
                })
                ->toArray(),
        ];
    }

    private function rowAccess(Student $student, CourseSectionRow $row): array
    {
        $row->loadMissing('section.category');

        $courseId = $row->section?->category?->course_id;
        $categoryId = $row->section?->course_category_id;
        $sectionId = $row->course_section_id;

        if (! $courseId) {
            return [
                'visible' => false,
                'download' => false,
                'submission' => false,
            ];
        }

        $permissions = CoursePermissions::where('student_id', $student->id)
            ->where('course_id', $courseId)
            ->get();

        $rowPermission = $permissions->firstWhere('row_id', $row->id);
        $isVisible = $permissions->contains(function ($permission) use ($categoryId, $sectionId, $row) {

            if (is_null($permission->category_id) && is_null($permission->section_id) && is_null($permission->row_id)) {
                return true;
            }

            if (
                ! is_null($permission->category_id) &&
                is_null($permission->section_id) &&
                is_null($permission->row_id) &&
                (int) $permission->category_id === (int) $categoryId
            ) {
                return true;
            }

            if (
                ! is_null($permission->section_id) &&
                is_null($permission->row_id) &&
                (int) $permission->section_id === (int) $sectionId
            ) {
                return true;
            }

            return ! is_null($permission->row_id) && (int) $permission->row_id === (int) $row->id;
        });

        if (! $isVisible) {
            return [
                'visible' => false,
                'download' => false,
                'submission' => false,
            ];
        }

        $download = $row->is_downloadable;
        $submission = $row->is_document_submission;

        if ($rowPermission) {
            $download = (bool) data_get($rowPermission->doc_permissions, 'download', false);
            $submission = (bool) data_get($rowPermission->doc_permissions, 'submission', false);
        }

        return [
            'visible' => true,
            'download' => $download,
            'submission' => $submission,
        ];
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