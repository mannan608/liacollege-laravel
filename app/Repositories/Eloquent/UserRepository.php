<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{
    public function paginate(int $perPage = 25): LengthAwarePaginator
    {
        return User::query()
            ->with('roles:id,name', 'primaryRole:id,name')
            ->where('primary_role_id', '!=', 4)
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data): User
    {
        $roleIds = $data['roles'] ?? [];
        unset($data['roles']);

        if (! empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);

        // If no roles provided, assign default role
        if (empty($roleIds)) {
            $defaultRole = Role::where('name', 'default')->first();
            if ($defaultRole) {
                $roleIds[] = $defaultRole->id;
            }
        }

        // Convert IDs to integer to ensure Spatie resolves by ID
        $user->syncRoles(array_map('intval', $roleIds));

        return $user->load('roles', 'primaryRole');
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
        return DB::transaction(function () use ($user): bool {
            $user->loadMissing('student');

            if ($user->student) {
                $user->student->courses()->detach();
                $user->student->coursePermissions()->delete();
                $user->student->assignmentSubmissions()->delete();
                $user->student->forceDelete();
            }

            $user->syncRoles([]);

            return (bool) $user->delete();
        });
    }
}
