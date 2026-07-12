<!-- footer start -->
    <footer class="rts-footer v_2 pt--100 pb--100">
        <div class="container">
            <div class="row gy-5 gy-lg-0">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="rts-footer-widget w-320">
                        <a class='d-block rts-footer-logo mb-4' href='index.html'>
                            <img src="{{ asset('frontend/images/logo/logo.png') }}" style="height: 100px"
                                alt="LIA">
                        </a>
                        <i class="fa fa-map-marker"></i> <span>Level 14 333 Collins St, MELBOURNE, VIC,
                            3000</span><br />

                        <i class="fa fa-phone"></i> <span>0479 110 567</span><br />
                        <i class="fa fa-phone"></i> <span>0468 092 898 (Urgent Enquiry)</span><br />
                        <i class="fa fa-envelope"></i> <span>training@liacollege.edu.au</span><br />

                        <span>RTO CODE: 46049</span><br />

                        <span>ABN: 93 653 303 621</span>
                        <div class="d-flex gap-3 mt-3 communication-btn">
                            <a href="http://wa.me/+61468092898" target="_blank">
                                <img src="{{ asset('frontend/images/whatsapp.png') }}">
                            </a>
                            <a href="https://api.leadconnectorhq.com/widget/booking/dp31qqshThiwc7Uslqjp"
                                target="_blank">
                                <img src="{{ asset('frontend/images/meeting.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="rts-footer-widget ">
                        <h6 class="rt-semi">Our Campus</h6>
                        <div class="rts-footer-menu">
                            <ul>
                                <li><a href="{{ url('home') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="rts-footer-widget ml--30">
                        <h6 class="rt-semi">Qualifications</h6>
                        <div class="rts-footer-menu">
                            <ul>
                                <li><a href="{{ url('individual-support') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>CHC33021 Certificate III in
                                        Individual Support</a></li>
                                <li><a href="{{ url('ageing-support') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>CHC43015 Certificate IV in
                                        Ageing Support</a></li>
                                <li><a href="{{ url('community-service') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>CHC52021 Diploma of
                                        Community Services</a></li>
                                <li><a href="{{ url('community-services') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>CHC52025 Diploma of
                                        Community Services</a></li>
                                <li><a href="{{ url('leadership-management') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>BSB50420 Diploma of
                                        Leadership and Management</a></li>
                                <li><a href="{{ url('project-management') }}"><span><i
                                                class="fa-light fa-arrow-right"></i></span>BSB50820 Diploma of Project
                                        Management</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="rts-footer-copy-right v_1">
        <div class="container">
            <div class="row">
                <div class="rt-center">
                    <p class="--p-xs">Copyright &copy; <span id="year"></span> All Rights Reserved <a
                            href="#" style="color:#e5b258;">Education and Training Pty Ltd</a> trading as
                        Leadership Institute Australia</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->
    <!-- offcanvase menu -->
    <!-- header style two -->
    <div id="side-bar" class="side-bar">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="inner-main-wrapper-desk">
            <div class="thumbnail">
                <img src="{{ asset('frontend/images/logo/logo.png') }}" alt="University">
            </div>
            <div class="inner-content">
                <p class="disc">
                    Leadership Institute Australia is a Registered Training Organisation delivering nationally
                    recognised qualifications across Australia. We help professionals gain industry-ready skills and
                    advance their careers through recognised education pathways.
                </p>
                <!-- offcanvase banner -->
                <div class="offcanvase__banner mt--50">
                    <div class="offcanvase__banner--content">
                        <img src="{{ asset('frontend/images/offcanvase.jpg') }}" alt="offcanvase">
                        <a class='rts-theme-btn' href="{{ url('application') }}">Apply Now</a>
                    </div>
                </div>
                {{-- <div class="offcanvase__info">
                    <div class="offcanvase__info--content">
                        <a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>0479 110 567</a>
                        <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>Level 14 333 Collins St, MELBOURNE, VIC, 3000</a>
                        <div class="offcanvase__info--content--social">
                            <p class="title">Follow Us:</p>
                            <div class="social__links">
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- mobile menu area start -->
        <div class="mobile-menu-main">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu metismenu" id="mobile-menu-active">

                    <li>
                        <a class='main' href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('about') }}" class="main">About Us</a>
                    </li>
                    <li class="has-droupdown">
                        <a href="#" class="main">Course</a>
                        <ul class="submenu mm-collapse">
                            <li><a class='mobile-menu-link'
                                    href="https://liacollege.edu.au/individual-support">CHC33021 Certificate III in
                                    Individual Support</a></li>
                            <li><a class='mobile-menu-link' href="https://liacollege.edu.au/ageing-support">CHC43015
                                    Certificate IV in Ageing Support</a></li>
                            <li><a class='mobile-menu-link'
                                    href="https://liacollege.edu.au/community-service">CHC52021 Diploma of Community
                                    Services</a></li>
                            <li><a class='mobile-menu-link'
                                    href="https://liacollege.edu.au/community-services">CHC52025 Diploma of Community
                                    Services</a></li>
                            <li><a class='mobile-menu-link'
                                    href="https://liacollege.edu.au/leadership-management">BSB50420 Diploma of
                                    Leadership and Management</a></li>
                            <li><a class='mobile-menu-link'
                                    href="https://liacollege.edu.au/project-management">BSB50820 Diploma of Project
                                    Management</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class='main' href="{{ url('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="offcanvase__info--content mt--30">
                <!--<a href="callto:+61485826710"><span><i class="fa-sharp fa-light fa-phone"></i></span>+(61) 485-826-710</a>-->
                <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>Level 14 333 Collins
                    St, MELBOURNE, VIC, 3000</a>
                <div class="offcanvase__info--content--social">
                    <p class="title">Follow Us:</p>
                    <div class="social__links">
                        <a href="https://www.facebook.com/leadershipinstituteaus"><i
                                class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu area end -->
    </div>
    <!-- header style two End -->

    <div class="search-input-area">
        <div class="container">
            <div class="search-input-inner">
                <div class="input-div">
                    <input class="search-input autocomplete ui-autocomplete-input" type="text"
                        placeholder="Search by keyword or #" autocomplete="off">
                    <button><i class="far fa-search"></i></button>
                </div>
            </div>
        </div>
        <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
    </div>
    <!-- rts backto top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- rts back to top end -->
    <div id="anywhere-home" class="">
    </div>


    <!-- scripts -->
    <!-- jquery js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/js/vendor/jquery.min.js') }}"></script>
    <!-- bootstrap 5.0.2 -->
    <script src="{{ asset('frontend/js/plugins/bootstrap.min.js') }}"></script>
    <!-- jquery ui js -->
    <script src="{{ asset('frontend/js/vendor/jquery-ui.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('frontend/js/vendor/waw.js') }}"></script>
    <!-- mobile menu -->
    <script src="{{ asset('frontend/js/vendor/metismenu.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('frontend/js/vendor/magnifying-popup.js') }}"></script>
    <!-- swiper JS 10.2.0 -->
    <script src="{{ asset('frontend/js/plugins/swiper.js') }}"></script>
    <!-- counterup -->
    <script src="{{ asset('frontend/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/waypoint.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jarallax.min.js') }}"></script>
    <!-- isotop mesonary -->
    <script src="{{ asset('frontend/js/plugins/isotop.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/sticky-sidebar.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/resize-sensor.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/twinmax.js') }}"></script>
    <!-- dymanic Contact Form -->
    <script src="{{ asset('frontend/js/plugins/contact.form.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/nice-select.min.js') }}"></script>
    <!-- main Js -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>