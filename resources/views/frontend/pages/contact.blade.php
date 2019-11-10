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
@section('lienhe')
    active-menu
@endsection
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('themes/cozastore/images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center" style="font-family: 'Times New Roman'">
            Liên hệ
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class=" bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md" style="width: 100%">
                    <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                        <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Địa chỉ
                        </span>

                            <p class="stext-115 cl6  p-t-18">
                                Ấp 12, X. Vĩnh Viễn, Huyện Long Mỹ, Hậu Giang
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
                               0353-050-131
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