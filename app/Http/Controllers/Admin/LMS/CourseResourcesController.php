<?php

namespace App\Http\Controllers\Admin\LMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\LMS\StoreModuleRequest;
use App\Http\Requests\LMS\UpdateModuleRequest;
use App\Models\Course;
use App\Models\LMS\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseResourcesController extends Controller
{
   public function index(Request $request, string $role, Course $course): View
    {
       
        return view('backend.pages.LMS.module-lessions.index', [
            'course' => $course,
        ]);
   }

   public function create(Request $request, string $role, Course $course)
    {       
        
        return view('backend.pages.LMS.module-lessions.create');
   }
      
}
