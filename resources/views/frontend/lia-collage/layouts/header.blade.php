 <!-- header area start -->
 <header class="header header__sticky v__3">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-12">
                 <div class="header__wrapper"
                     style="display: grid; grid-template-columns: 1fr auto 1fr; align-items: center;">

                     <!-- Left Side (Social + Left Menu) -->
                     <div class="header-menu">
                         <div class="header__social__link">
                             <a href="https://www.facebook.com/leadershipinstituteaus"><i
                                     class="fa-brands fa-facebook"></i></a>
                             <a href="#"><i class="fa-brands fa-instagram"></i></a>
                             <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                             <a href="#"><i class="fa-brands fa-youtube"></i></a>
                         </div>
                         <div class="header__menu">
                             <div class="navigation">
                                 <nav class="navigation__menu">
                                     <ul>
                                         <li class="navigation__menu--item">
                                             <a href="{{ url('/') }}" class="navigation__menu--item__link">Home</a>
                                         </li>
                                         <li class="navigation__menu--item">
                                             <a href="{{ url('about') }}"
                                                 class="navigation__menu--item__link">About</a>
                                         </li>
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                     </div>

                     <!-- Logo (Always Center) -->
                     <div class="header__logo">
                         <a class="header__logo--link" href="{{ url('/') }}">
                             <img src="{{ asset('frontend/images/logo/logo.png') }}" class="logo-img" alt="Logo">
                         </a>
                     </div>

                     <!-- Right Side (Right Menu + Lang + Icons) -->
                     <div style="display: flex; align-items: center; justify-content: flex-end; gap: 100px;">
                         <div class="header__menu">
                             <div class="navigation">
                                 <nav class="navigation__menu">
                                     <ul>
                                         <li class="navigation__menu--item has-child has-arrow">
                                             <a href="javascript:void(0);"
                                                 class="navigation__menu--item__link">Course</a>
                                             <ul class="submenu sub__style">
                                                 <li><a href="{{ url('individual-support') }}">CHC33021 Certificate
                                                         III in Individual Support</a></li>
                                                 <li><a href="{{ url('ageing-support') }}">CHC43015 Certificate IV
                                                         in Ageing Support</a></li>
                                                 <li><a href="{{ url('community-service') }}">CHC52021 Diploma of
                                                         Community Services</a></li>
                                                 <li><a href="{{ url('community-services') }}">CHC52025 Diploma of
                                                         Community Services</a></li>
                                                 <li><a href="{{ url('leadership-management') }}">BSB50420 Diploma
                                                         of Leadership and Management</a></li>
                                                 <li><a href="{{ url('project-management') }}">BSB50820 Diploma of
                                                         Project Management</a></li>
                                                 <li><a href="{{ url('first-aid') }}">First Aid & CPR</a></li>
                                             </ul>
                                         </li>
                                         <li class="navigation__menu--item">
                                             <a class="navigation__menu--item__link"
                                                 href="{{ url('contact') }}">Contact</a>
                                         </li>
                                     </ul>
                                 </nav>
                             </div>
                         </div>
                         <div class="header__right">
                             <div class="header__right--item">

                                 {{-- @auth

                                        <div class="dropdown">
                                            <button class="login__btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-light fa-user"></i>
                                            </button>

                                            <ul class="dropdown-menu px-4">
                                                <li>
                                                    <a href="{{ url(auth()->user()->role . '/dashboard') }}">
                                                        Dashboard
                                                    </a>
                                                </li>

                                                <li>
                                                    <form action="{{ route('logout') }}" method="get">
                                                        @csrf
                                                        <button type="submit"
                                                            style="font-size: 14px;border: none; text-align: left">
                                                            Logout
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endauth --}}

                                 @auth
                                     <a href="{{ auth()->user()->rolePrefix() === 'student'
                                         ? route('student.dashboard')
                                         : route('role.dashboard', ['role' => auth()->user()->rolePrefix()]) }}"
                                         class="login__btn">

                                         <i class="fa-light fa-user"></i>
                                     </a>
                                 @endauth

                                 @guest
                                     <a href="{{ route('login') }}" class="login__btn " data-bs-toggle="tooltip"
                                         data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                         data-bs-title="Student Login">
                                         <i class="fa-light fa-user"></i>
                                     </a>
                                 @endguest


                                 <div id="search-btn" class="search__trigger">
                                     <i class="fa-sharp fa-light fa-magnifying-glass"></i>
                                 </div>
                                 <div id="menu-btn" class="menu__trigger">
                                     <img src="{{ asset('frontend/images/icon/menu__bar-3.svg') }}" alt="bar">
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </header>
