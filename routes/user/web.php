<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\CourseEnrollmentController;
use App\Http\Controllers\Student\LearningPortalController;
use App\Http\Controllers\Student\QuizAttemptController;
use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentDocumentController;
use App\SEO\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [FrontendController::class, 'landingPage'])->name('home');
// Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about');
// Route::get('/contact', [FrontendController::class, 'contactPage'])->name('contact');
// Route::get('/student-information', [FrontendController::class, 'studentInformation'])->name('student-information');
// Route::get('/course-details', [FrontendController::class, 'courseDetails'])->name('course-details');
// Route::get('/courses', [FrontendController::class, 'courses'])->name('courses');
// Route::get('/courses/{slug}', [FrontendController::class, 'singleCourse'])->name('single-course');
// Route::get('/course/enroll/{slug}', [FrontendController::class, 'showEnrollCourse'])
//     ->name('enroll-course');

// Route::post('/course/enroll/{slug}', [FrontendController::class, 'storeEnrollCourse'])
//     ->name('course.enroll');

Route::get('/generate-sitemap', [SitemapController::class, 'generate']);

// Route::get('/blogs', [BlogController::class, 'index'])
//     ->name('blogs');

// Route::get('/blogs/{slug}', [BlogController::class, 'show'])
//     ->name('blog-details');

// Route::get('/events', [EventController::class, 'index'])
//     ->name('events');

// Route::get('/events/{slug}', [EventController::class, 'show'])
//     ->name('event-details');
// Route::post('/inquiry-us', [ContactController::class, 'store'])
//     ->name('contact.store');

// Route::post('/subscribe', [SubscriberController::class, 'store'])
//     ->name('subscribe.store');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/signup', function () {
    return view('backend.pages.auth.signup');
})->name('signup');


// Home
Route::get('/', [FrontendController::class, 'index'])->name('home');

// About & Static Pages
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');

// Policies
Route::get('/policy-and-procedure', [FrontendController::class, 'policyAndProcedure'])
    ->name('policyAndProcedure');

Route::get('/complaints-and-appeals-policy', [FrontendController::class, 'complaintsAndAppealsPolicy'])
    ->name('complaintsAndAppealsPolicy');

Route::get('/learning-resources-policy', [FrontendController::class, 'learningResourcesPolicy'])
    ->name('learningResourcesPolicy');

Route::get('/reassessment-policy', [FrontendController::class, 'reassessmentPolicy'])
    ->name('reassessmentPolicy');

Route::get('/schedule-of-administrative-fees', [FrontendController::class, 'scheduleOfAdministrativeFees'])
    ->name('scheduleOfAdministrativeFees');

Route::get('/refund-cancellation-policy', [FrontendController::class, 'refundCancellationPolicy'])
    ->name('refundCancellationPolicy');

// Enrollment & Placement
Route::get('/enrolment', [FrontendController::class, 'enrolment'])->name('enrolment');
Route::get('/work-placement', [FrontendController::class, 'workPlacement'])->name('workPlacement');

// Application
Route::get('/application', [FrontendController::class, 'application'])->name('application');
Route::post('/application', [FrontendController::class, 'store'])->name('application.store');

// Single Course Pages
Route::get('/individual-support', [FrontendController::class, 'individualSupport'])
    ->name('individualSupport');

Route::get('/ageing-support', [FrontendController::class, 'ageingSupport'])
    ->name('ageingSupport');

Route::get('/disability-support', [FrontendController::class, 'disabilitySupport'])
    ->name('disabilitySupport');

Route::get('/community-service', [FrontendController::class, 'communityService'])
    ->name('communityService');

Route::get('/community-services', [FrontendController::class, 'communityServices'])
    ->name('communityServices');

Route::get('/cardiopulmonary-resuscitation', [FrontendController::class, 'cardiopulmonaryResuscitation'])
    ->name('cardiopulmonaryResuscitation');

Route::get('/first-aid-cpr', [FrontendController::class, 'firstAidCpr'])
    ->name('firstAidCpr');

Route::get('/leadership-management', [FrontendController::class, 'leadershipManagement'])
    ->name('leadershipManagement');

Route::get('/project-management', [FrontendController::class, 'projectManagement'])
    ->name('projectManagement');

// Fast Track
Route::get('/fast-track-qualifications', [FrontendController::class, 'fast_track_qualifications'])
    ->name('fast-track-qualifications');



// enroll course
Route::get('/first-aid', [FrontendController::class, 'firstAid'])
    ->name('firstAid');

// Route::get(
//     '/first-aid/{course}/{slot}/course-enrollment',
//     [FrontendController::class, 'enrollmentSlot']
// )->name('enrollmentSlot');

// Route::post(
//     '/course-enrollment/checkout',
//     [FrontendController::class, 'enrollmentCourseCheckout']
// )->name('enrollmentCourseCheckout');



