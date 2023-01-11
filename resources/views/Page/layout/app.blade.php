<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/admin/assets/img/favicon/favicon.ico')}}"/>

    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    @stack('title')
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/bootstrap.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('assets/landingpage/css/owl.carousel.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/ion.rangeSlider.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/ion.rangeSlider.skinFlat.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/landingpage/css/main.css')}}">
</head>

<body>

<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            @include('Page.layout.navbar')
        </nav>
    </div>
</header>
<!-- End Header Area -->

@yield('content')

<!-- start footer Area -->
<footer class="footer-area section_gap">
    @include('Page.layout.footer')
</footer>
<!-- End footer Area -->

{{--<script src="{{asset('assets/landingpage/js/vendor/jquery-2.2.4.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/landingpage/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/landingpage/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/landingpage/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/landingpage/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/landingpage/js/nouislider.min.js')}}"></script>
{{--<script src="{{asset('assets/landingpage/js/countdown.js')}}"></script>--}}
<script src="{{asset('assets/landingpage/js/jquery.magnific-popup.min.js')}}"></script>
{{--<script src="{{asset('assets/landingpage/js/owl.carousel.min.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{asset('assets/landingpage/js/gmaps.min.js')}}"></script>
<script src="{{asset('assets/landingpage/js/main.js')}}"></script>

@stack('script')
</body>

</html>
