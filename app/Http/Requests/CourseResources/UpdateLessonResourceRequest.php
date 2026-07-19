<?php

namespace App\Http\Requests\CourseResources;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [
            'lesson_id' => ['required', 'exists:lessons,id'],

            'videos' => ['nullable', 'array'],
            'videos.*.title' => ['required', 'string', 'max:255'],
            'videos.*.url' => ['required', 'url', 'max:2048'],

            'contents' => ['nullable', 'array'],
            'contents.*.title' => ['required', 'string', 'max:255'],
            'contents.*.content' => ['required', 'string'],

            'files' => ['nullable', 'array'],
            'files.*.title' => ['required', 'string', 'max:255'],
            'files.*.file' => ['nullable', 'file', 'mimes:pdf,doc,docx,ppt,pptx', 'max:20480'],
            'files.*.existing_file_path' => ['nullable', 'string', 'max:2048'],

            'quizzes' => ['nullable', 'array'],
            'quizzes.*.quiz_id' => ['required', 'integer', 'min:1'],
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
