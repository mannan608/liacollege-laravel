    <div x-data="{ showModal: false }" @open-apply-modal.window="showModal = true">
        <header
            class="fixed top-0 left-0 w-full z-50 border-b bg-white backdrop-blur-md border-white/10  dark:border-gray-800 dark:bg-gray-900/95">

            <nav class="max-w-7xl mx-auto px-5 lg:px-8">

                <div class="flex justify-between items-center h-18 md:h-20">
                    <!-- Mobile Menu Button -->
                    <button id="menuBtn" class="md:hidden">

                        <!-- Hamburger -->
                        <svg id="menuOpenIcon" class="w-7 h-7 text-brand-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>

                        <!-- Close -->
                        <svg id="menuCloseIcon" class="hidden w-7 h-7 text-brand-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>

                    </button>
                    <!-- Logo -->
                    <div class="w-11 sm:w-12 md:w-14 lg:w-16">
                        <a href="/">
                            <img src="{{ asset('logo.webp') }}" alt="logo" class="w-auto h-auto">
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center gap-4 md:gap-6 lg:gap-8 text-sm lg:text-[15px]">

                        {{-- Home --}}
                        <a href="{{ route('home') }}"
                            class="relative font-normal transition-all duration-300
                        {{ request()->routeIs('home') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300">

                            Home
                        </a>

                        <a href="#" id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                            data-dropdown-trigger="hover"
                            class="flex items-center relative font-normal transition-all duration-300
                            {{ request()->routeIs('') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300"
                            type="button">
                            Our Qualifications
                            <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 9-7 7-7-7" />
                            </svg>
                        </a>

                        <!-- Dropdown menu -->
                        <div id="dropdownHover"
                            class="z-50 hidden top-full left-0 bg-white rounded-md shadow-lg max-w-150 absolute">
                            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownHoverButton">

                                @forelse($courses as $course)
                                    <li>
                                        <a href="{{ route('qualifications.details', $course['slug']) }}"
                                            class="inline-flex items-center w-full p-2 hover:bg-gray-100 hover:text-heading rounded">

                                            {{ $course['title'] }}
                                        </a>
                                    </li>
                                @empty
                                    <li>
                                        <span class="block p-2 text-gray-500">
                                            No courses found
                                        </span>
                                    </li>
                                @endforelse
                                {{-- <li>
                                        <a href="{{ route('first-aid') }}"
                                            class="inline-flex items-center w-full p-2 hover:bg-gray-100 hover:text-heading rounded">

                                            First Aid & CPR
                                        </a>
                                    </li> --}}
                            </ul>
                        </div>


                        {{-- About --}}
                        <a href="{{ route('about') }}"
                            class="relative font-normal transition-all duration-300
                        {{ request()->routeIs('about') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300">

                            About
                        </a>

                        {{-- Contact --}}
                        <a href="{{ route('contact') }}"
                            class="relative font-normal transition-all duration-300
                            {{ request()->routeIs('contact') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                            after:absolute after:left-0 after:-bottom-1.5
                            after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300">

                            Contact
                        </a>

                        {{-- <a href="{{ route('blogs') }}"
                    class="relative font-normal transition-all duration-300
                        {{ request()->routeIs('blogs') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300">

                    Blogs
                </a> --}}

                        {{-- <a href="{{ route('events') }}"
                    class="relative font-normal transition-all duration-300
                        {{ request()->routeIs('contact') ? 'text-brand-500 font-normal after:w-full' : 'text-brand-500 hover:text-brand-500 after:w-0 hover:after:w-full' }}
                        after:absolute after:left-0 after:-bottom-1.5
                        after:h-0.5 after:bg-brand-500 after:transition-all after:duration-300">

                    Events
                </a> --}}

                    </div>

                    <div class="flex items-center gap-4 lg:gap-6">

                        <button type="button" @click="showModal = true"
                            class="text-sm lg:text-base bg-brand-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-brand-600 transition">
                           Admission Enquiry
                        </button>


                        @auth
                            <a href="{{ auth()->user()->rolePrefix() === 'student'
                                ? route('student.dashboard')
                                : route('role.dashboard', ['role' => auth()->user()->rolePrefix()]) }}"
                                class="overflow-hidden rounded-full h-11 w-11 block">

                                <img src="{{ asset('images/user/owner.png') }}" alt="User"
                                    class="w-full h-full object-cover" />
                            </a>
                        @endauth
                        {{-- @guest
                            <a href="{{ route('login') }}" aria-label="Sign in"
                                class="group relative flex items-center justify-center w-10 h-10 rounded-full bg-white border hover:border-brand-500 shadow-sm hover:shadow-md transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="text-gray-500 group-hover:text-brand-600 transition-colors duration-300">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                
                            </a>
                        @endguest --}}
                       

                    </div>

                </div>

            </nav>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-slate-200 shadow-lg">

                <div class="flex flex-col px-6 py-5 space-y-3 text-sm lg:text-[15px]">
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-brand-500 font-medium' : 'text-brand-500' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="{{ request()->routeIs('courses') ? 'text-brand-500 font-medium' : 'text-brand-500' }}">Our
                        Qualifications</a>
                    <a href="{{ route('about') }}"
                        class="{{ request()->routeIs('about') ? 'text-brand-500 font-medium' : 'text-brand-500' }}">About</a>

                    <a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'text-brand-500 font-medium' : 'text-brand-500' }}">Contact</a>

                </div>
            </div>
        </header>
        <x-ui.modal x-model="showModal" class="max-w-2xl p-6">
            @include('frontend.pages.common.apply-form-modal')
        </x-ui.modal>
    </div>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        const openIcon = document.getElementById('menuOpenIcon');
        const closeIcon = document.getElementById('menuCloseIcon');

        menuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

            if (mobileMenu.classList.contains('hidden')) {
                openIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                openIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }

        });

        document.addEventListener('click', (e) => {
            if (e.target.closest('[data-open-apply-modal]')) {
                window.dispatchEvent(new CustomEvent('open-apply-modal'));
            }
        });
    </script>
