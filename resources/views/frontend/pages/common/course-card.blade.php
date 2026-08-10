<div class="qualification-card bg-white border border-slate-200 transition-all duration-300 rounded-md">

    <div class="h-48 overflow-hidden">
        <img
            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
            src="{{ asset('frontend-img/' . $course['image']) }}"
            alt="{{ $course['title'] }}"
        >
    </div>

    <div class="p-6 space-y-4">

        <h3 class="font-semibold text-slate-900 md:text-base text-sm leading-tight mt-2">
            {{ $course['title'] }}
        </h3>

        <p class="text-slate-600 text-sm line-clamp-2">
            {{ $course['description'] }}
        </p>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-6">

            <a
                href="{{ route('qualifications.details', $course['slug']) }}"
                class="flex justify-center items-center w-1/2 bg-white border border-secondary-500 text-secondary-500 hover:bg-secondary-500 hover:text-white rounded py-1.5 font-medium text-sm transition-transform"
            >
                View Details
            </a>

            <button
                type="button"
                data-modal-target="modal-{{ $course['id'] }}"
                class="open-modal-btn w-1/2 bg-brand-600 text-white rounded py-2 font-medium text-sm transition-transform"
            >
                Enroll Now
            </button>

        </div>
    </div>
</div>
