@php
    $menus = [
        [
            'title' => 'Dashboard',
            'route' => route('student.dashboard'),
            'icon' => '
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 9V9m0 0H5m7 0h7" />
                </svg>
            ',
        ],
        [
            'title' => 'My Profile',
            'route' => route('student.profile'),
            'icon' => '
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            ',
        ],
        // [
        //     'title' => 'My Courses',
        //     'route' => route('student.courses'),
        //     'icon' => '
        //         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        //             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        //                 d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
        //         </svg>
        //     ',
        // ],
        // [
        //     'title' => 'Results',
        //     'route' => route('student.results'),
        //     'icon' => '
        //         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        //             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        //                 d="M9 17v-6m4 6V7m4 10v-4M5 21h14" />
        //         </svg>
        //     ',
        // ],
    ];
@endphp


{{-- <aside id="sidebar"
    class="fixed flex flex-col mt-0 top-0 px-5 left-0 bg-white dark:bg-gray-900 dark:border-gray-800 text-gray-900 h-screen transition-all duration-300 ease-in-out z-99999 border-r border-gray-200"
    x-data="{
        isActive(path) {
            return window.location.pathname === path || '{{ $currentPath }}' === path.replace(/^\//, '');
        }
    }">


    <div class="flex overflow-y-auto duration-300 ease-linear no-scrollbar">
        <nav class="mb-6">
            <!-- Menu Items -->
            <ul class="flex flex-col gap-1">
                <li>
                    <a href="#" class="menu-item group"
                        :class="[
                            isActive('') ? 'menu-item-active' :
                            'menu-item-inactive'
                        ]">

                        <!-- Icon -->
                        <span
                            :class="isActive('') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                    fill="currentColor" />
                            </svg>
                        </span>

                        <!-- Text -->
                        <span class="menu-item-text flex items-center gap-2">
                            Dahsboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-item group"
                        :class="[
                            isActive('') ? 'menu-item-active' :
                            'menu-item-inactive'
                        ]">

                        <!-- Icon -->
                        <span
                            :class="isActive('') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                    fill="currentColor" />
                            </svg>
                        </span>

                        <!-- Text -->
                        <span class="menu-item-text flex items-center gap-2">
                            Profile
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside> --}}
<aside class="hidden md:flex fixed top-0 left-0 w-64  bg-white border-r  dark:bg-gray-900 dark:border-gray-800 text-gray-900 transition-all duration-300 ease-in-out border-gray-200">
    <div class="w-full p-5">

        <div class="mb-8">
            <img src="{{ asset('logo.webp') }}" alt="Logo" class="h-12">
        </div>

        <ul class="space-y-2">
            @foreach ($menus as $menu)
                <li>
                    <a href="{{ $menu['route'] }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                        {{ request()->url() == $menu['route']
                            ? 'bg-secondary-500 text-white'
                            : 'hover:bg-gray-100 text-gray-700' }}">

                        {!! $menu['icon'] !!}
                        <span>{{ $menu['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
</aside>