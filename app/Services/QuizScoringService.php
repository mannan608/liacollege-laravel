<?php
// app/Services/QuizScoringService.php

namespace App\Services;

use App\Models\QuizModels\QuizAttempt;

class QuizScoringService
{
    public function finalizeAttempt(QuizAttempt $attempt, string $status = 'completed'): void
    {
        $score = $attempt->answers()->sum('points_earned');
        $totalPoints = $attempt->total_points;
        $percentage = $totalPoints > 0 ? round(($score / $totalPoints) * 100, 2) : 0;

        $attempt->update([
            'status' => $status,
            'completed_at' => now(),
            'score' => $score,
            'percentage' => $percentage,
            'grade' => $attempt->quiz->getGrade($percentage),
            'time_taken_seconds' => now()->diffInSeconds($attempt->started_at),
        ]);
    }
}