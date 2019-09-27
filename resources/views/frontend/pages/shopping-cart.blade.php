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

{{--    <div class="">--}}
{{--    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 "  ng-controller="DonHangController">--}}
{{--        <form name="orderForm" ng-submit="submitOrderForm()"  novalidate>--}}
{{--            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">--}}
{{--                <div class="container">--}}
{{--                    <h4 class="mtext-109 cl2 p-b-30">Thông tin Đặt hàng</h4>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="dh_nguoiNhan">Người nhận:</label>--}}
{{--                        <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" ng-model="dh_nguoiNhan" ng-minlength="6" ng-maxlength="100" ng-required=true>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="dh_diaChi">Địa chỉ:</label>--}}
{{--                        <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" ng-model="dh_diaChi" ng-minlength="6" ng-maxlength="250" ng-required=true>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="dh_dienThoai">Điện thoại:</label>--}}
{{--                        <input type="text" class="form-control" id="dh_dienThoai" name="dh_dienThoai" ng-model="dh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>--}}
{{--                    </div>--}}
{{--                    <div class="form-group" style="padding-bottom: 5px">--}}
{{--                        <label for="tt_ma">Phương thức thanh toán:</label>--}}
{{--                        <select name="httt_id" id="httt_id" class="form-control" ng-model="httt_id" ng-required=true>--}}
{{--                            @foreach($hinhthucthanhtoan as $tt)--}}
{{--                                <option value="{{ $tt->httt_id }}">{{ $tt->httt_ten }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <button type="submit"  class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4"  ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">--}}
{{--                        Thanh toán--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    </div>--}}

@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
    <script src="{{ asset('app/controller/frontend/DonHangController.js') }}"></script>
    <script>
        app.controller ('cart', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
            ngCart.setShipping(0);

            angular.forEach(ngCart.getCart().items, function(value, key) {
                angular.forEach(ngCart.getCart().items, function (value, key) {
                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
                        $scope.thucung = response.data;
                        if($scope.thucung.length >0 || $scope.thucung.tc_trangThai ===1){
                            value.setPrice($scope.thucung.tc_giaBan);
                            value.setName($scope.thucung.tc_ten);
                            // value.setData($scope.thucung.tc_giaBan);
                        }else {
                            ngCart.removeItemById(value.getId());
                        }
                    });
                });
                // console.log();
            });
        }]);
    </script>
@endsection