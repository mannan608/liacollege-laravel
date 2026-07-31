@php
    $view = $lesson ? 'student.lessons.lesson.' . $lesson->slug : null;
@endphp

@if($lesson && $view && view()->exists($view))
    @include($view)
@elseif($lesson)
    <div class="rounded-lg border border-yellow-300 bg-yellow-50 p-6">
        <h2 class="text-xl font-semibold">Lesson not found</h2>
        <p class="mt-2 text-gray-600">
            The lesson content for "{{ $lesson->title }}" has not been created yet.
        </p>
    </div>
@else
    <div class="rounded-lg border border-red-300 bg-red-50 p-6">
        <h2 class="text-xl font-semibold">No lesson available</h2>
        <p class="mt-2 text-gray-600">
            Please select a valid module that contains lessons.
        </p>
    </div>
@endif