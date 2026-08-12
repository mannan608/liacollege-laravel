<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\EligibilitySubmission;
use App\Models\LMS\CourseSlot;
use App\Models\LMS\Enrollment;
use App\Models\Student;
use App\Models\TrainingCenter;
use App\Models\User;
use App\Services\CourseService;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
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
    public function landingPage()
    {
        $courses = $this->getCourses();
       $coursesByIndustry=$this->groupCoursesByIndustry($courses);

        $industries = EligibilitySubmission::INDUSTRIES;
        $states     = EligibilitySubmission::STATES;

        return $coursesByIndustry;
        return view('frontend.pages.home', compact('courses','states','industries','coursesByIndustry'));
    }

        private function groupCoursesByIndustry(array $courses): array
    {
        $grouped = [];

        foreach ($courses as $course) {
            $industry = $course['industry'] ?? 'Other';
            $grouped[$industry][] = [
                'code'  => $course['code'],
                'title' => $course['title'],
            ];
        }

        return $grouped;
    }

    // public function index()
    // {
    //     return view('frontend.lia-collage.welcome');
    // }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
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

    public function leadershipManagement()
    {
        return view('frontend.lia-collage.leadership-management');
    }
    public function projectManagement()
    {
        return view('frontend.lia-collage.project-management');
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

    public function firstAid(Request $request)
    {
        $courses = Course::query()
            ->with('includes')
            ->whereHas('slots', function ($query) {
                $query->where('status', 'active');
            })
            ->orderBy('name')
            ->get();

        $locations = TrainingCenter::query()
            ->select('city')
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->distinct()
            ->orderBy('city')
            ->get();

        $slots = collect();

        if ($request->filled('course_id') && $request->filled('city')) {
            $slots = CourseSlot::query()
                ->with([
                    'course',
                    'trainingCenter',
                    'users.user',
                ])
                ->where('course_id', $request->course_id)
                ->where('status', 'active')
                ->whereDate('training_date', '>=', now())
                ->when(
                    $request->city !== '__any__',
                    function ($query) use ($request) {
                        $query->whereHas('trainingCenter', function ($centerQuery) use ($request) {
                            $centerQuery->where('city', $request->city);
                        });
                    }
                )
                ->orderBy('training_date')
                ->get();
        }

        // Check if it's an AJAX request
        if ($request->ajax()) {
            // Return only the slots partial view
            return view('frontend.pages.first-aid.slot-filter.course-slots', compact('slots'))->render();
        }

        // return $courses;

        return view('frontend.pages.first-aid.index', compact('courses', 'locations', 'slots'));
    }


    public function firstAidShow(Request $request, Course $course)
    {
        $course->load('includes');

        $locations = TrainingCenter::query()
            ->select('city')
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->distinct()
            ->orderBy('city')
            ->get();

        $slots = collect();

        if ($request->filled('city')) {
            $slots = CourseSlot::query()
                ->with([
                    'course',
                    'trainingCenter',
                    'users.user',
                ])
                ->where('course_id', $course->id)
                ->where('status', 'active')
                ->whereDate('training_date', '>=', now())
                ->when(
                    $request->city !== '__any__',
                    function ($query) use ($request) {
                        $query->whereHas('trainingCenter', function ($centerQuery) use ($request) {
                            $centerQuery->where('city', $request->city);
                        });
                    }
                )
                ->orderBy('training_date')
                ->get();
        }

        if ($request->ajax()) {
            return view(
                'frontend.pages.first-aid.slot-filter.course-slots',
                compact('slots')
            )->render();
        }

        // return $course;

        return view(
            'frontend.pages.first-aid.show',
            compact('course', 'locations', 'slots')
        );
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('frontend.pages.cancel-policy');
    }

    public function paymentPolicy()
    {
        return view('frontend.pages.payment-policy');
    }

    public function rpl()
    {
        return view('frontend.pages.rpl');
    }
}
