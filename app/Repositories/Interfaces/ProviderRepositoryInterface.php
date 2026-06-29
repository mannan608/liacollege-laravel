<?php

namespace App\Repositories\Interfaces;

use App\Models\CourseProvider;

interface ProviderRepositoryInterface
{
    public function paginate(int $perPage = 15);

    public function universities();
    public function campuses();

    public function findById(int $id): CourseProvider;

    public function create(array $data): CourseProvider;

    public function update(CourseProvider $provider, array $data): CourseProvider;

    public function delete(CourseProvider $provider): bool;
}