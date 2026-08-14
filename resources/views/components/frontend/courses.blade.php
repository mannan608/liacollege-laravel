@php
    $courseForms = [
        'individual-support' => 'hBXfJpzmFliSUzVbie86',
        'ageing-support' => 'wl8u8aa5nPZ36dAGyds8',
        'community-services' => '2pdjFMLV9R6WCmpwPwe5',
        'leadership-management' => 'VOPxTFPA6EawBGwuOgly',
        'project-management' => 'KSmGQZqWNAxU1itNZYAq',
    ];
@endphp

<div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

    @forelse($courses as $course)

        @include('frontend.pages.common.course-card')

    @empty

        <div class="sm:col-span-2 lg:col-span-3 rounded-md border border-dashed border-slate-300 bg-white p-8 text-center">
            <p class="text-slate-600 font-medium">No courses found.</p>
            <p class="text-slate-400 text-sm mt-1">
                Try another search or filter.
            </p>
        </div>

    @endforelse

</div>

@foreach($courses as $course)
    @php
        $formId = $courseForms[$course['slug']] ?? null;
    @endphp
    @push('modals')
        <div
            id="modal-{{ $course['id'] }}"
            class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/60 p-4"
        >
            <div
                class="bg-white rounded-xl w-full max-w-4xl relative overflow-hidden max-h-[95vh] flex flex-col"
                onclick="event.stopPropagation()"
            >
                <div class="flex items-center justify-between border-b px-6 py-4 shrink-0">
                    <h3 class="text-lg font-semibold text-slate-900">
                        {{ $course['title'] }}
                    </h3>
                    <button
                        type="button"
                        class="close-modal flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 sm:h-11 sm:w-11"
                    >
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C6.43342 6.43442 6.43342 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                                fill="currentColor"
                            />
                        </svg>
                    </button>
                </div>

                <div class="p-4 overflow-y-auto">
                    @if($formId)
                        <iframe
                            src="https://api.leadconnectorhq.com/widget/form/{{ $formId }}"
                            class="w-full border-0 rounded-lg"
                            style="height:600px;"
                            id="inline-{{ $formId }}"
                            data-layout="{'id':'INLINE'}"
                            data-trigger-type="alwaysShow"
                            data-activation-type="alwaysActivated"
                            data-deactivation-type="neverDeactivate"
                            data-form-id="{{ $formId }}"
                            title="{{ $course['title'] }}"
                        ></iframe>
                    @else
                        <p class="text-red-500">
                            Form not available.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    @endpush
@endforeach

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const openButtons = document.querySelectorAll('.open-modal-btn');
    const modals = document.querySelectorAll('[id^="modal-"]');
    const closeButtons = document.querySelectorAll('.close-modal');

    openButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modalId = this.dataset.modalTarget;
            const modal = document.getElementById(modalId);
            if (!modal) return;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modal = this.closest('[id^="modal-"]');
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        });
    });

    modals.forEach(modal => {
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            modals.forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.body.classList.remove('overflow-hidden');
        }
    });
});
</script>
@endpush
