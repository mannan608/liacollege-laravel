<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Models\LMS\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseEnrollmentController extends Controller
{
    public function index(Request $request): View
    {
        $request->user()->can('student.view') || abort(403);

        $enrollments = Enrollment::query()
            ->select([
                'id',
                'student_id',
                'course_slot_id',
                'status',
                'remarks',
                'approved_by',
                'approved_at',
                'enrolled_at',
                'created_at',
            ])
            ->with([
                'student:id,user_id',
                'student.user:id,name,email',
                'slot:id,course_id,training_center_id,title,training_date,start_time,end_time',
                'slot.course:id,name',
                'slot.trainingCenter:id,name,city',
                'approvedBy:id,name',
            ])
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('backend.pages.LMS.enrollments.index', compact('enrollments'));
    }

    public function update(Request $request, string $role, Enrollment $enrollment): RedirectResponse
    {
        $request->user()->can('student.edit') || abort(403);

        $data = $request->validate([
            'status' => ['required', Rule::in(['pending', 'confirmed', 'cancelled'])],
            'remarks' => ['nullable', 'string', 'max:2000'],
        ]);

        $update = [
            'status' => $data['status'],
            'remarks' => $data['remarks'] ?? $enrollment->remarks,
        ];

        if ($data['status'] === 'confirmed') {
            $update['approved_by'] = $request->user()->id;
            $update['approved_at'] = now();
        } else {
            $update['approved_by'] = null;
            $update['approved_at'] = null;
        }

        $enrollment->update($update);

        return back()->with('success', 'Enrollment status updated successfully.');
    }
}
