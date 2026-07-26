<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Models\ContactAdminMessage;
use App\Models\FormalComplaint;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelpController extends Controller
{
    public function portalGuideLine(): View
    {
        return view('student.help.portal-guide');
    }

    public function portalLink(): View
    {
        return view('student.help.links');
    }

    public function portaReports(): View
    {
        return view('student.help.reports');
    }

    public function lodgeFormalComplaint(): View
    {
        return view('student.help.lodge-formal-complaint');
    }

    public function contactAdmin(): View
    {
        return view('student.help.contact-admin');
    }

    public function storeReport(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'authorisation' => 'required|accepted',
            'contacted' => 'required|in:yes,no',
            'issue_types' => 'nullable|array',
            'issue_types.*' => 'string',
            'recognised_code' => 'nullable|string|max:100',
            'course_title' => 'nullable|string|max:255',
            'year_enrolled' => 'nullable|string|max:20',
            'question_id' => 'nullable|string|max:100',
            'description' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['issue_types'] = $request->input('issue_types', []);

        Report::create($validated);

        return back()->with('success', 'Your technical issue report has been submitted successfully. We will attend to it shortly.');
    }

    public function storeFormalComplaint(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'auth_disclosure' => 'required|accepted',
            'auth_terms' => 'required|accepted',
            'contacted' => 'required|in:yes,no',
            'complaint_types' => 'nullable|array',
            'complaint_types.*' => 'string',
            'recognised_code' => 'nullable|string|max:100',
            'course_title' => 'nullable|string|max:255',
            'year_enrolled' => 'nullable|string|max:20',
            'services_description' => 'nullable|string',
            'complaint_description' => 'required|string',
            'resolution_attempts' => 'nullable|string',
            'additional_information' => 'nullable|string',
            'desired_outcome' => 'nullable|string',
            'declarant_name' => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['complaint_types'] = $request->input('complaint_types', []);
        $validated['submission_date'] = now();

        FormalComplaint::create($validated);

        return back()->with('success', 'Your formal complaint/appeal has been submitted successfully. We will investigate and respond shortly.');
    }

    public function storeContactAdmin(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'recognised_code' => 'nullable|string|max:100',
            'course_title' => 'nullable|string|max:255',
            'year_enrolled' => 'nullable|string|max:20',
        ]);

        $validated['user_id'] = auth()->id();

        ContactAdminMessage::create($validated);

        return back()->with('success', 'Your message has been sent to the Student Administrator. We typically respond within 1-2 business days.');
    }
}
