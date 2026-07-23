<?php

namespace App\Http\Requests\CourseResources;

use App\Models\CourseResources\LessonResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLessonResourceSectionRequest extends FormRequest
{
   public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [
            // Section fields (flat, not nested in "sections")
            'title'         => ['required', 'string', 'max:255'],
            'resource_type' => ['required', 'in:video,content,file,quiz'],
            'status'        => ['nullable', 'boolean'],

            // Items array
            'items'                => ['required', 'array', 'min:1'],
            'items.*.id'           => ['nullable', 'integer', 'exists:lesson_resources,id'],
            'items.*.title'        => ['required', 'string', 'max:255'],
            'items.*.description'  => ['nullable', 'string'],
            'items.*.url'          => ['nullable', 'url', 'max:2048'],
            'items.*.duration'     => ['nullable', 'string', 'max:50'],
            'items.*.file'         => ['nullable', 'file', 'max:10240'], // 10MB max
            'items.*.quiz_id'      => ['nullable', 'integer', 'exists:quizzes,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'items.required' => 'Add at least one video, content, file, or quiz resource.',
            'items.min'      => 'Add at least one video, content, file, or quiz resource.',
        ];
    }
}