<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Services\CourseService;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
      use CourseTrait, RouteDiscoveryTrait;
         protected $courseService;

    /**
     * Inject the CourseService.
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    
   

    public function index(Request $request)
{
    $request->user()->can('contact.list') || abort(403);

    $courses = $this->getCourses();

    $contacts = Contacts::query()
        ->select([
            'id',
            'name',
            'email',
            'phone',
            'message',
            'course_id',
        ])
        ->latest()
        ->get()
        ->map(function ($contact) use ($courses) {
            $course = collect($courses)->firstWhere('id', (int) $contact->course_id);

            $contact->course_title = $course['title'] ?? 'N/A';

            return $contact;
        });

        // return $contacts;

    return view(
        'backend.pages.contacts.index',
        compact('contacts')
    );
}


public function store(Request $request)
{
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'address' => ['nullable', 'string', 'max:255'],
        'state' => ['nullable', 'string', 'max:100'],
        'post_code' => ['nullable', 'string', 'max:20'],
        'message' => ['nullable', 'string'],
        'course_id' => ['nullable', 'integer'],
    ]);

    $contact = Contacts::create($data);

    // Get course title from public/courses.json
    $courses = json_decode(
        file_get_contents(public_path('courses.json')),
        true
    )['courses'] ?? [];

    $courseTitle = collect($courses)
        ->firstWhere('id', (int) $request->course_id)['title']
        ?? 'Not selected';

    Mail::raw(
        "New Course Inquiry\n\n" .
        "Name: {$contact->name}\n" .
        "Phone: {$contact->phone}\n" .
        "Email: {$contact->email}\n" .
        "Course: {$courseTitle}",
        function ($message) {
            $message
                ->to('enrol@liacollege.edu.au')
                ->subject('New Course Inquiry - Lia College');
        }
    );

    return redirect()
        ->back()
        ->with('success', 'Your inquiry has been submitted successfully.');
}
   public function destroy(Request $request, string $role,Contacts $contact): RedirectResponse
    {
        $request->user()->can('contact.delete') || abort(403);
        $contact->delete();

        return back()->with(
            'success',
            'Contact deleted successfully.'
        );
    }
}
