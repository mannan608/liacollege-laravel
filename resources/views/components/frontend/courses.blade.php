<div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($courses as $course)
        @include('frontend.pages.common.course-card')
    @endforeach
   
</div>