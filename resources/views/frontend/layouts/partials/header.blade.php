<header class="header-v4" >
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>
                    @if(session('tenDangNhap'))
                        <a href="{{route('dangnhap')}}" class="flex-c-m trans-04 p-lr-25" data-toggle="dropdown">Trang cá nhân
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="z-index: 9999; padding-left: 10px">
                            <li><a href="#" style=" padding-bottom: 5px; font-size: 14px;">Quản lý tài khoản</a></li>
                            <li><a href="#" style=" padding-bottom: 5px;font-size: 14px">Đơn hàng</a></li>
                            <li><a href="{{route('logout')}}"  style=" padding-bottom: 5px;font-size: 14px">Đăng xuất</a></li>
                        </ul>
                    </a>
                    @else
                        <a href="{{route('dangnhap')}}" class="flex-c-m trans-04 p-lr-25">
                           Đăng nhập
                        </a>
                    @endif
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="" class="logo">
                    <img src="{{ asset('themes/cozastore/images/icons/logo-01.png') }}" alt="IMG-LOGO">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{ Request::is('') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.product') }}">Thú cưng</a>
                        </li>
                        <li class="label1" data-label1="hot">
                            <a href="shoping-cart.html">Liên hệ</a>
                        </li>
                        <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                            <a href="">Giới thiệu</a>
                        </li>

                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m" >
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <ngcart-summary class="js-show-cart" template-url="{{ asset('vendor/ngCart/template/ngCart/summary.html') }}"></ngcart-summary>

                </div>
            </nav>
        </div>
    </div>
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('themes/cozastore/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>
            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
@section('custom-scripts')
    <script>
        app.controller ('summary', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
            ngCart.setShipping(0);

            angular.forEach(ngCart.getCart().items, function(value, key) {
                angular.forEach(ngCart.getCart().items, function (value, key) {
                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
                        $scope.thucung = response.data;
                        if($scope.thucung){
                            value.setPrice($scope.thucung.tc_giaBan);
                            value.setName($scope.thucung.tc_ten);
                            // value.setData($scope.thucung.tc_giaBan);
                        }
                    });
                });
                // console.log();
            });
        }]);
    </script>
@endsection
