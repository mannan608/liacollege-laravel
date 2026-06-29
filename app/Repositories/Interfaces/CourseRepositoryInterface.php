<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;
use Illuminate\Http\Request;

interface CourseRepositoryInterface
{
    public function paginate(int $perPage = 15);

    public function findById(int $id): Course;

    public function create(array $data, Request $request): Course;

    public function update(Course $course,array $data,Request $request): Course;

    public function delete(
        Course $course
    ): bool;

    public function getAll();
}