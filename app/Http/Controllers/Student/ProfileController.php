<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
     use HandlesFiles;
    public function profile(Request $request): View
    {
        return view('student.profile.index', [
            'user' => $request->user(),
        ]);
    }



    public function ProfileUpdate(Request $request)
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