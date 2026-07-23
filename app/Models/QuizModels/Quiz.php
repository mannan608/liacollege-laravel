<?php

namespace App\Models\QuizModels;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'time_limit_minutes',
        'passing_score',
        'max_attempts',
        'shuffle_questions',
        'show_correct_answers',
        'show_explanation',
    ];

    protected $casts = [
        'shuffle_questions' => 'boolean',
        'show_correct_answers' => 'boolean',
        'show_explanation' => 'boolean',
    ];



    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function userAttempts()
    {
        return $this->hasMany(QuizAttempt::class)->where('user_id', auth()->id());
    }   

    // ─── Helpers ────────────────────────────────────

    public function totalPoints(): int
    {
        return $this->questions()->sum('points');
    }

    public function questionCount(): int
    {
        return $this->questions()->count();
    }

    public function canRetake(User $user): bool
    {
        if ($this->max_attempts === null) return true;
        
        $attemptCount = $this->attempts()
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();
            
        return $attemptCount < $this->max_attempts;
    }

    public function getGrade(float $percentage): string
    {
        return match (true) {
            $percentage >= 90 => 'A',
            $percentage >= 80 => 'B',
            $percentage >= 70 => 'C',
            $percentage >= 60 => 'D',
            default => 'F',
        };
    }

    public function isPassed(float $percentage): bool
    {
        return $percentage >= $this->passing_score;
    }
}