<?php
// app/Http/Middleware/CheckQuizTimer.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckQuizTimer
{
    public function handle(Request $request, Closure $next)
    {
        $attempt = $request->route('attempt');

        if ($attempt && $attempt->isInProgress() && $attempt->isTimeExpired()) {
            app(\App\Services\QuizScoringService::class)->finalizeAttempt($attempt, 'timed_out');
            return redirect()->route('student.attempts.result', $attempt);
        }

        return $next($request);
    }
}