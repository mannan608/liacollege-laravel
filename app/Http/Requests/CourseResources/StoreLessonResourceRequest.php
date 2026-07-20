<?php

namespace App\Http\Requests\CourseResources;

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

        'sections'=>'required|array',

        'sections.*.title'=>'required|string|max:255',

        'sections.*.resource_type'=>[
            'required',
            Rule::in([
                'video',
                'content',
                'file',
                'quiz'
            ])
        ],

        'sections.*.items'=>'required|array|min:1',

        'sections.*.items.*.title'=>'required|string|max:255',

        'sections.*.items.*.description'=>'nullable',

        'sections.*.items.*.url'=>'nullable',

        'sections.*.items.*.quiz_id'=>'nullable|exists:quizzes,id',

        'sections.*.items.*.file'=>'nullable|file'

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
        foreach (['videos', 'contents', 'files', 'quizzes'] as $key) {
            if (! empty($this->input($key, []))) {
                return true;
            }
        }

        return false;
    }
}
