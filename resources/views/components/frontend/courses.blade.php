<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($courses as $course)
        <div
            class="group bg-white rounded-3xl overflow-hidden border border-gray-100 hover:border-transparent hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2">

            {{-- Image --}}
            <div class="relative h-56 overflow-hidden bg-gray-100">

                <img src="{{ asset('frontend-img/' . $course['image']) }}" alt="{{ $course['title'] }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-linear-to-t from-black/60 via-transparent to-transparent">
                </div>
            </div>

            {{-- Content --}}
            <div class="p-6">
                <h3 class="text-base md:text-lg font-bold text-gray-900 mb-2 line-clamp-2 text-center">
                    {{ $course['title'] }}
                </h3>
                <p class="text-sm md:text-base text-gray-500 mb-2 line-clamp-3">{{ $course['description'] }}</p>
                <div class="flex items-center justify-between mt-4 gap-4 md:gap-6">
                    <a href="{{ route('qualifications.details', $course['slug']) }}"
                        class="group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-white border border-secondary-500 hover:bg-secondary-500 text-secondary-500 hover:text-white rounded-xl font-medium transition-all">

                        <span>View Details</span>
                    </a>

                    <button type="button" data-modal-target="modal-{{ $course['id'] }}"
                        class="open-modal-btn w-1/2 justify-center group/btn text-sm flex items-center gap-2 px-5 py-2.5 bg-brand-500 text-white hover:bg-brand-500  hover:text-white rounded-xl font-medium transition-all">
                        Apply Now
                    </button>

                </div>

            </div>
        </div>

        {{-- Modal --}}
        <div id="modal-{{ $course['id'] }}"
            class="fixed inset-0 z-51 hidden items-center justify-center bg-black/60 p-4">

            <div class="bg-white rounded-xl w-full max-w-4xl relative overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between border-b px-6 py-4">
                    <h3 class="text-lg font-semibold">
                        {{ $course['title'] }}
                    </h3>
                    <button
                        class="close-modal flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" clipRule="evenodd"
                                d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>

                {{-- Body --}}
                <div class="p-4">

                    form here

                </div>
            </div>
        </div>

    @empty

        <div
            class="sm:col-span-2 lg:col-span-3 rounded-md border border-dashed border-slate-300 bg-white p-8 text-center">
            <p class="text-slate-600 font-medium">No courses found.</p>
        </div>
    @endforelse
</div>


{{-- Form Script --}}
<script src="https://link.msgsndr.com/js/form_embed.js"></script>

{{-- Modal Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Open modal
        document.querySelectorAll('.open-modal-btn').forEach(button => {

            button.addEventListener('click', function() {

                const modalId = this.dataset.modalTarget;
                const modal = document.getElementById(modalId);

                modal.classList.remove('hidden');
                modal.classList.add('flex');

                document.body.classList.add('overflow-hidden');
            });
        });

        // Close modal
        document.querySelectorAll('.close-modal').forEach(button => {

            button.addEventListener('click', function() {

                const modal = this.closest('[id^="modal-"]');

                modal.classList.add('hidden');
                modal.classList.remove('flex');

                document.body.classList.remove('overflow-hidden');
            });
        });

        // Close on outside click
        document.querySelectorAll('[id^="modal-"]').forEach(modal => {

            modal.addEventListener('click', function(e) {

                if (e.target === modal) {

                    modal.classList.add('hidden');
                    modal.classList.remove('flex');

                    document.body.classList.remove('overflow-hidden');
                }
            });
        });

    });
</script>
