<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Course;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
   
    public function index()
    {
        return view('frontend.lia-collage.welcome' );
    }

     public function about()
    {
        return view('frontend.lia-collage.about');
    }

    public function contact()
    {
        return view('frontend.lia-collage.contact');
    }

     public function faq()
    {
        return view('frontend.faq');
    }
    public function policyAndProcedure()
    {
        return view('frontend.policyAndProcedure');
    }
 
    public function reassessmentPolicy()
    {
        return view('frontend.reassessmentPolicy');
    }

  
    public function courseList()
    {
        return view('frontend.course');
    }
    public function singleCategory($id)
    {
        return view('frontend.single-category');
    }
    public function singleCourse($id)
    {
        return view('frontend.course-details');
    }
    public function workPlacement()
    {
        return view('frontend.work-placement');
    }
    public function individualSupport()
    {
        return view('frontend.lia-collage.individual-support');
    }
    public function ageingSupport()
    {
        return view('frontend.lia-collage.ageing-support');
    }
    public function disabilitySupport()
    {
        return view('frontend.lia-collage.disability-support');
    }
    public function communityService()
    {
        return view('frontend.lia-collage.community-service');
    }
    public function communityServices()
    {
        return view('frontend.lia-collage.community-services');
    }
    public function cardiopulmonaryResuscitation()
    {
        return view('frontend.lia-collage.cardiopulmonary-resuscitation');
    }
    public function firstAidCpr()
    {
        return view('frontend.lia-collage.first-aid-cpr');
    }
     public function enrollmentSlot()
    {
        return view('frontend.pages.student.enrollment.enroll');
    }
     public function enrollmentCourseCheckout()
    {
        return view('frontend.pages.student.enrollment.checkout');
    }
      public function checkoutSuccess()
    {
        return view('frontend.pages.student.enrollment.checkout-message');
    }
    public function leadershipManagement()
    {
        return view('frontend.lia-collage.leadership-management');
    }
    public function projectManagement()
    {
        return view('frontend.lia-collage.project-management');
    }

    public function firstAid(){
        return view('frontend.lia-collage.first-aid');
    }
  
    public function store(Request $request)
    {
        // return $request->all();
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'student_type' => 'required|string',
                'title' => 'nullable|string',
                'nickname' => 'nullable|string',
                'first_name' => 'required|string',
                'middle_name' => 'nullable|string',
                'family_name' => 'required|string',
                'gender' => 'required|string',
                'date_of_birth' => 'required|date',
                'email' => 'required|email',
                'birthplace_city' => 'nullable|string',
                'country_of_birth' => 'nullable|string',
                'nationality' => 'nullable|string',
                'identification_no' => 'nullable|string',
                'usi' => 'nullable|string',
                'cd_building_name' => 'nullable|string',
                'cd_flat_unit' => 'nullable|string',
                'cd_street_number' => 'nullable|string',
                'cd_street_name' => 'nullable|string',
                'cd_city' => 'nullable|string',
                'cd_state' => 'nullable|string',
                'cd_postcode' => 'nullable|string',
                'cd_country' => 'nullable|string',
                'cd_primary_contact' => 'nullable|string',
                'cd_alternate_contact' => 'nullable|string',
                'cd_mobile_phone' => 'nullable|string',
                'different_mailing' => 'sometimes|boolean',
                'overseas_address' => 'sometimes|boolean',
                'pa_building_name' => 'nullable|string',
                'pa_flat_unit' => 'nullable|string',
                'pa_street_number' => 'nullable|string',
                'pa_street_name' => 'nullable|string',
                'pa_city' => 'nullable|string',
                'pa_state' => 'nullable|string',
                'pa_postcode' => 'nullable|string',
                'pa_country' => 'nullable|string',
                'pa_primary_contact' => 'nullable|string',
                'pa_alternate_contact' => 'nullable|string',
                'pa_mobile_phone' => 'nullable|string',
                'opa_building_name' => 'nullable|string',
                'opa_flat_unit' => 'nullable|string',
                'opa_street_number' => 'nullable|string',
                'opa_street_name' => 'nullable|string',
                'opa_city' => 'nullable|string',
                'opa_state' => 'nullable|string',
                'opa_postcode' => 'nullable|string',
                'opa_country' => 'nullable|string',
                'opa_primary_contact' => 'nullable|string',
                'opa_alternate_contact' => 'nullable|string',
                'opa_mobile_phone' => 'nullable|string',
                'aboriginal' => 'nullable|string',
                'english_main' => 'nullable|string',
                'main_language' => 'nullable|string',
                'english_instruction' => 'nullable|string',
                'english_test' => 'nullable|string',
                'english_test_type' => 'nullable|string',
                'english_test_date' => 'nullable|date',
                'listening_score' => 'nullable|string',
                'reading_score' => 'nullable|string',
                'writing_score' => 'nullable|string',
                'speaking_score' => 'nullable|string',
                'overall_score' => 'nullable|string',
                'secondary_school_level' => 'nullable|string',
                'still_attending' => 'nullable|string',
                'secondary_school_type' => 'nullable|string',
                'add_qualifications' => 'sometimes|boolean',
                'edu_level' => 'nullable|string',
                'edu_qual_name' => 'nullable|string',
                'edu_school_name' => 'nullable|string',
                'edu_state_country' => 'nullable|string',
                'edu_year_completed' => 'nullable|string',
                'employment_status' => 'nullable|string',
                'add_employment'     => 'sometimes|boolean',
                'employer_name' => 'nullable|string',
                'occupation_title' => 'nullable|string',
                'employment_from' => 'nullable|date',
                'employment_to' => 'nullable|date',
                'employment_duties' => 'nullable|string',
                'disability' => 'nullable|string',
                'impairment[]' => 'nullable',
                'city_of_birth' => 'nullable|string',
                'study_mode' => 'nullable|string',
                'intake_year' => 'nullable|string',
                'course_code' => 'nullable|string',
                'study_type' => 'nullable|string',
                'intake_date' => 'nullable|string',
                'course_location' => 'nullable|string',
                'study_reason' => 'nullable|string',
                'declaration' => 'sometimes|boolean',
                'education_history' => 'nullable|array',
                'employment_history' => 'nullable|array',
                'applied_courses' => 'nullable|array',
                'current_course' => 'nullable|array',
            ]);

            $validatedData['add_employment']     = $request->boolean('add_employment');
            $validatedData['add_qualifications'] = $request->boolean('add_qualifications');
            $validatedData['declaration']        = $request->boolean('declaration');
            $validatedData['different_mailing']  = $request->boolean('different_mailing');
            $validatedData['overseas_address']   = $request->boolean('overseas_address');
            $validatedData['created_at'] = now();
            $validatedData['updated_at'] = now();

            // Convert arrays to JSON for storage
            if (isset($validatedData['education_history'])) {
                $validatedData['education_history'] = json_encode($validatedData['education_history']);
            }
            if (isset($validatedData['employment_history'])) {
                $validatedData['employment_history'] = json_encode($validatedData['employment_history']);
            }
            if (isset($validatedData['applied_courses'])) {
                $validatedData['applied_courses'] = json_encode($validatedData['applied_courses']);
            }
            if (isset($validatedData['current_course'])) {
                $validatedData['current_course'] = json_encode($validatedData['current_course']);
            }

            // Store in database
            $application = DB::table('applications')->insert($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Application submitted successfully',
                'data' => $request->all()
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function fast_track_qualifications()
    {

        return view('meta-service.pages.fast-track-qualifications');
    }

    public function show($slug)
    {
        return view('meta-service.pages.fast-track-course-details');
    }

    public function route_list()
    {
        $excludedRoutes = [
            'admin',
            'login',
            'register',
            'password',
            'api',
            '_',
            'sitemap',
            'up',
            'clear',
            'logout',
            'route-list',
            'password.reset',
            'Storage.local',
            'N/A',
            'user/password-reset',
            'application',
            'course-details',
            'course-list',
            'course.list',
        ];

        $data = collect(Route::getRoutes())
            ->filter(function ($route) use ($excludedRoutes) {

                $uri = $route->uri();

                // Only GET routes
                if (!in_array('GET', $route->methods())) {
                    return false;
                }

                // Skip auth protected routes
                if (in_array('auth', $route->middleware())) {
                    return false;
                }

                // Skip excluded prefixes
                foreach ($excludedRoutes as $prefix) {
                    if (str_starts_with($uri, $prefix)) {
                        return false;
                    }
                }

                return true;
            })
            ->map(function ($route) {
                return [
                    'uri'  => $route->uri() === '/' ? '/' : '/' . $route->uri(),
                    'name' => $route->getName() ?? 'N/A',
                ];
            })
            ->values();

        return response()->json($data);
    }

 
    // public function documentDownload(Course $course)
    // {
    //     $filePath = public_path('uploads/courses/' . $course->course_material);

    //     if (! file_exists($filePath)) {
    //         abort(404, 'File not found');
    //     }

    //     return response()->download($filePath);
    // }
   
}
