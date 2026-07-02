<?php

namespace App\Repositories\Interfaces;

use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface StudentRepositoryInterface
{
    public function paginate(int $perPage = 25): LengthAwarePaginator;

    public function all(): Collection;

    public function create(array $data): Student;

    public function update(User $user, array $data): User;

    public function delete(User $user): bool;
}
