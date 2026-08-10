@php
    $courseForms = [
        'individual-support' => 'hBXfJpzmFliSUzVbie86',
        'ageing-support' => 'wl8u8aa5nPZ36dAGyds8',
        'community-services' => '2pdjFMLV9R6WCmpwPwe5',
        'leadership-management' => 'VOPxTFPA6EawBGwuOgly',
        'project-management' => 'KSmGQZqWNAxU1itNZYAq',
    ];

    $formId = $courseForms[$course['slug']] ?? null;
@endphp

<div x-data="{ open: false }">

    {{-- Course Card --}}
    <div class="group overflow-hidden rounded-3xl border border-gray-100 bg-white transition-all duration-500 hover:-translate-y-2 hover:border-transparent hover:shadow-2xl hover:shadow-blue-500/10">
        <div class="relative h-56 overflow-hidden bg-gray-100">
            <img
                src="{{ asset('frontend-img/' . $course['image']) }}"
                alt="{{ $course['title'] }}"
                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                loading="lazy"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        </div>

        <div class="p-6">
            <h3 class="mb-2 line-clamp-2 text-center text-base font-bold text-gray-900 md:text-lg">
                {{ $course['title'] }}
            </h3>

            <p class="mb-2 line-clamp-3 text-sm text-gray-500 md:text-base">
                {{ $course['description'] }}
            </p>

            <div class="mt-4 flex items-center justify-between gap-4 md:gap-6">
                <a
                    href="{{ route('qualifications.details', $course['slug']) }}"
                    class="group/btn flex items-center gap-2 rounded-xl border border-secondary-500 bg-white px-5 py-2.5 text-sm font-medium text-secondary-500 transition-all hover:bg-secondary-500 hover:text-white"
                >
                    <span>View Details</span>
                    <svg class="h-4 w-4 transition-transform group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>

                <button
                    type="button"
                    @click="open = true"
                    class="group/btn flex w-1/2 items-center justify-center gap-2 rounded-xl bg-brand-500 px-5 py-2.5 text-sm font-medium text-white transition-all hover:bg-brand-600"
                >
                    Apply Now
                </button>
            </div>
        </div>
    </div>

    {{-- Modal: Teleported to body so it opens viewport-wide, not section-wise --}}
    <template x-teleport="body">
        <x-ui.course-modal class="max-w-4xl">
            {{-- Modal Header --}}
            <div class="sticky top-0 z-10 flex items-center justify-between border-b border-gray-200 bg-white px-5 py-4 dark:border-gray-700 dark:bg-gray-900 sm:px-6">
                <h3 class="pr-12 text-base font-semibold text-gray-900 dark:text-white sm:text-lg">
                    {{ $course['title'] }}
                </h3>
            </div>

            {{-- Form --}}
            <div class="p-3 sm:p-5">
                @if ($formId)
                    <div class="w-full overflow-hidden rounded-lg">
                        <iframe
                            src="https://api.leadconnectorhq.com/widget/form/{{ $formId }}"
                            class="block w-full border-0"
                            style="height: 600px; max-height: 70vh;"
                            id="inline-{{ $formId }}"
                            data-layout="{'id':'INLINE'}"
                            data-trigger-type="alwaysShow"
                            data-activation-type="alwaysActivated"
                            data-deactivation-type="neverDeactivate"
                            data-form-id="{{ $formId }}"
                            title="{{ $course['title'] }} Application Form"
                            loading="lazy"
                            allow="accelerometer; autoplay; camera; encrypted-media; gyroscope; microphone; midi; payment; picture-in-picture; usb; vr; xr-spatial-tracking"
                            sandbox="allow-forms allow-modals allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-downloads"
                        ></iframe>
                    </div>
                    {{-- LeadConnector embed script required for form rendering/resizing --}}
                    <script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
                @else
                    <div class="flex min-h-[300px] items-center justify-center">
                        <p class="font-medium text-red-500">
                            Form not available for this course.
                        </p>
                    </div>
                @endif
            </div>
        </x-ui.course-modal>
    </template>

</div>