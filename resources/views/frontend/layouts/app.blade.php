<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bestwebcreator.com/Videh/demo/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Jul 2020 05:08:59 GMT -->

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nursing Home">
    <meta name="keywords" content="Nursing Home,charity,free-education,free-medical checkups">

    <!-- SITE TITLE -->
    <title>Nursing Home</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logoremovebg.png')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet" />
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}" />
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" />
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.default.min.css')}}" />
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/timeline.min.css')}}" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
    <link rel="stylesheet" id="layoutstyle" href="{{asset('assets/color/theme.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/css/news-events-tabs.css')}}">
    @stack('styles')

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img src="{{asset('assets/images/logo.png')}}" alt="Loading..." />
      </div>
    <!-- END LOADER -->

    @include('frontend.layouts.partials.header')

    @yield('content')

    @include('frontend.layouts.partials.footer')




      <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a><a href="https://wa.me/9813378610" target="_blank" class="whatsapp-icon">
            <i class="fab fa-whatsapp"></i>
      </a>
    <!-- Latest jQuery -->
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <!-- jquery-ui -->
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <!-- popper min js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{asset('assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
    <!-- magnific-popup min js  -->
    <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
    <!-- waypoints min js  -->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <!-- parallax js  -->
    <script src="{{asset('assets/js/parallax.js')}}"></script>
    <!-- countdown js  -->
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- jquery.counterup.min js -->
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- imagesloaded js -->
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- isotope min js -->
    <script src="{{asset('assets/js/isotope.min.js')}}"></script>
    <!-- jquery.parallax-scroll js -->
    <script src="{{asset('assets/js/jquery.parallax-scroll.js')}}"></script>
    <!-- timeline -->
    <script src="{{asset('assets/js/timeline.js')}}"></script>

    <!-- scripts js -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>

    <script>
        window.addEventListener("load", function () {
            document.body.classList.add("loaded");
        });
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,ne,hi,fr,es',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }


    </script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit&hl=en"></script>

@stack('scripts')

</body>

<!-- Mirrored from bestwebcreator.com/Videh/demo/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Jul 2020 05:09:10 GMT -->

</html>
