<?php

namespace App\Models\QuizModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question_text',
        'type',
        'explanation',
        'order',
        'points',
    ];

    // ─── Relationships ─────────────────────────────

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class)->orderBy('order');
    }

    public function correctOptions()
    {
        return $this->hasMany(QuestionOption::class)->where('is_correct', true);
    }

    // ─── Helpers ────────────────────────────────────

    public function isSingleChoice(): bool
    {
        return $this->type === 'single_choice' || $this->type === 'true_false';
    }

    public function isMultipleChoice(): bool
    {
        return $this->type === 'multiple_choice';
    }

    public function correctOptionIds(): array
    {
        return $this->correctOptions()->pluck('id')->toArray();
    }

   public function checkAnswer(array $selectedOptionIds): bool
{
    // Cast all to integers for reliable comparison
    $selectedIds = array_map('intval', $selectedOptionIds);
    sort($selectedIds);

    $correctIds = array_map('intval', $this->correctOptionIds());
    sort($correctIds);

    return $selectedIds === $correctIds;
}
}