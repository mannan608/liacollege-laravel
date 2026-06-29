<?php

namespace App\Repositories\Eloquent;

use App\Models\Campus;
use App\Models\University;
use App\Models\CourseProvider;
use App\Repositories\Interfaces\ProviderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProviderRepository implements ProviderRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return CourseProvider::with('university')
            ->latest()
            ->paginate($perPage);
    }

    public function universities()
    {
        return University::query()
            ->orderBy('name')
            ->get(['id', 'name']);
    }
        public function campuses()
        {
            return Campus::query()
                ->orderBy('name')
                ->get(['id', 'name']);
        }

    public function findById(int $id): CourseProvider
    {
        return CourseProvider::with('university')
            ->findOrFail($id);
    }

    public function create(array $data): CourseProvider
    {
        return DB::transaction(function () use ($data) {

            return CourseProvider::create($data);
        });
    }

    public function update(
        CourseProvider $provider,
        array $data
    ): CourseProvider {
        return DB::transaction(function () use ($provider, $data) {

            $provider->update($data);

            return $provider->fresh();
        });
    }

    public function delete(CourseProvider $provider): bool
    {
        return DB::transaction(function () use ($provider) {
            return $provider->delete();
        });
    }


}