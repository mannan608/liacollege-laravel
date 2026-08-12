<?php
// app/Http/Controllers/EligibilityController.php

namespace App\Http\Controllers;

use App\Models\EligibilitySubmission;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EligibilityController extends Controller
{
  
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

        EligibilitySubmission::create($payload);

        Session::forget(['eligibility_step1', 'eligibility_step']);

        return response()->json([
            'message' => 'Thank you! Your eligibility check has been submitted successfully.'
        ], 200);
    }

    // Admin Methods
    public function index(Request $request)
    {
        $query = EligibilitySubmission::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $submissions = $query->latest()->paginate(15);
        $statuses = EligibilitySubmission::STATUSES;

        return view('admin.eligibility.index', compact('submissions', 'statuses'));
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