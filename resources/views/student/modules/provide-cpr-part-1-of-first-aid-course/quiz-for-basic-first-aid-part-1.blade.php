<div data-completion-type="quiz">
@php
    $lessonQuizCompleted = isset($lessonQuizAttempt) && $lessonQuizAttempt?->isCompleted();
@endphp

      <div id="quizContainer">
    {{-- Start screen --}}
    <button
        id="startQuizBtn"
        data-url="{{ route('student.lessonQuiz.show', $lesson) }}"
        class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3 rounded-xl">
        Start Quiz
    </button>
</div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const quizContainer = document.getElementById('quizContainer');
    const startQuizBtn = document.getElementById('startQuizBtn');

    if (!quizContainer || !startQuizBtn) {
        return;
    }

    const requestHeaders = {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
    };
    const autoOpenCompletedQuiz = @json($lessonQuizCompleted);

    async function loadQuiz(url) {
        const response = await fetch(url, {
            headers: requestHeaders,
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Unable to load quiz.');
        }

        quizContainer.innerHTML = data.html;

        if (data.completed) {
            window.dispatchEvent(new CustomEvent('lesson-quiz-completed', {
                detail: data,
            }));
        }
    }

    async function submitQuestion(form, submitButton, originalLabel) {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: requestHeaders,
            body: new FormData(form),
        });

        const data = await response.json().catch(function () {
            return {};
        });

        if (!response.ok) {
            const feedback = quizContainer.querySelector('[data-quiz-feedback]');

            if (response.status === 422 && data.errors?.options?.length) {
                if (feedback) {
                    feedback.textContent = data.errors.options[0];
                    feedback.classList.remove('hidden');
                }

                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalLabel;
                }

                return false;
            }

            throw new Error(data.message || 'Unable to save your answer.');
        }

        quizContainer.innerHTML = data.html;

        if (data.completed) {
            window.dispatchEvent(new CustomEvent('lesson-quiz-completed', {
                detail: data,
            }));
        }

        return true;
    }

    startQuizBtn.addEventListener('click', async function () {
        const url = this.dataset.url;

        this.disabled = true;
        this.textContent = 'Loading...';

        try {
            await loadQuiz(url);
        } catch (error) {
            console.error(error);
            this.disabled = false;
            this.textContent = 'Start Quiz';
            alert(error.message || 'Something went wrong.');
        }
    });

    if (autoOpenCompletedQuiz) {
        startQuizBtn.disabled = true;
        startQuizBtn.textContent = 'Loading result...';

        loadQuiz(startQuizBtn.dataset.url).catch(function (error) {
            console.error(error);
            startQuizBtn.disabled = false;
            startQuizBtn.textContent = 'Start Quiz';
        });
    }

    quizContainer.addEventListener('submit', async function (event) {
        const form = event.target;

        if (!form.matches('[data-quiz-answer-form]')) {
            return;
        }

        event.preventDefault();

        const submitButton = form.querySelector('button[type="submit"]');
        const originalLabel = submitButton ? submitButton.innerHTML : '';
        const feedback = quizContainer.querySelector('[data-quiz-feedback]');

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML = 'Saving...';
        }

        if (feedback) {
            feedback.classList.add('hidden');
            feedback.textContent = '';
        }

        try {
            const saved = await submitQuestion(form, submitButton, originalLabel);

            if (saved === false) {
                return;
            }
        } catch (error) {
            console.error(error);

            if (submitButton) {
                submitButton.disabled = false;
                submitButton.innerHTML = originalLabel;
            }

            alert(error.message || 'Something went wrong.');
        }
    });
});
</script>
