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

    public function create(array $data): Student
    {
        $courseIds = $data['courses'] ?? [];
        unset($data['courses']);

        $studentRole = Role::where('name', 'student')->firstOrFail();

        $data['status'] = 'active';
        $data['primary_role_id'] = $studentRole->id;

        if (! empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        $user->assignRole($studentRole);

        $student = Student::create([
            'user_id' => $user->id,
        ]);

        if (! empty($courseIds)) {
            $student->courses()->sync($courseIds);
        }

        return $student->load('user.roles', 'user.primaryRole', 'courses');
    }

    public function update(User $user, array $data): User
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $courseIds = $data['courses'] ?? null;

        unset($data['courses']);

        if (! empty($data)) {
            $user->fill($data);

            if ($user->isDirty()) {
                $user->save();
            }
        }

        if ($courseIds !== null && $user->student) {
            $user->student->courses()->sync($courseIds);
        }

        return $user->fresh('student.courses');
    }

    public function delete(User $user): bool
    {
        return (bool) $user->delete();
    }
}
