<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubmitAnswerRequest extends FormRequest
{
    public function authorize(): bool
    {
        $attempt = $this->route('attempt');
        return $attempt->user_id === auth()->id() && $attempt->isInProgress();
    }

    public function rules(): array
    {
        return [
            'options' => ['required', 'array', 'min:1'],
            'options.*' => ['integer', 'exists:question_options,id'],
        ];
    }
}