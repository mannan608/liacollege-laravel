<?php

namespace App\Http\Requests\CourseResources;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;


class UpdateQuizResourceRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'title'=>'required|string|max:255',

            'lessons'=>'required|array|min:1',

            'lessons.*.id'=>'nullable|exists:lessons,id',

            'lessons.*.title'=>'required|string|max:255',

            'lessons.*.content'=>'nullable|string',

            'lessons.*.duration'=>'nullable|integer|min:0',

            'lessons.*.lesson_types'=>'nullable|array'

        ];

    }

    protected function prepareForValidation(): void
    {
   
        $modules = $this->input('modules', []);
        foreach ($modules as $key => $module) {
            if (isset($module['id']) && $module['id'] === '') {
                $modules[$key]['id'] = null;
            }
            if (isset($module['lessons'])) {
                foreach ($module['lessons'] as $lKey => $lesson) {
                    if (isset($lesson['id']) && $lesson['id'] === '') {
                        $modules[$key]['lessons'][$lKey]['id'] = null;
                    }
                }
            }
        }
        $this->merge(['modules' => $modules]);
    }
}
