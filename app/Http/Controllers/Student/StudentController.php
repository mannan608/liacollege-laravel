<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public function __construct(
        private readonly StudentRepositoryInterface $students,
    ) {}

    public function index(Request $request): View
    {
        $request->user()->can('user.list') || abort(403);

        // dd($this->students->paginate()->toArray());
        return view('backend.pages.students.index', [
            'students' => $this->students->paginate(),
            'title' => 'students',
        ]);
    }

    public function create(Request $request): View
    {
        $request->user()->can('user.create') || abort(403);

        return view('backend.pages.students.create', [
            'user' => null,
            'roles' => $this->roles(),
            'courses' => Course::orderBy('name')->get(),
            'title' => 'Create Student',
        ]);
    }

    public function store(StudentStoreRequest  $request): RedirectResponse
    {
        $this->students->create($request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student created successfully.');
    }

    public function show(Request $request, string $role, User $user): View
    {
        $request->user()->can('user.view') || abort(403);

        return view('backend.pages.students.show', [
            'user' => $user->load('roles', 'primaryRole'),
            'title' => 'User Details',
        ]);
    }

    public function edit(Request $request, string $role, User $user): View
    {
        $request->user()->can('user.edit') || abort(403);

        return view('backend.pages.students.edit', [
            'user' => $user->load('roles', 'primaryRole'),
            'roles' => $this->roles(),
            'title' => 'Edit User',
        ]);
    }

    public function update(UserUpdateRequest $request, string $role, User $user): RedirectResponse
    {
        if ($request->user()->is($user) && $request->input('status') !== 'active') {
            abort(403, 'You cannot deactivate your own account.');
        }

        $this->students->update($user, $request->validated());

        return redirect()
            ->route('role.students.index', ['role' => $request->route('role')])
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Request $request, string $role, User $user): RedirectResponse
    {
        $request->user()->can('user.delete') || abort(403);

        if ($request->user()->is($user)) {
            abort(403, 'You cannot delete your own account.');
        }

        $this->students->delete($user);

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
    
//     $enrolledCourses = $student->courses()
//     ->with('sections.rows')
//     ->get();

// return($enrolledCourses);


    return view('backend.pages.students.course-permission', [
        'student' => $student,
        'enrolledCourses' => $student->courses,
    ]);
    }


    public function dashboard()
    {

        return view('frontend.pages.student.dashboard');
    }

    public function profile()
    {

        return view('frontend.pages.student.profile');
    }
}
