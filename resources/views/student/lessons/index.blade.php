@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div class="flex h-screen overflow-hidden">

        <aside class="w-80 lg:w-96 bg-white border-r border-slate-200 flex flex-col flex-shrink-0">

            <!-- Course Info -->
            <div class="p-6 bg-gradient-to-br from-brand-500 via-brand-600 to-brand-500 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                <div class="relative">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-0.5 bg-white/20 backdrop-blur-sm rounded-md text-xs font-medium">{{ $course->name }}</span>
                    </div>
                    <p class="text-brand-100 mt-1 text-sm">{{ $module->title }}</p>
                    <div class="mt-5">
                        <div class="flex justify-between text-sm mb-2 font-medium">
                            <span class="text-brand-100">Progress</span>
                            <span>{{ $progressPercent }}%</span>
                        </div>
                        <div class="h-2.5 bg-white/25 rounded-full overflow-hidden backdrop-blur-sm">
                            <div style="width: {{ $progressPercent }}%"
                                class="h-full bg-white rounded-full shadow-sm transition-all duration-700 ease-out">
                            </div>
                        </div>
                        <p class="text-xs text-brand-100 mt-2">{{ $totalCompleted }} of {{ $totalLessons }} lessons completed</p>
                    </div>
                </div>
            </div>

            <!-- Lesson List -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                <div class="p-4">
                    <h3 class="text-slate-400 text-xs uppercase font-bold tracking-wider mb-4 px-2">Course Content</h3>

                    @php
                        $queryParams = array_filter([
                            'course' => $course?->id,
                            'module' => $module?->slug,
                        ]);
                        $queryString = !empty($queryParams) ? '?' . http_build_query($queryParams) : '';
                    @endphp

                    @foreach ($lessons as $moduleLesson)
                        @php
                            $lessonProgress = $progress->get($moduleLesson->id);

                            $isCompleted = $lessonProgress?->is_completed ?? false;

                            $isActive = $currentLesson->id === $moduleLesson->id;

                            $lessonIndex = $lessons->search(fn($item) => $item->id === $moduleLesson->id);

                            $activeIndex = $lessons->search(fn($item) => $item->id === $activeLesson->id);

                            $isLocked = $lessonIndex > $activeIndex;
                        @endphp

                        @if (!$isLocked)
                            <a href="/student/e-learning-portal/lessons/{{ $moduleLesson->slug }}{{ $queryString }}"
                                class="flex items-center gap-3 p-3 rounded-xl
                   transition-all border mb-1 group
                   {{ $isActive ? 'bg-brand-50 border-brand-200' : 'hover:bg-gray-50 border-gray-100' }}">
                        @else
                            <div
                                class="flex items-center gap-3 p-3 rounded-xl
                   border border-gray-100 mb-1
                   opacity-50 cursor-not-allowed">
                        @endif

                        {{-- Icon --}}
                        <div
                            class="w-10 h-10 rounded-lg flex items-center
                   justify-center transition-colors
                   {{ $isCompleted
                        ? 'bg-green-100 text-green-600'
                        : ($isActive
                            ? 'bg-brand-100 text-brand-600'
                            : 'bg-slate-100 text-slate-400') }}">

                            @if ($isCompleted)
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            @elseif ($isLocked)
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 11V7a4 4 0 118 0v4m-10 0h12v10H10V11z" />
                                </svg>
                            @else
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            @endif

                        </div>

                        {{-- Information --}}
                        <div class="flex-1 min-w-0">
                            <h4 class="font-medium text-sm truncate {{ $isActive ? 'text-slate-900' : 'text-slate-700' }}">
                                {{ $moduleLesson->title }}
                            </h4>

                            @if ($isCompleted)
                                <p class="text-xs text-green-600 mt-0.5">Completed</p>
                            @elseif ($isLocked)
                                <p class="text-xs text-slate-400 mt-0.5">Locked</p>
                            @else
                                <p class="text-xs text-brand-500 mt-0.5">Current lesson</p>
                            @endif
                        </div>

                        @if ($isCompleted)
                            <div class="w-5 h-5 rounded-full bg-green-500 text-white flex items-center justify-center">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        @elseif ($isActive)
                            <div class="w-5 h-5 rounded-full border-2 border-brand-500 bg-brand-500"></div>
                        @endif

                        @if (!$isLocked)
                            </a>
                        @else
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main id="learning-portal-main" class="flex-1 overflow-y-auto bg-slate-50/50">

            <!-- Header -->
            <div class="bg-white border-b border-slate-200 sticky top-0 z-40">
                <div class="max-w-5xl mx-auto px-6 lg:px-10 py-5 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-bold text-brand-500 uppercase tracking-wider">
                                {{ $currentLesson ? 'Selected Lesson' : 'Choose a lesson' }}
                            </span>
                        </div>
                        <h1 class="text-base md:text-lg lg:text-xl font-bold text-slate-900 tracking-tight">
                            {{ $currentLesson?->title ?? 'Lesson content will appear here' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('student.dashboard') }}"
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 text-white text-sm font-semibold hover:from-brand-600 hover:to-brand-700 transition-all shadow-lg shadow-brand-500/25 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Go to Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-6 lg:px-10 py-8 space-y-6">
                <section id="lesson-content" class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 lg:p-8">

                    @if ($currentLesson)
                        @include('student.lessons.partials.lesson-content', ['lesson' => $currentLesson])
                    @else
                        <p class="text-sm text-slate-500">Lesson content not found.</p>
                    @endif

                </section>

                <div id="lesson-complete-container"
                    class="hidden opacity-0 translate-y-3 transition-all duration-500">

                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 flex items-center justify-between">

                        <div>
                            <h3 class="font-semibold text-slate-900">Lesson completed</h3>
                            <p class="text-sm text-slate-500 mt-1">Continue when you're ready.</p>
                            <p id="quiz-complete-notice"
                                class="hidden mt-3 text-sm font-medium text-amber-700 bg-amber-50 border border-amber-200 rounded-xl px-3 py-2">
                            </p>
                        </div>

                        <button type="button" id="complete-lesson-btn"
                            class="px-6 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 text-white font-semibold hover:from-brand-600 hover:to-brand-700 transition-all shadow-lg shadow-brand-500/20">
                            <span id="complete-btn-text">Complete & Continue</span>
                        </button>

                    </div>

                </div>

            </div>
        </main>

    </div>
