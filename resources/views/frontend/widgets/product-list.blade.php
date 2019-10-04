
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Thú cưng
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52" ng-controller="summary">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả thú cưng
                </button>

                @foreach($loaithucung as $loaithucung)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loai-{{$loaithucung->ltc_id}}">
                        {{ $loaithucung->ltc_ten }}
                    </button>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sắp xếp theo
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Mới nhất
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Giá tăng dần
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Giá giảm dần
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Giá
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    0đ - 1 triệu
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    1 triệu - 3 triệu
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    3 triệu - 7 triệu
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    7 triệu - 10 triệu
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    >10 triệu
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Nguồn Gốc
                        </div>

                        <ul>
                            <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Hàn Quốc
                                </a>
                            </li>

                            <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Nhật Bản
                                </a>
                            </li>

                            <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Pháp
                                </a>
                            </li>

                            <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Việt Nam
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Giới tính
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Đực
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Cái
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row isotope-grid">

            @foreach($data as $index=>$sp)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item loai-{{$sp->ltc_id}}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            @if(substr($sp->ha_ten, strlen($sp->ha_ten)- 3) == 'mp4')
                                <img src="{{ asset('img/film-and-vid.jpg') }}" alt="IMG-PRODUCT">
                            @else

                            <img src="{{ asset('storage/photos/' . $sp->ha_ten) }}" alt="IMG-PRODUCT" width="100%" height="180px">
                        @endif
                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Chi tiết
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('frontend.productDetail',$sp->tc_id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <h4 id="tensp" >{{ $sp->tc_ten }}</h4>
                                </a>
                                <span class="stext-105 cl3" style="color: #e10c00; font-weight: bold; font-size: large">
                                    $ {{ $sp->tc_giaBan }}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach



    </div>

    <!-- Load more -->
    <div class="flex-c-m flex-w w-full p-t-45">
        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
        </a>
    </div>
    </div>
</section>
@section('custom-scripts')
    <script>
        app.controller ('summary', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
            ngCart.setShipping(0);

            angular.forEach(ngCart.getCart().items, function(value, key) {
                angular.forEach(ngCart.getCart().items, function (value, key) {
                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
                        $scope.thucung = response.data;
                        if($scope.thucung.length >0 || $scope.thucung.tc_trangThai === 1){
                            console.log($scope.thucung);
                            value.setPrice($scope.thucung.tc_giaBan);
                            value.setName($scope.thucung.tc_ten);
                             // value.setData($scope.thucung.tc_giaBan);
                        }
                        else {
                            ngCart.removeItemById(value.getId());
                        }
                    });
                });
                // console.log();
            });
        }]);
    </script>
@endsection


