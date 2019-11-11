<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                   PETSHOP
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="{{route('frontend.product.sale')}}" class="stext-107 cl7 hov-cl1 trans-04">
                          Khuyến mãi
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Giúp đỡ
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="{{route('frontend.faq')}}" class="stext-107 cl7 hov-cl1 trans-04">
                           Help & FAQs
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Liên hệ
                </h4>
                <p class="stext-107 cl7 size-201">
                    Ấp 12, X. Vĩnh Viễn, Huyện Long Mỹ, Hậu Giang
                </p>

                <p class="stext-107 cl7 size-201">
                    0353-050-131
                </p>
            </div>
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Thanh toán
                </h4>
                <div class="stext-107 cl7 size-201">
{{--                    <a href="" class="m-all-1">--}}
                        <img src="{{ asset('themes/cozastore/images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
{{--                    </a>--}}

                </div>
            </div>
        </div>
        <div class="p-t-40">
            <p class="stext-107 cl6 txt-center">
                Copyright &copy;<script>document.write(new Date().getFullYear());
                </script><i class="fa fa-heart-o" aria-hidden="true"></i>  <a href="{{route('frontend.home')}}" target="_blank">Petshop</a>
            </p>
        </div>
    </div>
</footer>
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>