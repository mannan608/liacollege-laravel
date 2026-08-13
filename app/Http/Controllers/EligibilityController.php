<?php
// app/Http/Controllers/EligibilityController.php

namespace App\Http\Controllers;

use App\Models\EligibilityApplication;
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
                    ->to('enrol@liacollege.edu.au')
                    ->subject('New Eligibility Submission - Lia College');
            }
        );

        Session::forget(['eligibility_step1', 'eligibility_step']);

        return response()->json([
            'message' => 'Thank you! Your eligibility check has been submitted successfully.'
        ], 200);
    }



    public function saveStep(Request $request)
    {
        $step = (int) $request->input('step');

        if (!in_array($step, [1, 2, 3])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid form step.',
            ], 422);
        }

        $rules = match ($step) {

            1 => [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],

                'phone' => [
                    'required',
                    'string',
                    'max:30',
                ],
            ],

            2 => [
                'industry' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'qualification' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'experience_years' => [
                    'required',
                    'integer',
                    'min:0',
                    'max:100',
                ],
            ],

            3 => [
                'state' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'terms_accepted' => [
                    'required',
                    'accepted',
                ],
            ],
        };


    

        $validator = Validator::make(
            $request->all(),
            $rules
        );


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please correct the errors.',
                'errors' => $validator->errors(),
            ], 422);
        }


        $applicationId = $request->input('application_id');


        if ($applicationId) {

            $application = EligibilityApplication::find($applicationId);

            if (!$application) {
                return response()->json([
                    'success' => false,
                    'message' => 'Eligibility application not found.',
                ], 404);
            }

        } else {

            /*
             * First step creates the application.
             */
            $application = new EligibilityApplication();

        }

       if ($step === 1) {

    Mail::raw(
        "New Eligibility Submission\n\n" .

        "Name: {$application->name}\n" .
        "Phone: {$application->phone}\n" .
        "Email: {$application->email}\n",

        function ($message) {

            $message
                ->to('mannan.hbdservices@gmail.com')
                ->subject(
                    'New Eligibility Submission - Lia College'
                );

        }
    );
}



        if ($step === 2) {

            $application->industry =
                $request->input('industry');

            $application->qualification =
                $request->input('qualification');

            $application->experience_years =
                $request->input('experience_years');

        }

        if ($step === 3) {

            $application->state =
                $request->input('state');

            $application->terms_accepted =
                $request->boolean('terms_accepted');

        }


  
        $application->current_step = $step;


        if ($step === 3) {

            $application->status = 'submitted';

        } else {

            $application->status = 'draft';

        }

        $application->save();

        return response()->json([
            'success' => true,

            'message' => $step === 3
                ? 'Your eligibility application has been submitted successfully.'
                : "Step {$step} saved successfully.",

            'application_id' => $application->id,

            'step' => $application->current_step,

            'status' => $application->status,

            'completed' => $application->status === 'submitted',
        ]);
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
