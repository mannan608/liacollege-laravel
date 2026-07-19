<?php

namespace App\Http\Requests\CourseResources;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizResourceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['required', 'exists:courses,id'],
            'modules' => ['required', 'array', 'min:1'],
            'modules.*.id' => ['nullable', 'exists:modules,id'],
            'modules.*.title' => ['required', 'string', 'max:255'],
            'modules.*.lessons' => ['required', 'array', 'min:1'],
            'modules.*.lessons.*.id' => ['nullable', 'exists:lessons,id'],
            'modules.*.lessons.*.title' => ['required', 'string', 'max:255'],
            'modules.*.lessons.*.content' => ['nullable', 'string'],
            'modules.*.lessons.*.duration' => ['nullable', 'integer', 'min:0'],
            'modules.*.lessons.*.lesson_types' => ['nullable', 'array'],
            'modules.*.lessons.*.lesson_types.*' => [
                'nullable',
                'string',
                'in:video,pdf,text,mixed,quiz,assignment,link,audio,live_session',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $modules = $this->input('modules', []);

        foreach ($modules as $moduleKey => $module) {
            if (isset($module['id']) && $module['id'] === '') {
                $modules[$moduleKey]['id'] = null;
            }

            foreach ($module['lessons'] ?? [] as $lessonKey => $lesson) {
                if (isset($lesson['id']) && $lesson['id'] === '') {
                    $modules[$moduleKey]['lessons'][$lessonKey]['id'] = null;
                }
            }
        }

        $this->merge(['modules' => $modules]);
    }
}
