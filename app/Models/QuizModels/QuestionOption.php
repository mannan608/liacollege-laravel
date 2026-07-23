<?php

namespace App\Models\QuizModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
        'order',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    // ─── Relationships ─────────────────────────────

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}