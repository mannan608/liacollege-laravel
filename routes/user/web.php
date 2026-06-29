<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\FrontendController;
use App\SEO\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'landingPage'])->name('home');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about');
Route::get('/contact', [FrontendController::class, 'contactPage'])->name('contact');
Route::get('/student-information', [FrontendController::class, 'studentInformation'])->name('student-information');
Route::get('/course-details', [FrontendController::class, 'courseDetails'])->name('course-details');
Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
Route::get('/courses/{slug}', [FrontendController::class, 'singleCourse'])->name('single-course');
Route::get('/course/enroll/{slug}', [FrontendController::class, 'showEnrollCourse'])
    ->name('enroll-course');

Route::post('/course/enroll/{slug}', [FrontendController::class, 'storeEnrollCourse'])
    ->name('course.enroll');

Route::get('/generate-sitemap', [SitemapController::class, 'generate']);

Route::get('/blogs', [BlogController::class, 'index'])
    ->name('blogs');

Route::get('/blogs/{slug}', [BlogController::class, 'show'])
    ->name('blog-details');

Route::get('/events', [EventController::class, 'index'])
    ->name('events');

Route::get('/events/{slug}', [EventController::class, 'show'])
    ->name('event-details');
Route::post('/inquiry-us', [ContactController::class, 'store'])
    ->name('contact.store');

Route::post('/subscribe', [SubscriberController::class, 'store'])
    ->name('subscribe.store');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/signup', function () {
    return view('backend.pages.auth.signup');
})->name('signup');


Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'active.user'])
    ->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])
            ->name('dashboard');
             Route::get('/profile', [StudentController::class, 'profile'])
            ->name('profile');
    });
