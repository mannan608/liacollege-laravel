<?php

namespace App\Http\Requests\CourseResources;

use App\Models\CourseResources\LessonResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLessonResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [

        'sections' => ['required', 'array', 'min:1'],

        'sections.*.title' => ['required', 'string', 'max:255'],

        'sections.*.resource_type' => [
            'required',
            Rule::in(LessonResource::RESOURCE_TYPES),
        ],

        'sections.*.items' => ['required', 'array', 'min:1'],

        'sections.*.items.*.title' => ['required', 'string', 'max:255'],

        'sections.*.items.*.description' => ['nullable', 'string'],

        'sections.*.items.*.url' => ['nullable', 'url', 'max:2048'],

        'sections.*.items.*.quiz_id' => ['nullable', 'integer', 'min:1'],

        'sections.*.items.*.file' => ['nullable', 'file']

    ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator): void {
            if (! $this->hasAnyResourcePayload()) {
                $validator->errors()->add(
                    'resources',
                    'Add at least one video, content, file, or quiz resource.'
                );
            }
        });
    }

    private function hasAnyResourcePayload(): bool
    {
        foreach ($this->input('sections', []) as $section) {
            if (! empty($section['items'] ?? [])) {
                return true;
            }
        }

        return false;
    }
}