@endsection

<style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 20px;
    }
</style>

@php
    $completeQueryParams = array_filter([
        'course' => $course?->id,
        'module' => $module?->slug,
    ]);
    $completeQueryString = !empty($completeQueryParams) ? '?' . http_build_query($completeQueryParams) : '';
    $completeLessonUrl = "/student/e-learning-portal/lessons/{$currentLesson->slug}/complete{$completeQueryString}";
    $quizNotice = request('quiz_notice');
    $currentLessonCompleted = $progress->get($currentLesson->id)?->is_completed ?? false;
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const lessonContent = document.getElementById('lesson-content');
        const completeContainer = document.getElementById('lesson-complete-container');
        const completeButton = document.getElementById('complete-lesson-btn');
        const completeButtonText = document.getElementById('complete-btn-text');
        const quizNotice = @json($quizNotice);
        const quizNoticeEl = document.getElementById('quiz-complete-notice');
        const currentLessonCompleted = @json($currentLessonCompleted);

        if (!lessonContent || !completeContainer || !completeButton) {
            return;
        }

        if (quizNotice && quizNoticeEl) {
            quizNoticeEl.textContent = quizNotice;
            quizNoticeEl.classList.remove('hidden');
        }

        const completionElement = lessonContent.querySelector('[data-completion-type]');

        if (!completionElement) {
            console.warn('No lesson completion type found.');
            return;
        }

        const completionType = completionElement.dataset.completionType;

        let lessonReady = false;


        /*
        |--------------------------------------------------------------------------
        | Unlock Complete Button
        |--------------------------------------------------------------------------
        */

        function unlockCompleteButton() {

            if (lessonReady) {
                return;
            }

            lessonReady = true;

            completeContainer.classList.remove('hidden');

            requestAnimationFrame(function() {

                completeContainer.classList.remove(
                    'opacity-0',
                    'translate-y-3'
                );

                completeContainer.classList.add(
                    'opacity-100',
                    'translate-y-0'
                );

            });
        }


        /*
        |--------------------------------------------------------------------------
        | If lesson is already completed, show button immediately
        |--------------------------------------------------------------------------
        */

        if (currentLessonCompleted) {
            unlockCompleteButton();
        }


        /*
        |--------------------------------------------------------------------------
        | VIDEO
        |--------------------------------------------------------------------------
        */

        if (completionType === 'video') {

            const video = completionElement.querySelector('[data-lesson-video]');

            if (!video) {
                console.warn('Video element not found.');
                return;
            }

            video.addEventListener('ended', function() {
                unlockCompleteButton();
            });
        }


        /*
        |--------------------------------------------------------------------------
        | CONTENT / SCROLL
        |--------------------------------------------------------------------------
        */

        if (completionType === 'scroll') {

            const scrollContainer = document.getElementById('learning-portal-main');

            if (!scrollContainer) {
                console.warn('Learning portal scroll container not found.');
                return;
            }

            function checkScrollCompletion() {

                const contentRect = completionElement.getBoundingClientRect();
                const containerRect = scrollContainer.getBoundingClientRect();

                const hasReachedBottom = contentRect.bottom <= containerRect.bottom + 30;

                if (hasReachedBottom) {

                    unlockCompleteButton();

                    scrollContainer.removeEventListener(
                        'scroll',
                        checkScrollCompletion
                    );
                }
            }

            checkScrollCompletion();

            scrollContainer.addEventListener(
                'scroll',
                checkScrollCompletion, {
                    passive: true
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | QUIZ
        |--------------------------------------------------------------------------
        */

        if (completionType === 'quiz') {

            window.addEventListener(
                'lesson-quiz-completed',
                function() {
                    unlockCompleteButton();
                }
            );
        }


        /*
        |--------------------------------------------------------------------------
        | COMPLETE & CONTINUE
        |--------------------------------------------------------------------------
        */

        completeButton.addEventListener('click', async function() {

            if (!lessonReady) {
                return;
            }

            completeButton.disabled = true;

            completeButton.classList.add(
                'opacity-60',
                'cursor-not-allowed'
            );

            completeButtonText.textContent = 'Completing...';

            try {

                const response = await fetch(
                    @json($completeLessonUrl), {
                        method: 'POST',

                        headers: {
                            'X-CSRF-TOKEN': document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),

                            'Accept': 'application/json',

                            'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({})
                    }
                );

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(
                        data.message || 'Unable to complete lesson.'
                    );
                }

                completeButtonText.textContent =
                    data.has_next ?
                    'Loading next lesson...' :
                    'Completed!';

                setTimeout(function() {
                    window.location.href = data.redirect;
                }, 400);

            } catch (error) {

                console.error(error);

                completeButton.disabled = false;

                completeButton.classList.remove(
                    'opacity-60',
                    'cursor-not-allowed'
                );

                completeButtonText.textContent = 'Complete & Continue';

                alert(
                    error.message || 'Something went wrong.'
                );
            }
        });

    });
</script>