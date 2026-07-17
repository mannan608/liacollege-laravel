<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreModuleRequest;
use App\Models\Course;
use App\Models\LMS\Lesson;
use App\Models\LMS\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CourseQuizController extends Controller
{
   
     public function index(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.Quizs.index',[
            'course' => $course,
            'title' => 'Course Resources',
        ]);
    }  

     public function create(Request $request, string $role, Course $course)
    { 
        return view('backend.pages.CourseResources.Quizs.create',[
            'course' => $course,
            'module' => new Module(), 
            'title' => 'Course Resources',
        ]);
    }
}