// update route
Route::get(
    '/course-enrollment/{enrollment}/success',
    [CourseEnrollmentController::class, 'success']
)->name('course-enrollment.success');

Route::get(
    '/course-enrollment/{course}/{slot}',
    [CourseEnrollmentController::class, 'create']
)->name('course-enrollment.create');


Route::post(
    '/course-enrollment/checkout',
    [CourseEnrollmentController::class, 'checkout']
)->name('course-enrollment.checkout');







Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'active.user'])
    ->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/profile', [StudentController::class, 'profileEdit'])
            ->name('profile');
        Route::get('/profile/edit', [StudentController::class, 'profileEdit'])
            ->name('profile.edit');
        Route::put('/profile', [StudentController::class, 'studentProfileUpdate'])
            ->name('profile.update');
        Route::post('rows/{row}/submit', [StudentController::class, 'assignmentSubmit'])
            ->name('rows.submit');
        Route::get('rows/{row}/download', [StudentController::class, 'download'])
            ->name('rows.download');
        Route::get('/course/view/{slug}', [StudentController::class, 'view'])
            ->name('rows.view');


        Route::get('/certificate', [StudentController::class, 'studentCertificate'])
            ->name('certificate');
        Route::get('/document', [StudentController::class, 'studentDocumnet'])
            ->name('document');

        Route::get('/billing', [StudentController::class, 'studentBilling'])
            ->name('billing');

        Route::get('/courses', [StudentDashboardController::class, 'enrollmentCourses'])
            ->name('enrollment-courses');
        Route::get('/courses/{course}', [StudentDashboardController::class, 'CourseDetails'])
            ->name('course-details');

        //  Route::get('/course-details/module', [StudentController::class, 'CourseModule'])
        // ->name('course-module');

        Route::get('/courses/{course}/modules/{module}', [StudentDashboardController::class, 'CourseModule'])
            ->name('course-module');

        Route::get('/courses/{course}/modules/{module}/learning-portal', [LearningPortalController::class, 'launchLearningPortal'])
            ->name('launch-portal');

        Route::get(
            '/courses/{course}/modules/{module}/learning-portal/lesson/{lesson}/resource',
            [LearningPortalController::class, 'lessonResources']
        )->name('lesson.resources');

        //student documnet

        Route::get('/student-document', [StudentDocumentController::class, 'studentDocument'])
            ->name('student-document');
        Route::post('/student-document', [StudentDocumentController::class, 'storeStudentDocument'])
            ->name('student-document');
        Route::delete('/student-document/{document}', [StudentDocumentController::class, 'destroyStudentDocument'])->name('student-document.destroy');
        Route::get('/confirmation-letter', [StudentDocumentController::class, 'confirmationLetter'])->name('confirmation-letter');
        Route::get('/signed-terms', [StudentDocumentController::class,    'signedTerms'])->name('signed-terms');
        Route::get('/transcript', [StudentDocumentController::class,    'transcript'])->name('transcript');
        Route::get('/tasks', [StudentDocumentController::class,    'tasks'])->name('tasks.index');

        Route::get('/learning-meterial/{document}/view', [StudentDashboardController::class, 'viewlearningDocument'])->name('learning-document.view');
        Route::get('/billing', [StudentDashboardController::class, 'studentPayment'])->name('student-payment');


        // Quiz List & Details
        Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');
        Route::get('quizzes/{quiz:slug}', [QuizController::class, 'show'])->name('quizzes.show');

        // Quiz Attempt Flow
        Route::post('quizzes/{quiz:slug}/start', [QuizAttemptController::class, 'start'])->name('quizzes.start');
        // Route::get('attempts/{attempt}', [QuizAttemptController::class, 'show'])->name('attempts.show');

        // One-by-One Question Flow
        Route::get('attempts/{attempt}/question/{question}', [QuizAttemptController::class, 'question'])->name('attempts.question');

        Route::post('attempts/{attempt}/question/{question}/answer', [QuizAttemptController::class, 'answer'])->name('attempts.answer');
        
        Route::post('attempts/{attempt}/submit', [QuizAttemptController::class, 'submit'])->name('attempts.submit');

        // All-at-Once Flow
        Route::get('attempts/{attempt}/all-questions', [QuizAttemptController::class, 'allQuestions'])->name('attempts.all');
        Route::post('attempts/{attempt}/submit-all', [QuizAttemptController::class, 'submitAll'])->name('attempts.submit-all');

        // Results & History
        Route::get('attempts/{attempt}/result', [QuizAttemptController::class, 'result'])->name('attempts.result');
        Route::get('my-attempts', [QuizAttemptController::class, 'history'])->name('attempts.history');

        // Abandon attempt
        Route::post('attempts/{attempt}/abandon', [QuizAttemptController::class, 'abandon'])->name('attempts.abandon');
    });
