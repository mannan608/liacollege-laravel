
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- @include('meta-service.component.seo') --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/logo/logo.png') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/animate.min.css') }}">
    <!-- fontawesome 6.4.2 -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/fontawesome.min.css') }}">
    <!-- Reacthemes Icon Css -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/css/rt_icon.css') }}">
    <!-- bootstrap min css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor/bootstrap.min.css') }}">
    <!-- swiper Css 10.2.0 -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/swiper.min.css') }}">
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor/magnific-popup.css') }}">
    <!-- metismenu scss -->
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor/metismenu.css') }}">
    <!-- nice select js -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/jquery-ui.css') }}">
     <link rel="stylesheet" href="{{ asset('frontend/css/course.css') }}">
    <!-- custom style css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style8.css') }}">
   
    <link rel="stylesheet" href="{{ asset('frontend/css/custom4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/student-portal.css') }}">
    <script src="
                                    https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons@3.3.1/license.min.js
                                    "></script>
    <link href="
https://cdn.jsdelivr.net/npm/@flaticon/flaticon-uicons@3.3.1/css/all/all.min.css
" rel="stylesheet">
  
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '925639160003172');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
            src="https://www.facebook.com/tr?id=925639160003172&ev=PageView
    &noscript=1" />
    </noscript>
    <script src="https://beta.leadconnectorhq.com/loader.js"
        data-resources-url="https://beta.leadconnectorhq.com/chat-widget/loader.js"
        data-widget-id="691ff546be8b70bc978e5c9c"></script>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

          @yield('tailwind-styles')
</head>

<body>
  
    {{-- @yield('content') --}}
    @include('frontend.lia-collage.layouts.header')

<main>

    @yield('content')

</main>

@include('frontend.lia-collage.layouts.footer')

</body>

</html>
