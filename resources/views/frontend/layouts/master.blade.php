<!DOCTYPE html>
<html lang="en" ng-app="petApp">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('themes/cozastore/images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<style>
    #tensp {
        color: #333;
    }
    #tensp:hover {
        color: #288ad6;
    }
    .mtext-106 {
        font-family: "Times New Roman";
        color: #666666;
        /*font-weight: bold;*/
    }
    #addtocard .bg1 {
        background-color: #ff4a16;
    }
    #addtocard .bg1:hover {
        background-color: rgba(255, 100, 23, 0.88);
    }
</style>
<body class="animsition">

<!-- Header -->
@include('frontend.layouts.partials.header')

<!-- Cart -->
@include('frontend.layouts.partials.cart')

<!-- Slider -->


@yield('main-content')

@include('frontend.layouts.partials.footer')

<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('themes/cozastore/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('themes/cozastore/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('themes/cozastore/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/parallax100/parallax100.js') }}"></script>

<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>

<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/customer-js.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('themes/cozastore/js/main.js') }}"></script>
<script src="{{ asset('app/lib/angular.min.js') }}"></script>
<!-- Include thư viện quản lý Cart - AngularJS -->
<script src="{{ asset('vendor/ngCart/dist/ngCart.js') }}"></script>
<script>
    // Khởi tạo ứng dụng AngularJS, sử dụng plugin ngCart
    // Do Laravel và AngularJS đều sử dụng dấu `Double bracket` để render dữ liệu
    // => để tránh bị xung đột cú pháp, ta sẽ đổi cú pháp render dữ liệu của AngularJS thành <% %>
    var app = angular.module('petApp', ['ngCart'],
        function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
</script>
</body>
</html>