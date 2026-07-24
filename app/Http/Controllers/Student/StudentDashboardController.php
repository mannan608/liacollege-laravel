<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseContentCategory;
use App\Models\CourseResources\Module;
use App\Models\Document;
use App\Models\Payment;
use App\Models\Student;
use App\Traits\HandlesFiles;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use HandlesFiles;
    public function dashboard(Request $request)
    {
        $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();

        // return $enrollments;

        return view('student.dashboard.index', compact('enrollments'));
    }

    

    public function CourseQuizModule(Course $course,Module $module)
{
    return view('student.course.module.quiz.index',
        compact('course', 'module')
    );
}


public function studentPayment()
{
    $student = auth()->user()->student;

    $payments = Payment::with([
            'enrollment.slot.course',
        ])
        ->where('student_id', $student->id)
        ->latest()
        ->get();

    $pendingPayments = $payments->whereIn('status', [
        'pending',
        'unpaid',
    ]);

    $totalPaid = $payments
        ->where('status', 'paid')
        ->sum('amount');

    $unpaidBalance = $pendingPayments->sum('amount');

    $nextDue = $pendingPayments
        ->sortBy('created_at')
        ->first();

    return view('student.billing.index',
        compact(
            'payments',
            'pendingPayments',
            'totalPaid',
            'unpaidBalance',
            'nextDue'
        )
    );
}

}
