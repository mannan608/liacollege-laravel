<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreLessonResourceRequest;
use App\Http\Requests\CourseResources\UpdateCourseLessonResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\LessonResource;
use App\Models\CourseResources\Module;
use App\Traits\HandlesFiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CourseLessonResourceController extends Controller
{
    use HandlesFiles;

    /**
     * Hardcoded quizzes for now.
     */
    private function quizzes(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Quiz 1',
            ],
            [
                'id' => 2,
                'title' => 'Quiz 2',
            ],
            [
                'id' => 3,
                'title' => 'Quiz 3',
            ],
        ];
    }

    /**
     * Resource types.
     */
    private function resourceTypes(): array
    {
        return LessonResource::RESOURCE_TYPES;
    }

    /**
     * Display lesson resources.
     */
    public function index(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ) {
        $this->authorizeCourseEdit($request);

        $this->validateRelations(
            $course,
            $module,
            $lesson
        );

        $resources = $lesson
            ->resources()
            ->orderBy('sort_order')
            ->latest()
            ->paginate(
                $request->integer('per_page', 15)
            )
            ->withQueryString();

        return view('backend.pages.CourseResources.Lessons.Resources.index',
            compact(
                'course',
                'module',
                'lesson',
                'resources'
            )
        );
    }

    /**
     * Show create form.
     */
    public function create(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson
    ) {
        $this->authorizeCourseEdit($request);

        $this->validateRelations(
            $course,
            $module,
            $lesson
        );

        return view('backend.pages.CourseResources.Lessons.Resources.create',
            [
                'course' => $course,
                'module' => $module,
                'lesson' => $lesson,
                'quizzes' => $this->quizzes(),
                'resourceTypes' => $this->resourceTypes(),
            ]
        );
    }

    /**
     * Store ONE resource.
     *
     * One request = one resource.
     */
    public function store(
    StoreLessonResourceRequest $request,
    string $role,
    Course $course,
    Module $module,
    Lesson $lesson
): RedirectResponse {
    $this->validateRelations(
        $course,
        $module,
        $lesson
    );

    $validated = $request->validated();

    DB::beginTransaction();

    try {

        $lastSortOrder = $lesson
            ->resources()
            ->max('sort_order') ?? 0;

        foreach ($validated['resources'] as $index => $resource) {

            $resourceType = $resource['resource_type'];

            $resourceData = [
                'title' => $resource['title'],
                'resource_type' => $resourceType,
                'sort_order' => ++$lastSortOrder,
                'status' => $resource['status'] ?? true,
            ];

            if ($resourceType === 'video') {

                $resourceData['url'] =
                    $resource['url'];

            }

            if ($resourceType === 'content') {

                $resourceData['description'] =
                    $resource['description'];

            }

            if ($resourceType === 'quiz') {

                $resourceData['url'] =
                    (string) $resource['quiz_id'];

            }

            if ($resourceType === 'file') {

                $resourceData['file_path'] =
                    $this->uploadFile(
                        $request->file(
                            "resources.{$index}.file"
                        ),
                        'course-resources/' . $lesson->id
                    );

            }

            $lesson->resources()->create(
                $resourceData
            );
        }

        DB::commit();

        return $this->redirectToResources(
            $course,
            $module,
            $lesson
        )->with(
            'success',
            count($validated['resources']) .
            ' lesson resource(s) added successfully.'
        );

    } catch (Throwable $e) {

        DB::rollBack();

        report($e);

        return back()
            ->withInput()
            ->with(
                'error',
                'Failed to add lesson resources.'
            );
    }
}

    /**
     * Display resource.
     */
    public function show(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson,
        LessonResource $resource
    ) {
        $this->authorizeCourseEdit($request);

        $this->validateResourceBelongsToLesson(
            $course,
            $module,
            $lesson,
            $resource
        );

        return view(
            'backend.pages.CourseResources.Lessons.Resources.show',
            compact(
                'course',
                'module',
                'lesson',
                'resource'
            )
        );
    }

    /**
     * Show edit form.
     */
    public function edit(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson,
        LessonResource $resource
    ) {
        $this->authorizeCourseEdit($request);

        $this->validateResourceBelongsToLesson(
            $course,
            $module,
            $lesson,
            $resource
        );

        return view(
            'backend.pages.CourseResources.Lessons.Resources.edit',
            [
                'course' => $course,
                'module' => $module,
                'lesson' => $lesson,
                'resource' => $resource,
                'quizzes' => $this->quizzes(),
                'resourceTypes' => $this->resourceTypes(),
            ]
        );
    }

    /**
     * Update ONE resource.
     *
     * Important:
     * - Only sent fields are updated.
     * - Missing fields keep original values.
     * - If type changes, old type data is deleted.
     * - Old file is deleted when replaced.
     */
    public function update(
        UpdateCourseLessonResourceRequest $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson,
        LessonResource $resource
    ): RedirectResponse {
        $this->validateResourceBelongsToLesson(
            $course,
            $module,
            $lesson,
            $resource
        );

        $validated = $request->validated();

        DB::beginTransaction();

        try {
            $oldType = $resource->resource_type;

            $newType = array_key_exists(
                'resource_type',
                $validated
            )
                ? $validated['resource_type']
                : $oldType;

            $typeChanged = $oldType !== $newType;

            $updateData = [];

            /*
             |--------------------------------------------------------------------------
             | COMMON FIELDS
             |--------------------------------------------------------------------------
             */

            if (array_key_exists('title', $validated)) {
                $updateData['title'] = $validated['title'];
            }

            if (array_key_exists('sort_order', $validated)) {
                $updateData['sort_order'] = $validated['sort_order'];
            }

            if (array_key_exists('status', $validated)) {
                $updateData['status'] = $validated['status'];
            }

            if (array_key_exists('resource_type', $validated)) {
                $updateData['resource_type'] = $newType;
            }

            /*
             |--------------------------------------------------------------------------
             | TYPE CHANGED
             |--------------------------------------------------------------------------
             |
             | Remove old type-specific data.
             |
             */

            if ($typeChanged) {
                $this->clearOldResourceData(
                    $resource,
                    $oldType,
                    $updateData
                );
            }

            /*
             |--------------------------------------------------------------------------
             | VIDEO
             |--------------------------------------------------------------------------
             */

            if ($newType === 'video') {
                if (array_key_exists('url', $validated)) {
                    $updateData['url'] = $validated['url'];
                }
            }

            /*
             |--------------------------------------------------------------------------
             | CONTENT
             |--------------------------------------------------------------------------
             */

            if ($newType === 'content') {
                if (array_key_exists('description', $validated)) {
                    $updateData['description'] =
                        $validated['description'];
                }
            }

            /*
             |--------------------------------------------------------------------------
             | FILE
             |--------------------------------------------------------------------------
             */

            if ($newType === 'file') {
                if ($request->hasFile('file')) {
                    $updateData['file_path'] = $this->replaceFile(
                        $request->file('file'),
                        $resource->file_path,
                        'course-resources/' . $lesson->id
                    );
                }
            }

            /*
             |--------------------------------------------------------------------------
             | QUIZ
             |--------------------------------------------------------------------------
             */

            if ($newType === 'quiz') {
                if (array_key_exists('quiz_id', $validated)) {
                    $updateData['url'] =
                        (string) $validated['quiz_id'];
                }
            }

            /*
             |--------------------------------------------------------------------------
             | UPDATE ONLY WHEN DATA EXISTS
             |--------------------------------------------------------------------------
             */

            if (!empty($updateData)) {
                $resource->update($updateData);
            }

            DB::commit();

            return $this->redirectToResources(
                $course,
                $module,
                $lesson
            )->with(
                'success',
                'Lesson resource updated successfully.'
            );
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Failed to update lesson resource.'
                );
        }
    }

    /**
     * Delete resource.
     */
    public function destroy(
        Request $request,
        string $role,
        Course $course,
        Module $module,
        Lesson $lesson,
        LessonResource $resource
    ): RedirectResponse {
        $this->authorizeCourseEdit($request);

        $this->validateResourceBelongsToLesson(
            $course,
            $module,
            $lesson,
            $resource
        );

        DB::beginTransaction();

        try {
            if ($resource->file_path) {
                $this->deleteFile(
                    $resource->file_path
                );
            }

            $resource->delete();

            DB::commit();

            return $this->redirectToResources(
                $course,
                $module,
                $lesson
            )->with(
                'success',
                'Lesson resource deleted successfully.'
            );
        } catch (Throwable $e) {
            DB::rollBack();

            report($e);

            return back()->with(
                'error',
                'Failed to delete lesson resource.'
            );
        }
    }

    /**
     * Clear old resource type data.
     */
    private function clearOldResourceData(
        LessonResource $resource,
        string $oldType,
        array &$updateData
    ): void {
        /*
         * VIDEO
         */
        if ($oldType === 'video') {
            $updateData['url'] = null;
        }

        /*
         * QUIZ
         */
        if ($oldType === 'quiz') {
            $updateData['url'] = null;
        }

        /*
         * CONTENT
         */
        if ($oldType === 'content') {
            $updateData['description'] = null;
        }

        /*
         * FILE
         */
        if ($oldType === 'file') {
            if ($resource->file_path) {
                $this->deleteFile(
                    $resource->file_path
                );
            }

            $updateData['file_path'] = null;
        }
    }

    /**
     * Authorize course edit.
     */
    private function authorizeCourseEdit(
        Request $request
    ): void {
        abort_unless(
            $request->user()?->can('course.edit'),
            403
        );
    }

    /**
     * Validate Course → Module → Lesson.
     */
    private function validateRelations(
        Course $course,
        Module $module,
        Lesson $lesson
    ): void {
        abort_unless(
            (int) $module->course_id === (int) $course->id,
            404
        );

        abort_unless(
            (int) $lesson->module_id === (int) $module->id,
            404
        );
    }

    /**
     * Validate Resource belongs to Lesson.
     */
    private function validateResourceBelongsToLesson(
        Course $course,
        Module $module,
        Lesson $lesson,
        LessonResource $resource
    ): void {
        $this->validateRelations(
            $course,
            $module,
            $lesson
        );

        abort_unless(
            (int) $resource->lesson_id === (int) $lesson->id,
            404
        );
    }

    /**
     * Redirect to resource list.
     */
    private function redirectToResources(
        Course $course,
        Module $module,
        Lesson $lesson
    ): RedirectResponse {
        return redirect(
            role_route(
                'role.resources',
                [
                    'course' => $course->id,
                    'module' => $module->id,
                    'lesson' => $lesson->id,
                ]
            )
        );
    }
}