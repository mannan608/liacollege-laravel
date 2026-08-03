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
                'course_permission_role_id',
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
                'slot.course.permissionRoles:id,course_id,name,is_full_access',
                'slot.trainingCenter:id,name,city',
                'approvedBy:id,name',
                'permissionRole:id,course_id,name,is_full_access',
            ])
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

            // resources\views\backend\pages\students\index.blade.php

        return view('backend.pages.students.index', compact('enrollments'));
    }

    public function update(Request $request, string $role, Enrollment $enrollment): RedirectResponse
    {
        $request->user()->can('student.edit') || abort(403);

        $data = $request->validate([
            'status' => ['required', Rule::in(['pending', 'confirmed', 'cancelled'])],
            'course_permission_role_id' => ['nullable', 'integer', 'exists:course_permission_roles,id'],
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

        $update['course_permission_role_id'] = $data['course_permission_role_id'] ?? $enrollment->course_permission_role_id;

        $enrollment->update($update);

        return back()->with('success', 'Enrollment status updated successfully.');
    }
}
