<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreQuizResourceRequest;
use App\Http\Requests\CourseResources\UpdateQuizResourceRequestRequest;
use App\Models\Course;
use App\Models\CourseResources\Lesson;
use App\Models\CourseResources\Module;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LessonResourceController extends Controller
{
      public function index(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.LessonResources.index');
    }

    public function create(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.LessonResources.create');
    }
}
