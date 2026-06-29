<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Course;
use App\Traits\CourseTrait;
use App\Traits\RouteDiscoveryTrait;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    use CourseTrait, RouteDiscoveryTrait;

    public function landingPage()
    {
         $courses = Course::query()->select('id', 'name', 'slug', 'thumbnail', 'code', 'cricos')->get();
        return view('frontend.pages.home', [
            'title' => 'Pentagon College',
        ],compact('courses'));
    }

    public function aboutPage()
    {
         $courses = Course::query()->select('id', 'name', 'slug', 'thumbnail', 'code', 'cricos')->get();
        return view('frontend.pages.about', ['title' => 'About Us'],compact('courses'));
    }

    public function contactPage()
    {
        return view('frontend.pages.contact', ['title' => 'Contact Us']);
    }
    public function studentInformation()
    {
        return view('frontend.pages.student-information', ['title' => 'Student Information']);
    }
    public function registration()
    {
        return view('frontend.pages.register', ['title' => 'Register']);
    }

    public function courseDetails()
    {
        return view('frontend.pages.course-details', ['title' => 'Course Details']);
    }

    public function courses(Course $courses)
    {
        $courses = Course::query()->select('id', 'name', 'slug', 'thumbnail', 'code', 'cricos')->get();
        return view('frontend.pages.courses', compact('courses'));
    }
    public function singleCourse($slug)
    {
        $courses = Course::where('slug', '!=', $slug)
            ->select('id', 'name', 'slug', 'thumbnail', 'code', 'cricos')
            ->get();

        $course = Course::where('slug', $slug)
            ->select('id', 'name', 'slug','thumbnail','code','cricos')
            ->firstOrFail();

            // return $course;

        $view = 'frontend.pages.courses.' . $slug;

        if (!view()->exists($view)) {
            abort(404, 'Course page template not found');
        }

        return view($view, [
            'course' => $course,
            'title' => $course->name,
            'courses' => $courses,
        ]);
    }
    public function contactForm()
    {

        $courses = $this->getCourses();

        return view('components.frontend.consultation-form', compact('courses'));
    }
    public function showEnrollCourse($slug)
{
    $course = Course::where('slug', $slug)
        ->select('id', 'name', 'slug')
        ->firstOrFail();

    return view('frontend.pages.enroll-course', compact('course'));
}
    public function storeEnrollCourse(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)
        ->select('id', 'name', 'slug')
        ->firstOrFail();

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'message' => ['required', 'string'],
    ]);

    $data['course_id'] = $course->id;

    Contacts::create($data);

    return redirect()
        ->back()
        ->with('success', 'Your Application has been submitted successfully.');
    }
}
