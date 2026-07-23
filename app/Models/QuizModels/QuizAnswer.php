<?php

namespace App\Models\QuizModels;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'selected_options',
        'is_correct',
        'points_earned',
    ];

    protected $casts = [
        'selected_options' => 'array',
    ];

    // ─── Relationships ─────────────────────────────

    public function attempt()
    {
        return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOptionModels()
    {
        return QuestionOption::whereIn('id', $this->selected_options ?? [])->get();
    }
}