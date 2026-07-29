<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
     use HandlesFiles;
    public function userProfile(Request $request)
    {
        return view('student.profile.index', [
            'user' => $request->user(),
        ]);
    }



    public function userProfileUpdate(Request $request)
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



    public function studentProfile(Request $request): View
    {
        $user = $request->user();

        return view('student.profile.student-profile', [
            'user'    => $user,
            'student' => $user->student ?? new Student(),
        ]);
    }

    /**
     * Update detailed student profile.
     * Only sent fields are validated and updated. Old data remains untouched.
     */
    public function studentProfileUpdate(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();

        if (empty($data)) {
            return back()->with('info', 'No changes were submitted.');
        }

        // Update existing or create first-time profile
        if ($user->student) {
            $user->student->update($data);
        } else {
            $user->student()->create($data);
        }

        return back()->with('success', 'Student profile updated successfully.');
    }

}