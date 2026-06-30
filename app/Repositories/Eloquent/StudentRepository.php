<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Models\User;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class StudentRepository implements StudentRepositoryInterface
{

    public function paginate(int $perPage = 25): LengthAwarePaginator
    {
        return Student::query()
            ->with([
                'user.roles:id,name',
                'user.primaryRole:id,name',
                'courses:id,name',
            ])
            ->latest()
            ->paginate($perPage);
    }

    public function all(): Collection
    {
        return User::query()
            ->with('roles:id,name', 'primaryRole:id,name', 'student.courses:id,name')
            ->where('primary_role_id', '=', 4)
            ->latest()
            ->get();
    }

    public function create(array $data): User
    {
        $courseIds = $data['courses'] ?? [];


        unset($data['courses']);

        $studentRole = Role::where('name', 'student')->firstOrFail();

        $data['status'] = 'active';
        $data['primary_role_id'] = $studentRole->id;

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        $user->assignRole($studentRole);

        $student = Student::create([
            'user_id' => $user->id,
        ]);

        if (!empty($courseIds)) {
            $student->courses()->sync($courseIds);
        }

        return $user->load('student.courses');
    }

    public function update(User $user, array $data): User
    {
        $roleIds = $data['roles'] ?? [];
        unset($data['roles']);

        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        // Convert IDs to integer to ensure Spatie resolves by ID
        $user->syncRoles(array_map('intval', $roleIds));

        return $user->load('roles', 'primaryRole');
    }

public function delete(User $user): bool
{
    return (bool) $user->delete();
}
}
