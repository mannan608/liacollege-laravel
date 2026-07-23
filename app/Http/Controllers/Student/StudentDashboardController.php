<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
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

        return view('frontend.pages.student.dashboard', compact('enrollments'));
    }

    public function CourseDetails(Course $course)
    {
        $course->load([
        'documents',
        'modules.lessons',
    ]);
        //    return $course;

        return view('frontend.pages.student.courses.show', compact('course'));
    }

    public function CourseModule(Course $course,Module $module)
{
    return view(
        'frontend.pages.student.course-module.index',
        compact('course', 'module')
    );
}

public function viewlearningDocument(Document $document)
{
  
 abort_unless(auth()->check(), 403);
    $path = public_path($document->file);

    abort_unless(file_exists($path), 404);

    return response()->file($path);
}

public function enrollmentCourses(Request $request)
{
     $student = auth()->user()->student;

        $enrollments = $student->enrollments()->with(['slot', 'slot.course'])->latest()->get();
        // return $enrollments;
    return view('frontend.pages.student.courses.index', compact('enrollments'));
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

    return view(
        'frontend.pages.student.billing',
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
