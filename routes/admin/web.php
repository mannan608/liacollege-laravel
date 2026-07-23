<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseProviderController;
use App\Http\Controllers\Admin\CourseResources\CourseContentController;
use App\Http\Controllers\Admin\CourseResources\CourseLessonController;
use App\Http\Controllers\Admin\CourseResources\CourseLessonResourceController;
use App\Http\Controllers\Admin\CourseResources\CourseModuleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\LMS\CourseSlotController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Quiz\QuestionController;
use App\Http\Controllers\Admin\Quiz\QuizController;
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



        Route::resource('contacts', ContactController::class);
        Route::resource('subscribers', SubscriberController::class);
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

        // course route
        Route::resource('course-categories', CourseCategoryController::class);
        Route::resource('courses', CourseController::class);

        Route::get('courses/{course}/course-documents', [CourseController::class, 'createDocument'])->name('course-documents');
        Route::post('courses/{course}/course-documents', [CourseController::class, 'storeDocument'])->name('course-documents.store');
        Route::delete('courses/{course}/course-documents', [CourseController::class, 'destroyDocument'])->name('course-documents.delete');


        Route::get('students/{student}/course-permission', [StudentController::class, 'coursePermission'])->name('students.course-permission');
        Route::get('students/{student}/assignment', [StudentController::class, 'assignment'])->name('students.assignment');
        Route::post('students/{student}/course-permission', [StudentController::class, 'saveCoursePermission'])->name('students.course-permission.store');

        Route::resource('training-centers', TrainingCenterController::class);

        Route::resource('course-slots', CourseSlotController::class);

        Route::resource('enrollments', CourseEnrollmentController::class);


        // course study meterials contents
        Route::get('courses/{course}/course-contents', [CourseContentController::class, 'index'])->name('course-contents.index');
        Route::get('courses/{course}/course-content/create', [CourseContentController::class, 'create'])->name('course-content.create');
        Route::post('courses/{course}/course-content', [CourseContentController::class, 'store'])->name('course-content.store');
        Route::get('courses/{course}/course-content/{category}/edit', [CourseContentController::class, 'edit'])->name('course-content.edit');
        Route::delete('courses/{course}/course-content/{category}', [CourseContentController::class, 'destroy'])->name('course-content.destroy');

        // course modules route
        Route::resource('courses.modules', CourseModuleController::class)->names('modules');
        // course lessons route
        Route::resource('courses.modules.lessons', CourseLessonController::class)->names('lessons');

        //Quiz Route
        Route::resource('quizzes', QuizController::class);
        Route::post('quizzes/{quiz}/publish', [QuizController::class, 'publish'])->name('quizzes.publish');
        Route::post('quizzes/{quiz}/archive', [QuizController::class, 'archive'])->name('quizzes.archive');

        // course lessons quiz resource route
        Route::get('courses/{course}/modules/{module}/lessons/{lesson}/resources', [CourseLessonResourceController::class, 'index'])->name('resources.index');
        Route::get('courses/{course}/modules/{module}/lessons/{lesson}/resources/create', [CourseLessonResourceController::class, 'create'])->name('resources.create');
        Route::post('courses/{course}/modules/{module}/lessons/{lesson}/resources', [CourseLessonResourceController::class, 'store'])->name('resources.store');
        Route::get('courses/{course}/modules/{module}/lessons/{lesson}/resources/{resource}/edit', [CourseLessonResourceController::class, 'edit'])->name('resources.edit');
        Route::put('courses/{course}/modules/{module}/lessons/{lesson}/resources/{resource}', [CourseLessonResourceController::class, 'updateSingle'])->name('resources.update');
        Route::delete('courses/{course}/modules/{module}/lessons/{lesson}/resources/{resource}', [CourseLessonResourceController::class, 'destroy'])->name('resources.destroy');


        // Question Management (Nested under Quiz)
        Route::get('quizzes/{quiz}/questions', [QuestionController::class, 'index'])->name('quizzes.questions.index');
        Route::get('quizzes/{quiz}/questions/create', [QuestionController::class, 'create'])->name('quizzes.questions.create');
        Route::post('quizzes/{quiz}/questions', [QuestionController::class, 'store'])->name('quizzes.questions.store');
        Route::get('quizzes/{quiz}/questions/{question}/edit', [QuestionController::class, 'edit'])->name('quizzes.questions.edit');
        Route::put('quizzes/{quiz}/questions/{question}', [QuestionController::class, 'update'])->name('quizzes.questions.update');
        Route::delete('quizzes/{quiz}/questions/{question}', [QuestionController::class, 'destroy'])->name('quizzes.questions.destroy');

        // Reorder Questions
        Route::post('quizzes/{quiz}/questions/reorder', [QuestionController::class, 'reorder'])->name('quizzes.questions.reorder');
    });
