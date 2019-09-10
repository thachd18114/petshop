{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
    Liên hệ - PETSHOP
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('themes/cozastore/images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            Liên hệ
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116" ng-controller="contactController">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form name="contactForm" ng-submit="submitContactForm()" novalidate>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gởi lời nhắn cho PETSHOP
                        </h4>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email của bạn" ng-model="email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                            <img class="how-pos4 pointer-none" src="{{ asset('themes/cozastore/images/icons/icon-email.png') }}" alt="ICON">
                        </div>

                        <!-- Validate lời nhắm -->
                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="Bạn cần chúng tôi giúp đỡ về vấn đề gì?" ng-model="message" ng-minlength="6" ng-maxlength="250" ng-required=true></textarea>
                        </div>

                        <!-- Nút submit form -->
                        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" ng-disabled="contactForm.$invalid">
                            Gởi lời nhắn
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                        <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Địa chỉ
                        </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                130 Xô Viết Nghệ Tỉnh, Phường An Hội, Quận Ninh Kiều, TP Cần Thơ
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                        <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Đường dây nóng
                        </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                0915-659-223
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                        <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Email hỗ trợ
                        </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                petshop@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bản đồ Địa chỉ công ty -->
        </div>
    </section>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}