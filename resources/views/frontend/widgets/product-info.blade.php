<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
            Cori
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
				Rolls-Roys - Golden Retriever
			</span>
    </div>
</div>
<div class="container">
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
                                    <div class="item-slick3" data-thumb="{{ asset('img/film-and-vid.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <video controls="controls" preload="metadata" style="max-width: 500px; margin-top: 70px">
                                                <source src="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}" type="video/mp4">
                                            </video>
                                        </div>
                                @else

                                    <div class="item-slick3" data-thumb="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}">

                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}">
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
                                 <span class="mtext-106 cl2 product_price" style="" >
                                       Giá
                                </span>
                            </div>
                            <div class="size-204 respon6-next"style="padding-left: 100px">
                                <span class="mtext-106 cl2 product_price" style="color: #d0011b; font-size: 1.875rem;font-weight: bold" >
                                       {{$tc->tc_giaBan}}<sup>đ</sup>
                                </span>
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
                                <ngcart-addtocart class="js-addcart-detail" template-url="{{ asset('vendor/ngCart/template/ngCart/addtocart.html') }}" id="{{ $tc->tc_id }}" name="{{ $tc->tc_ten }}" price="{{ $tc->tc_giaBan }}" quantity="1" data="{ sp_hinh_url: '{{ asset("storage/photos/" . $tc->ha_ten) }}'}">Thêm vào giỏ hàng</ngcart-addtocart>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {!! $tc->tc_moTa !!}
                            </p>
                        </div>
                    </div>

                    <!-- - -->


                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <?php for($i=0; $i < 3;$i++) { ?>
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														Ariana Grande
													</span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>
<?php }?>
                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>
                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
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
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Esprit Ruffle Shirt
                                    </a>

                                    <span class="stext-105 cl3">
										$16.64
									</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Herschel supply
                                    </a>

                                    <span class="stext-105 cl3">
										$35.31
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Only Check Trouser
                                    </a>

                                    <span class="stext-105 cl3">
										$25.50
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Classic Trench Coat
                                    </a>

                                    <span class="stext-105 cl3">
										$75.00
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Front Pocket Jumper
                                    </a>

                                    <span class="stext-105 cl3">
										$34.75
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Vintage Inspired Classic
                                    </a>

                                    <span class="stext-105 cl3">
										$93.20
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Shirt in Stretch Cotton
                                    </a>

                                    <span class="stext-105 cl3">
										$52.66
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" alt="IMG-PRODUCT">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        Pieces Metallic Printed
                                    </a>

                                    <span class="stext-105 cl3">
										$18.96
									</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>