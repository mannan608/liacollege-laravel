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
