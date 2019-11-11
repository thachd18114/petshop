<header class="header-v4" >
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar" id="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar" >
{{--                    Miễn phí vận chuyển trên toàn quốc--}}
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="{{route('frontend.faq')}}"  class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>
                    @if(session('tenDangNhap'))
                        <a href="{{route('dangnhap')}}" class="flex-c-m trans-04 p-lr-25" data-toggle="dropdown">Trang cá nhân
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li><a href="{{route('frontend.account')}}">Quản lý tài khoản</a></li>
                            <li><a href="{{route('frontend.account.order')}}" >Đơn hàng</a></li>
                            <li><a href="{{route('logout')}}" >Đăng xuất</a></li>
                        </ul>
                    </a>
                    @else
                        <a href="{{route('dangnhap')}}" class="flex-c-m trans-04 p-lr-25">
                           Đăng nhập
                        </a>
                    @endif
                    <a style="color: white"  class="flex-c-m trans-04 p-lr-25">
                        VN
                    </a>
                    <a  style="color: white" class="flex-c-m trans-04 p-lr-25">
                        VNĐ
                    </a>
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{ route('frontend.home') }}" class="logo">
                    <img src="{{ asset('img/logo2_1.png') }}"  height="100%"  style="margin-top: -10px"  alt="IMG-LOGO">
                </a>
                <!-- Menu desktop -->
                <div class="menu-desktop" style="margin-left: -10px">
                    <ul class="main-menu">
                        <li class="@yield('home') ">
                            <a href="{{ route('frontend.home') }}">Trang chủ</a>
                        </li>
                        <li class="@yield('product')">
                            <a href="{{ route('frontend.product') }}">Thú cưng</a>
                        </li>
                        <li class="label1 @yield('product-sale')" data-label1="sale">
                            <a href="{{ route('frontend.product.sale') }}"> Khuyến mãi</a>
                        </li>
                        <li class="@yield('lienhe')">
                            <a href="{{route('lienhe')}}">Liên hệ</a>
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
            <form class="wrap-search-header flex-w p-l-15" method="get" action="{{route('frontend.product')}}">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>

                    <input class="plh3" type="text" name="searchByGiongMa" placeholder="Search...">

            </form>
        </div>
    </div>
</header>
@section('custom-scripts')
{{--    <script>--}}
{{--        app.controller ('summary', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {--}}
{{--            ngCart.setShipping(0);--}}

{{--            angular.forEach(ngCart.getCart().items, function(value, key) {--}}
{{--                angular.forEach(ngCart.getCart().items, function (value, key) {--}}
{{--                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {--}}
{{--                        $scope.thucung = response.data;--}}
{{--                        if($scope.thucung){--}}
{{--                            value.setPrice($scope.thucung.tc_giaBan);--}}
{{--                            value.setName($scope.thucung.tc_ten);--}}
{{--                            // value.setData($scope.thucung.tc_giaBan);--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--                // console.log();--}}
{{--            });--}}
{{--            $scope.show = function () {--}}
{{--                alert('ok');--}}
{{--            }--}}
{{--        }]);--}}
{{--    </script>--}}
@endsection
