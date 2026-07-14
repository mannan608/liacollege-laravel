<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseRepository implements CourseRepositoryInterface
{
    use HandlesFiles;

    public function getAll()
    {
        return Course::select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function paginate(int $perPage = 15)
    {
        return Course::latest()
            ->paginate($perPage);
    }

    public function findById(int $id): Course
    {
        return Course::findOrFail($id);
    }

    public function create(
        array $data,
        Request $request
    ): Course {

        return DB::transaction(function () use ($data, $request) {

            $data['slug'] = $this->generateUniqueSlug(
                $data['name']
            );

            $data['created_by'] = auth()->id();
            $data['status'] = $data['status'] ?? 'active';

            if ($request->hasFile('thumbnail')) {

                $data['thumbnail'] = $this->uploadFile(
                    $request->file('thumbnail'),
                    'courses/thumbnails'
                );
            }

            $includes = $this->normalizeIncludes($data['includes'] ?? []);

            unset($data['includes']);

            $course = Course::create($data);

            if (! empty($includes)) {

                foreach ($includes as $index => $include) {

                    $course->includes()->create([
                        'title' => $include,
                        'sort_order' => $index,
                    ]);
                }
            }

            return $course->load([
                'category',
                'includes',
            ]);
        });
    }

    public function update(
        Course $course,
        array $data,
        Request $request
    ): Course {

        return DB::transaction(function () use (
            $course,
            $data,
            $request
        ) {

            $updateData = [];

            foreach ($data as $key => $value) {

                // Skip null values
                if ($value === null) {
                    continue;
                }

                // Only changed values
                if ($course->{$key} != $value) {
                    $updateData[$key] = $value;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Name Changed -> Regenerate Slug
            |--------------------------------------------------------------------------
            */
            if (
                isset($updateData['name']) &&
                $course->name !== $updateData['name']
            ) {

                $updateData['slug'] = $this->generateUniqueSlug(
                    $updateData['name'],
                    $course->id
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Thumbnail Upload
            |--------------------------------------------------------------------------
            */
            if ($request->hasFile('thumbnail')) {

                if (! empty($course->thumbnail)) {
                    $this->deleteFile($course->thumbnail);
                }

                $updateData['thumbnail'] = $this->uploadFile(
                    $request->file('thumbnail'),
                    'courses/thumbnails'
                );
            }

            if (! empty($updateData)) {

                $updateData['updated_by'] = auth()->id();

                $course->update($updateData);
            }

            /*
            |--------------------------------------------------------------------------
            | Includes Update
            |--------------------------------------------------------------------------
            */
            if (array_key_exists('includes', $data)) {

                $course->includes()->delete();

                $includes = $this->normalizeIncludes($data['includes']);

                foreach ($includes as $index => $include) {

                    $course->includes()->create([
                        'title' => $include,
                        'sort_order' => $index,
                    ]);
                }
            }

            return $course->fresh([
                'category',
                'includes',
            ]);
        });
    }

    public function delete(Course $course): bool
    {
        $this->deleteFile($course->thumbnail);

        return $course->delete();
    }

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {

        $slug = Str::slug($name);

        $query = Course::where(
            'slug',
            'LIKE',
            "{$slug}%"
        );

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        $count = $query->count();

        return $count
            ? "{$slug}-".($count + 1)
            : $slug;
    }

    private function normalizeIncludes(array $includes): array
    {
        return collect($includes)
            ->map(function ($include) {
                if (is_array($include)) {
                    $include = $include['title'] ?? '';
                }

                return trim((string) $include);
            })
            ->filter(fn ($include) => $include !== '')
            ->values()
            ->all();
    }
}
