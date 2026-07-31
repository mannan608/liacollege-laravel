@extends('backend.layouts.fullscreen-layout')

@section('content')
    <div x-data="lessonViewer()" class="flex h-screen overflow-hidden">

        <aside class="w-80 lg:w-96 bg-white border-r border-slate-200 flex flex-col shrink-0">

            @foreach ($lessons as $lesson)
                <button @click="loadLesson('{{ $lesson->slug }}')"
                    :class="currentSlug == '{{ $lesson->slug }}' ?
                        'bg-blue-600 text-white' :
                        'hover:bg-gray-100'"
                    class="block w-full text-left p-4">

                    {{ $lesson->title }}

                </button>
            @endforeach

        </aside>


        <main class="flex-1 overflow-y-auto bg-slate-50/50">

            <div x-html="content" class="max-w-5xl mx-auto px-6 lg:px-10 py-8 space-y-6">

                @if ($currentLesson)
                    @include('student.lessons.partials.lesson-content', ['lesson' => $currentLesson])
                @else
                    <div class="p-8 text-center text-gray-500">
                        No lessons found for this module.
                    </div>
                @endif

            </div>

        </main>

    </div>
@endsection
<script>
    function lessonViewer() {
        return {
            currentSlug: '{{ $currentLesson->slug ?? '' }}',
            content: '',

            init() {
                // Keep the initial content that was rendered by Blade
                this.content = this.$root.querySelector('[x-html]').innerHTML;
            },

            async loadLesson(slug) {
                this.currentSlug = slug;

                // Keep the existing query parameters (course & module)
                const url = new URL(window.location.href);
                url.pathname = `/student/e-learning-portal/lessons/${slug}`;
                // query string stays the same automatically

                history.pushState({}, '', url);

                const response = await fetch(`/student/e-learning-portal/lessons/content/${slug}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    this.content = '<div class="p-6 text-red-600">Lesson not found.</div>';
                    return;
                }

                this.content = await response.text();
            }
        }
    }
</script>
