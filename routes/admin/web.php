<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseProviderController;
use App\Http\Controllers\Admin\CourseResources\CourseContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LMS\CourseModuleController;
use App\Http\Controllers\Admin\LMS\CourseResourcesController;
use App\Http\Controllers\Admin\LMS\CourseSlotController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TrainingCenterController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Student\CourseEnrollmentController;
use App\Http\Controllers\Student\StudentController;
use App\SEO\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/admin/login', '/login')->name('admin.login.redirect');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout.redirect');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('{role}')
    ->name('role.')
    ->where(['role' => '[a-z0-9-]+'])
    ->middleware(['auth', 'active.user', 'role.prefix'])
    ->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('backend.pages.dashboard.index', [
        //         'title' => 'Dashboard',
        //     ]);
        // })->middleware('permission:dashboard.view')->name('dashboard');

        Route::get('dashboard', [DashboardController::class, 'index'])
            ->middleware('permission:dashboard.view')
            ->name('dashboard');

        Route::resource('seo', SeoController::class)
            ->middleware('permission:seo.manage');

        Route::resource('blogs', BlogController::class)
            ->middleware('permission:blog.manage');

        Route::resource('events', EventController::class)
            ->middleware('permission:event.manage');

        Route::resource('roles-permissions', RolePermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('students', StudentController::class);
        Route::resource('universities', UniversityController::class);
        Route::resource('campuses', CampusController::class);
        Route::resource('providers', CourseProviderController::class);
        // Route::get('courses/{course}/resource', [CourseController::class, 'editResource'])->name('resources.edit');
        Route::get('courses/{course}/resource', [CourseController::class, 'courseResources'])->name('resource');
        Route::get('courses/{course}/resource/create', [CourseController::class, 'createResource'])->name('resource.create');
        Route::post('courses/{course}/resource', [CourseController::class, 'storeResource'])->name('resources.store');
        Route::get(
            'courses/{course}/resource/{category}/edit',
            [CourseController::class, 'editResource']
        )->name('resource.edit');
        Route::delete(
            'courses/{course}/resource/{category}',
            [CourseController::class, 'destroyResource']
        )->name('resource.destroy');
        Route::resource('courses', CourseController::class);

        Route::resource('contacts', ContactController::class);
        Route::resource('subscribers', SubscriberController::class);
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('students/{student}/course-permission', [StudentController::class, 'coursePermission'])->name('students.course-permission');
        Route::get('students/{student}/assignment', [StudentController::class, 'assignment'])->name('students.assignment');

        Route::post('students/{student}/course-permission', [StudentController::class, 'saveCoursePermission'])->name('students.course-permission.store');
        Route::resource('training-centers', TrainingCenterController::class);
        Route::resource('course-categories', CourseCategoryController::class);


        Route::get('courses/{course}/modules', [CourseModuleController::class, 'index'])->name('modules.index');

        Route::get('courses/{course}/modules/create', [CourseModuleController::class, 'create'])->name('modules.create');

        Route::post('courses/{course}/modules', [CourseModuleController::class, 'store'])->name('modules.store');

        Route::get('courses/{course}/modules/{module}/edit', [CourseModuleController::class, 'edit'])->name('modules.edit');

        Route::put('courses/{course}/modules/{module}', [CourseModuleController::class, 'update'])->name('modules.update');

        Route::resource('courses.resources', CourseResourcesController::class)
            ->names([
                'index' => 'resources.index',
                'create' => 'resources.create',
                'store' => 'resources.store',
                'edit' => 'resources.edit',
                'update' => 'resources.update',
                'destroy' => 'resources.destroy',
            ])
            ->except(['show']);

        Route::resource('course-slots', CourseSlotController::class);
        Route::resource('enrollments', CourseEnrollmentController::class);


        // updated route list area start
        Route::get('courses/{course}/course-contents', [CourseContentController::class, 'index'])->name('course-contents.index');
        Route::get('courses/{course}/course-content/create', [CourseContentController::class, 'create'])->name('course-content.create');
        Route::post('courses/{course}/course-content', [CourseContentController::class, 'store'])->name('course-content.store');
        Route::get('courses/{course}/course-content/{contentcategory}/edit', [CourseContentController::class, 'edit'])->name('course-content.edit');
        Route::delete('courses/{course}/course-content/{contentcategory}', [CourseContentController::class, 'destroy'])->name('course-content.destroy');
        // updated route list area end


    });
