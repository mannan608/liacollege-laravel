<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Student;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\SEO\Models\SeoMeta;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function index(string $role)
    {
        $students = Student::with('user','courses')
        ->latest()
        ->get();

         $totalCourses = Course::count();
        // return $students;

        return view('backend.pages.dashboard.index', [
            'students' => $students,
            'totalCourses' => $totalCourses
        ]);
    }
}
