<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class SubmitAllRequest extends FormRequest
{
    public function authorize(): bool
    {
        $attempt = $this->route('attempt');
        return $attempt->user_id === auth()->id() && $attempt->isInProgress();
    }

    public function rules(): array
    {
        $attempt = $this->route('attempt');
        $questionIds = $attempt->quiz->questions->pluck('id')->toArray();
        
        $rules = [];
        foreach ($questionIds as $qId) {
            $rules["answers.{$qId}"] = ['required', 'array', 'min:1'];
            $rules["answers.{$qId}.*"] = ['integer', 'exists:question_options,id'];
        }
        
        return $rules;
    }
}