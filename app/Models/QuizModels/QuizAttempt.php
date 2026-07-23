<?php

namespace App\Models\QuizModels;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'attempt_number',
        'started_at',
        'completed_at',
        'score',
        'total_points',
        'percentage',
        'grade',
        'status',
        'time_taken_seconds',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // ─── Relationships ─────────────────────────────

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }

    // ─── Scopes ─────────────────────────────────────

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // ─── Helpers ────────────────────────────────────

    public function isInProgress(): bool
    {
        return $this->status === 'in_progress';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isTimedOut(): bool
    {
        return $this->status === 'timed_out';
    }

    public function timeRemaining(): ?int
    {
        if (!$this->quiz->time_limit_minutes) return null;

        $elapsed = now()->diffInSeconds($this->started_at);
        $limit = $this->quiz->time_limit_minutes * 60;
        $remaining = $limit - $elapsed;

        return max(0, $remaining);
    }

    public function isTimeExpired(): bool
    {
        return $this->timeRemaining() !== null && $this->timeRemaining() <= 0;
    }

    public function getAnswerForQuestion(int $questionId): ?QuizAnswer
    {
        return $this->answers()->where('question_id', $questionId)->first();
    }
}