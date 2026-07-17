<?php

namespace App\Http\Controllers\Admin\CourseResources;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseResources\StoreQuizResourceRequest;
use App\Models\Course;
use App\Models\CourseResources\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Traits\HandlesFiles;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class CourseQuizController extends Controller
{

    public function index(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.Quizs.index', [
            'course' => $course,
            'title' => 'Course Resources',
        ]);
    }

    public function create(Request $request, string $role, Course $course)
    {
        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'module' => new Module(),
        ]);
    }

    public function edit(Request $request, string $role, Course $course, Module $module)
    {
        return view('backend.pages.CourseResources.Quizs.create', [
            'course' => $course,
            'module' => $module,
        ]);
    }

    public function store(StoreQuizResourceRequest $request, string $role, Course $course): JsonResponse {
        return response()->json(['success' => true]);
    }
}
