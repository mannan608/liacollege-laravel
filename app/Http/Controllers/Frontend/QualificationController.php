<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CourseService;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;

class QualificationController extends Controller
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


    public function courses()
    {
         $courses = $this->getCourses();
        return view('frontend.pages.courses', compact('courses'));
    }

   public function courseDetails($slug)
{
    // Fetch all courses
    $courses = collect($this->courseService->getCourses());

    // Find current course
    $course = $courses->firstWhere('slug', $slug);

    // 404 if not found
    if (!$course) {
        abort(404);
    }

    // View path
    $view = 'frontend.pages.courses.' . $slug;

    // Check blade exists
    if (!view()->exists($view)) {
        abort(404, 'Course page template not found');
    }

    return view($view, [
        'course' => $course,
    ]);
}
    

}
