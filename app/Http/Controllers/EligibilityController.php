<?php
// app/Http/Controllers/EligibilityController.php

namespace App\Http\Controllers;

use App\Models\EligibilitySubmission;
use App\Services\CourseService;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class EligibilityController extends Controller
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
    public function step1(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Session::put('eligibility_step1', $validator->validated());
        Session::put('eligibility_step', 2);

        return response()->json(['message' => 'Step 1 completed.'], 200);
    }

    /**
     * STEP 2 – validate, merge with session, save to DB.
     */
    public function step2(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'industry'         => 'required|string|in:' . implode(',', array_keys(EligibilitySubmission::INDUSTRIES)),
            'qualification'    => 'required|string',
            'experience_years' => 'required|integer|min:0|max:50',
            'state'            => 'required|string|in:' . implode(',', array_keys(EligibilitySubmission::STATES)),
            'terms_accepted'   => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $step1 = Session::get('eligibility_step1');

        if (! $step1) {
            return response()->json([
                'errors' => ['general' => ['Your session expired. Please refresh and start again.']]
            ], 422);
        }


        $payload = array_merge($step1, $validator->validated());
        $payload['status'] = 'pending';

        $submission = EligibilitySubmission::create($payload);

        // SEND EMAIL TO ADMIN
        Mail::raw(
            "New Eligibility Submission\n\n" .

                "Name: {$submission->name}\n" .
                "Phone: {$submission->phone}\n" .
                "Email: {$submission->email}\n" .
                "Industry: {$submission->industry}\n" .
                "Qualification: {$submission->qualification}\n" .
                "Experience: {$submission->experience_years} years\n" .
                "State: {$submission->state}\n" .
                "Status: {$submission->status}",

            function ($message) {
                $message
                    ->to('mannan.hbdservices@gmail.com')
                    ->subject('New Eligibility Submission - Lia College');
            }
        );

        Session::forget(['eligibility_step1', 'eligibility_step']);

        return response()->json([
            'message' => 'Thank you! Your eligibility check has been submitted successfully.'
        ], 200);
    }

    // Admin Methods
 public function index(Request $request)
{
    $query = EligibilitySubmission::query();

    $submissions = $query->latest()->paginate(15);

    $courses = $this->getCourses();

    // Course code => course title
    $courseTitles = collect($courses)->keyBy('code');

    $submissions->getCollection()->transform(function ($submission) use ($courseTitles) {

        // Qualification code => course title
        $submission->qualification_name =
            $courseTitles->get($submission->qualification)['title']
            ?? $submission->qualification;

        // State code => state name
        $submission->state_name =
            EligibilitySubmission::STATES[$submission->state]
            ?? $submission->state;

        return $submission;
    });

    // return $submissions;

    return view(
        'backend.pages.contacts.eligibility.index',
        compact('submissions')
    );
}

    public function show(EligibilitySubmission $submission)
    {
        return view('admin.eligibility.show', compact('submission'));
    }



    public function destroy(EligibilitySubmission $submission)
    {
        $submission->delete();
        return back()->with('success', 'Submission deleted successfully.');
    }
}
