<?php

namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionRow;
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

    // public function create(
    //     array $data,
    //     Request $request
    // ): Course {

    //     return DB::transaction(function () use ($data, $request) {

    //         $data['slug'] = $this->generateUniqueSlug(
    //             $data['name']
    //         );

    //         $data['created_by'] = auth()->id();
    //         $data['status'] = $data['status'] ?? 'active';

    //         if ($request->hasFile('thumbnail')) {
    //             $data['thumbnail'] = $this->uploadFile(
    //                 $request->file('thumbnail'),
    //                 'courses/thumbnails'
    //             );
    //         }

    //         if ($request->hasFile('course_material')) {
    //             $data['course_material'] = $this->uploadFile(
    //                 $request->file('course_material'),
    //                 'courses/materials'
    //             );
    //         }

    //         return Course::create($data);
    //     });
    // }

    public function create(
        array $data,
        Request $request
    ): Course {

        return DB::transaction(function () use (
            $data,
            $request
        ) {

            /*
            |--------------------------------------------------------------------------
            | Course
            |--------------------------------------------------------------------------
            */

            $course = Course::create([
                'name' => $data['name'],
                'slug' => $this->generateUniqueSlug(
                    $data['name']
                ),
            ]);

            /*
            |--------------------------------------------------------------------------
            | Sections
            |--------------------------------------------------------------------------
            */

            foreach ($request->sections ?? [] as $sectionData) {

                $section = CourseSection::create([
                    'course_id' => $course->id,
                    'section_name' => $sectionData['section_name'] ?? null,
                    'field_types' => $sectionData['field_types'] ?? [],
                ]);

                /*
                |--------------------------------------------------------------------------
                | Rows
                |--------------------------------------------------------------------------
                */

                foreach ($sectionData['rows'] ?? [] as $rowData) {

                    $rowPayload = [];

                    /*
                    |--------------------------------------------------------------------------
                    | Text
                    |--------------------------------------------------------------------------
                    */

                    if (!empty($rowData['text'])) {
                        $rowPayload['text'] = $rowData['text'];
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | File
                    |--------------------------------------------------------------------------
                    */

                    if (
                        isset($rowData['file']) &&
                        $rowData['file'] instanceof \Illuminate\Http\UploadedFile
                    ) {

                        $rowPayload['file'] = $this->uploadFile(
                            $rowData['file'],
                            'courses/sections'
                        );
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Checkbox
                    |--------------------------------------------------------------------------
                    */

                    if (isset($rowData['checkbox'])) {
                        $rowPayload['checkbox'] = $rowData['checkbox'];
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Radio
                    |--------------------------------------------------------------------------
                    */

                    if (isset($rowData['radio'])) {
                        $rowPayload['radio'] = $rowData['radio'];
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Skip Empty Row
                    |--------------------------------------------------------------------------
                    */

                    if (empty($rowPayload)) {
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Create Row
                    |--------------------------------------------------------------------------
                    */

                    CourseSectionRow::create([
                        'course_section_id' => $section->id,
                        'data' => $rowPayload,

                        'is_downloadable' => (int) ($rowData['is_downloadable'] ?? 0),
                        'is_document_submission' => (int) ($rowData['is_document_submission'] ?? 0),
                    ]);
                }
            }

            return $course;
        });
    }

    public function update(Course $course, array $data, Request $request): Course
    {

        return DB::transaction(function () use (
            $course,
            $data,
            $request
        ) {

            if (
                isset($data['name']) &&
                $course->name !== $data['name']
            ) {
                $data['slug'] = $this->generateUniqueSlug(
                    $data['name'],
                    $course->id
                );
            }

            $data['updated_by'] = auth()->id();

            if ($request->hasFile('thumbnail')) {
                $this->deleteFile($course->thumbnail);
                $data['thumbnail'] = $this->uploadFile(
                    $request->file('thumbnail'),
                    'courses/thumbnails'
                );
            }

            if ($request->hasFile('course_material')) {
                $this->deleteFile($course->course_material);
                $data['course_material'] = $this->uploadFile(
                    $request->file('course_material'),
                    'courses/materials'
                );
            }

            $course->update($data);

            return $course->fresh();
        });
    }

    public function delete(Course $course): bool
    {
        $this->deleteFile($course->thumbnail);
        $this->deleteFile($course->course_material);
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
            ? "{$slug}-" . ($count + 1)
            : $slug;
    }
}
