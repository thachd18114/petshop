{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
    Giỏ hàng - PETSHOP
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
    <!-- Hiển thị giỏ hàng -->
    <ngcart-cart template-url="{{ asset('vendor/ngCart/template/ngCart/cart.html') }}"></ngcart-cart>
    <!-- Thông tin khách hàng -->

    <div class="container" ng-controller="DonHangController">
        <form name="orderForm" ng-submit="submitOrderForm()"  novalidate>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h2>Thông tin Đặt hàng</h2>
                    <div class="form-group">
                        <label for="dh_nguoiNhan">Người nhận:</label>
                        <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" ng-model="dh_nguoiNhan" ng-minlength="6" ng-maxlength="100" ng-required=true>
                    </div>
                    <div class="form-group">
                        <label for="dh_diaChi">Địa chỉ:</label>
                        <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                    </div>
                    <div class="form-group">
                        <label for="dh_dienThoai">Điện thoại:</label>
                        <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                    </div>
                    <div class="form-group">
                        <label for="tt_ma">Phương thức thanh toán:</label>
                        <select name="httt_id" id="httt_id" class="form-control" ng-model="httt_id" ng-required=true>
                            @foreach($hinhthucthanhtoan as $tt)
                                <option value="{{ $tt->httt_id }}">{{ $tt->httt_ten }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="alert alert-success" ng-show="orderForm.$valid">
                Thông tin hợp lệ, vui lòng bấm nút <b>"Thanh toán"</b> để hoàn tất ĐƠN HÀNG<br />
                Chúng tôi sẽ gởi mail đển quý khách. Xin chân thành cám ơn Quý Khách hàng đã tin tưởng sản phẩm của chúng tôi.
            </div>
            <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
                Thanh toán
            </button>
        </form>
    </div>

@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
    <script src="{{ asset('app/controller/frontend/DonHangController.js') }}"></script>
@endsection