    <header
        class="fixed top-0 left-0 w-full z-50 border-b bg-secondary-500 backdrop-blur-md border-white/10  dark:border-gray-800 dark:bg-gray-900/95">

        <nav class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="flex justify-between items-center h-18 md:h-20">
                <!-- Mobile Menu Button -->
                <button id="menuBtn" class="md:hidden">

                    <!-- Hamburger -->
                    <svg id="menuOpenIcon" class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>

                    <!-- Close -->
                    <svg id="menuCloseIcon" class="hidden w-7 h-7 text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>

                </button>
                <!-- Logo -->
                <div class="w-34">
                    <a href="/">
                        <img src="{{ asset('logo.webp') }}" alt="logo" class="w-auto h-auto">
                    </a>
                </div>                

                <div class="flex items-center gap-4 lg:gap-6">
                     @include("frontend.pages.student.layout.user-dropdown")

                </div>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-secondary-500 border-t border-slate-200 shadow-lg">
{{-- //show sidebar menu --}}
            
        </div>
    </header>
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
    </script>
