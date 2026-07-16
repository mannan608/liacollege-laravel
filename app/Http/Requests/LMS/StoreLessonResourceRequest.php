<?php

namespace App\Http\Requests\LMS;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonResourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('modules.create') === true
            || $this->user()?->can('modules.edit') === true;
    }

    public function rules(): array
    {
        $types = implode(',', \App\Models\LMS\LessonResource::RESOURCE_TYPES);

        $fileRules = $this->isMethod('POST')
            ? ['required', 'file', 'mimes:mp4,webm,ogg,mp3,wav,pdf,ppt,pptx,zip', 'max:51200']
            : ['nullable', 'file', 'mimes:mp4,webm,ogg,mp3,wav,pdf,ppt,pptx,zip', 'max:51200'];

        return [
            'lesson_id'     => ['required', 'exists:lessons,id'],
            'title'         => ['required', 'string', 'max:255'],
            'resource_type' => ['required', 'string', 'in:' . $types],
            'file'          => $fileRules,
            'sort_order'    => ['nullable', 'integer', 'min:0'],
        ];
    }
}
