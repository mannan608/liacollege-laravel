<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactAdminMessage;
use App\Models\FormalComplaint;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelpFormController extends Controller
{
    // ==================== REPORTS ====================

    public function reportsIndex(Request $request): View
    {
        $request->user()->can('help.report.list') || abort(403);

        $reports = Report::with('user:id,name,email')
            ->latest()
            ->get();

        return view('backend.pages.help.reports.index', compact('reports'));
    }

    public function reportsShow(Request $request, string $role, Report $report): View
    {
        $request->user()->can('help.report.view') || abort(403);

        $report->load('user:id,name,email');

        return view('backend.pages.help.reports.show', compact('report'));
    }

    public function reportsEdit(Request $request, string $role, Report $report): View
    {
        $request->user()->can('help.report.edit') || abort(403);

        $report->load('user:id,name,email');

        return view('backend.pages.help.reports.edit', compact('report'));
    }

    public function reportsUpdate(Request $request, string $role, Report $report): RedirectResponse
    {
        $request->user()->can('help.report.edit') || abort(403);

        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,resolved,closed',
            'admin_notes' => 'nullable|string',
        ]);

        $report->update($validated);

        return redirect()
            ->route('role.help.reports.show', ['role' => $role, 'report' => $report])
            ->with('success', 'Report updated successfully.');
    }

    public function reportsDestroy(Request $request, string $role, Report $report): RedirectResponse
    {
        $request->user()->can('help.report.delete') || abort(403);

        $report->delete();

        return back()->with('success', 'Report deleted successfully.');
    }

    // ==================== FORMAL COMPLAINTS ====================

    public function complaintsIndex(Request $request): View
    {
        $request->user()->can('help.complaint.list') || abort(403);

        $complaints = FormalComplaint::with('user:id,name,email')
            ->latest()
            ->get();

        return view('backend.pages.help.complaints.index', compact('complaints'));
    }

    public function complaintsShow(Request $request, string $role, FormalComplaint $complaint): View
    {
        $request->user()->can('help.complaint.view') || abort(403);

        $complaint->load('user:id,name,email');

        return view('backend.pages.help.complaints.show', compact('complaint'));
    }

    public function complaintsEdit(Request $request, string $role, FormalComplaint $complaint): View
    {
        $request->user()->can('help.complaint.edit') || abort(403);

        $complaint->load('user:id,name,email');

        return view('backend.pages.help.complaints.edit', compact('complaint'));
    }

    public function complaintsUpdate(Request $request, string $role, FormalComplaint $complaint): RedirectResponse
    {
        $request->user()->can('help.complaint.edit') || abort(403);

        $validated = $request->validate([
            'status' => 'required|in:pending,investigating,resolved,closed,escalated',
            'admin_notes' => 'nullable|string',
        ]);

        $complaint->update($validated);

        return redirect()
            ->route('role.help.complaints.show', ['role' => $role, 'complaint' => $complaint])
            ->with('success', 'Formal complaint updated successfully.');
    }

    public function complaintsDestroy(Request $request, string $role, FormalComplaint $complaint): RedirectResponse
    {
        $request->user()->can('help.complaint.delete') || abort(403);

        $complaint->delete();

        return back()->with('success', 'Formal complaint deleted successfully.');
    }

    // ==================== CONTACT ADMIN MESSAGES ====================

    public function contactsIndex(Request $request): View
    {
        $request->user()->can('help.contact.list') || abort(403);

        $messages = ContactAdminMessage::with('user:id,name,email')
            ->latest()
            ->get();

        return view('backend.pages.help.contacts.index', compact('messages'));
    }

    public function contactsShow(Request $request, string $role, ContactAdminMessage $message): View
    {
        $request->user()->can('help.contact.view') || abort(403);

        $message->load('user:id,name,email');

        return view('backend.pages.help.contacts.show', compact('message'));
    }

    public function contactsEdit(Request $request, string $role, ContactAdminMessage $message): View
    {
        $request->user()->can('help.contact.edit') || abort(403);

        $message->load('user:id,name,email');

        return view('backend.pages.help.contacts.edit', compact('message'));
    }

    public function contactsUpdate(Request $request, string $role, ContactAdminMessage $message): RedirectResponse
    {
        $request->user()->can('help.contact.edit') || abort(403);

        $validated = $request->validate([
            'status' => 'required|in:pending,replied,closed',
            'admin_notes' => 'nullable|string',
            'admin_reply' => 'nullable|string',
        ]);

        $message->update($validated);

        return redirect()
            ->route('role.help.contacts.show', ['role' => $role, 'message' => $message])
            ->with('success', 'Contact message updated successfully.');
    }

    public function contactsDestroy(Request $request, string $role, ContactAdminMessage $message): RedirectResponse
    {
        $request->user()->can('help.contact.delete') || abort(403);

        $message->delete();

        return back()->with('success', 'Contact message deleted successfully.');
    }
}
