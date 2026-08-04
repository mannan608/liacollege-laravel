<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
       return [
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'course_id' => ['sometimes', 'nullable', 'integer', 'exists:courses,id'],
            'module_id' => ['sometimes', 'nullable', 'integer', 'exists:modules,id'],
            'lesson_id' => ['sometimes', 'nullable', 'integer', 'exists:lessons,id'],
            'description' => ['sometimes', 'nullable', 'string'],
            'status' => ['sometimes', 'required', 'in:draft,published,archived'],
            'time_limit_minutes' => ['sometimes', 'nullable', 'integer', 'min:1', 'max:300'],
            'passing_score' => ['sometimes', 'required', 'integer', 'min:0', 'max:100'],
            'max_attempts' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'shuffle_questions' => ['sometimes', 'boolean'],
            'show_correct_answers' => ['sometimes', 'boolean'],
            'show_explanation' => ['sometimes', 'boolean'],
        ];
    }
}
