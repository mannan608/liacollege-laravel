<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('course.edit') === true;
    }

    public function rules(): array
    {
        return [
            'question_text' => ['required', 'string'],
            'type' => ['required', 'in:single_choice,multiple_choice,true_false'],
            'explanation' => ['nullable', 'string'],
            'points' => ['required', 'integer', 'min:1'],
            'options' => ['required', 'array', 'min:2'],
            'options.*.text' => ['required', 'string'],
            'options.*.is_correct' => ['boolean'],
        ];
    }
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $options = $this->input('options', []);
            $correctCount = collect($options)->where('is_correct', true)->count();
            
            if ($correctCount === 0) {
                $validator->errors()->add('options', 'At least one option must be marked as correct.');
            }
            
            if ($this->input('type') === 'single_choice' && $correctCount > 1) {
                $validator->errors()->add('options', 'Single choice questions can only have one correct answer.');
            }
        });
    }
}