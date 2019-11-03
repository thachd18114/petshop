<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function limit_description($string){
    $string = strip_tags($string);
    if (strlen($string) > 100) {

        // truncate string
        $stringCut = substr($string, 0, 100);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
        $string .= '...';
    }
    return $string;
}
function time_elapsed_string($datetime, $full = false) {
    $now = now();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
}
?>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('frontend.home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

{{--        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">--}}
{{--            Chó--}}
{{--            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>--}}
{{--        </a>--}}

        <span class="stext-109 cl4">
				  {{$tc->tc_ten}}
			</span>
    </div>
</div>
<div class="container" ng-controller="customs">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1">
            <img src="{{ asset('themes/cozastore/images/icons/icon-close.png')}}" alt="CLOSE">
        </button>
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            @foreach($danhsachhinhanhlienquan as $hinhanh)
                                @if(substr($hinhanh->ha_ten, strlen($hinhanh->ha_ten)- 3) == 'mp4')
                                    <div class="item-slick3" data-thumb="{{ asset('img/video.png') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <video controls="controls" preload="metadata" style="max-width: 500px;width: 100%">
                                                <source style="width: 100%" src="http://res.cloudinary.com/petshop/video/upload/{{$hinhanh->ha_ten}}.mp4" type="video/mp4">
                                            </video>
                                        </div>
                                @else

                                    <div class="item-slick3" data-thumb="http://res.cloudinary.com/petshop/image/upload/{{$hinhanh->ha_ten}}.png">

                                    <div class="wrap-pic-w pos-relative">
                                        <img src="http://res.cloudinary.com/petshop/image/upload/{{$hinhanh->ha_ten}}.png" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="http://res.cloudinary.com/petshop/image/upload/{{$hinhanh->ha_ten}}.png">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                        @endif
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class=" p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14" style="font-weight: bold;font-family: 'Times New Roman'">
                       {{$tc->tc_ten}}

                    </h4>
                    <hr>
                    <div class="container" >
                        <div class="flex-w flex-r-m p-b-10" >
                            <div class="size-203" >
                                 <span class="mtext-106 cl2 product_price" style="" id="gia" >
                                       Giá
                                </span>
                            </div>
                            <div class="size-204 respon6-next"style="padding-left: 100px">
                                @if($tc->giatri != null && strtotime($tc->km_ngayBatDau) <= strtotime($date) && strtotime($tc->km_ngayKetThuc) >= strtotime($date) )
                                    <del  style="color: #878787; font-size: 18px;">{{ number_format($tc->tc_giaBan) }}  <u>đ</u></del> <span class="mtext-106 cl2 product_price"  style="color: #d0011b; font-size: 24px;font-weight: bold; padding-left: 15px">{{ number_format($tc->tc_giaBan* (100-$tc->giatri)/100) }}  <u>đ</u></span>
                                @else
                                    <span class="mtext-106 cl2 product_price" style="color: #d0011b; font-size: 1.875rem;font-weight: bold" >
                                        {{number_format($tc->tc_giaBan)}}  <u>đ</u>
                                </span>

                                @endif

                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Giống
                                </span>

                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                {{$tc->g_ten}}
                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Giới tính
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                @if($tc->tc_gioiTinh == 1)
                                        {{'Đực'}}
                                @else
                                {{'Cái'}}

                                    @endif
                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10 ">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Màu
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                {{$tc->tc_mauSac}}

                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10 ">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Tuổi
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                {{$tc->tc_tuoi}}

                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10 ">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Ngày sinh
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                {{date('d-m-Y', strtotime($tc->tc_ngaySinh))}}

                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Nguồn gốc
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">Hàn quốc</div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Cân nặng
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                {{$tc->tc_canNang}}

                            </div>
                        </div>
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203">
                                <span class="mtext-106 cl2">
                                       Tiêm chủng
                                </span>
                            </div>
                            <div class="size-204 respon6-next" style="padding-left: 100px;font-weight: bold">
                                @if($tc->tc_trangThaiTiemChung == 1)
                                    {{'Đã Tiêm Chủng'}}
                                @else
                                    {{'Chưa Tiêm Chủng'}}

                                @endif

                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-r-m p-b-10 p-t-33" id="addtocard">
                        <div class="size-204 flex-w flex-m respon6-next">
                            @if($tc->giatri != null)
                                <ngcart-addtocart class="js-addcart-detail" template-url="{{ asset('vendor/ngCart/template/ngCart/addtocart.html') }}" id="{{ $tc->tc_id }}" name="{{ $tc->tc_ten }}" price="{{ $tc->tc_giaBan* (100-$tc->giatri)/100  }}" quantity="1" data="{ sp_hinh_url: 'http://res.cloudinary.com/petshop/image/upload/{{$tc->ha_ten}}.png'}">Thêm vào giỏ hàng</ngcart-addtocart>

                            @else
                                <ngcart-addtocart class="js-addcart-detail" template-url="{{ asset('vendor/ngCart/template/ngCart/addtocart.html') }}" id="{{ $tc->tc_id }}" name="{{ $tc->tc_ten }}" price="{{ $tc->tc_giaBan }}" quantity="1" data="{ sp_hinh_url: 'http://res.cloudinary.com/petshop/image/upload/{{$tc->ha_ten}}.png'}">Thêm vào giỏ hàng</ngcart-addtocart>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="myTab">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" id="mota" data-toggle="tab" href="#description" role="tab" style="font-size: 16px">Mô tả chi tiết</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link  " id="binhluan" data-toggle="tab" href="#reviews" role="tab"style="font-size: 16px">Bình luận</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active " id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {!! $tc->tc_moTa !!}
                            </p>
                        </div>
                    </div>

                    <!-- - -->


                    <!-- - -->
                    <div class="tab-pane fade show " id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    @foreach($binhluan as $bl)
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="{{ asset('img/avata.jpg')}}" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20" style="font-size: 20px">
														 {{$bl->kh_taiKhoan}}
													</span>
                                                <span class="fs-18" style="font-size: 14px;color: #878787;">
														<?php echo time_elapsed_string($bl->bl_thoiGian);?>
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                {{$bl->bl_noiDung}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- Add review -->
                                    <form class="w-full" name="frmBinhluan" id="frmBinhluan">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                           Bình luận
                                        </h5>
                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Nhập vào đây</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="noiDung" name="noiDung"></textarea>
                                            </div>
                                        </div>

                                        <button id="btnComment" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" >
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($lienquan as $lq)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                @if(substr($lq->ha_ten, strlen($lq->ha_ten)- 3) == 'mp4')
                                    <img src="{{ asset('img/video.png') }}" alt="IMG-PRODUCT">
                                @else

                                    <img src="http://res.cloudinary.com/petshop/image/upload/{{$lq->ha_ten}}.png" alt="IMG-PRODUCT" width="100%" height="180px">
                                @endif
                                <a href="{{ route('frontend.productDetail',$lq->tc_id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Chi tiết
                                </a>

                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{ route('frontend.productDetail',$lq->tc_id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <h4 id="tensp" >{{ $lq->tc_ten }}</h4>
                                    </a>
                                    <span class="stext-105 cl3" style="color: #e10c00; font-weight: bold; font-size: large">
                                    $ {{ $lq->tc_giaBan }}
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>
</div>
@section('custom-scripts')

<script>
    $(document).ready(function(e){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
            document.getElementById('noiDung').scrollIntoView();
        }
    });
    $('#btnComment').click(function(){
        var tdn = '<?php echo Session::get('tenDangNhap');  ?>';
        if (tdn){
            var url =  'http://localhost/petshop/public/binhluan/'+{{ $tc->tc_id }};
            // alert(url);
            $.ajax({
                url: url,
                type: 'POST',
                data:{
                    'kh_taiKhoan' : tdn,
                    'noiDung' : $("#noiDung").val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response){
                    location.reload();
                },
                error:function(response){

                }
            });
        }
        else {
            window.location="http://localhost/petshop/public/dangnhap";
        }

    });
</script>
<script>
        app.controller ('customs', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
            ngCart.setShipping(0);

            angular.forEach(ngCart.getCart().items, function(value, key) {
                angular.forEach(ngCart.getCart().items, function (value, key) {
                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
                        $scope.thucung = response.data;
                        if($scope.thucung.length >0 || $scope.thucung.tc_trangThai === 1){
                            $scope.gia = $scope.thucung.tc_giaBan*(100 - $scope.thucung.giatri)/100;
                            // console.log($scope.gia);
                            if ($scope.thucung.km_giaTri == null){
                                value.setPrice($scope.gia);
                                value.setName($scope.thucung.tc_ten);
                            } else {
                                value.setPrice($scope.thucung.tc_giaBan);
                                value.setName($scope.thucung.tc_ten);
                            }

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