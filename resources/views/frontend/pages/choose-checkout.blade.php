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
        <div class="container" style="padding-top: 30px">
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 "  ng-controller="DonHangController">
            <form name="orderForm"   novalidate>
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <div class="container">
                        <h4 class="mtext-109 cl2 p-b-30">Thông tin Đặt hàng</h4>
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
                        <div class="form-group" style="padding-bottom: 5px">
                            <label for="tt_ma">Phương thức thanh toán:</label>
                            <select name="httt_id" id="httt_id" class="form-control" ng-model="httt_id" ng-required=true>
                                @foreach($hinhthucthanhtoan as $tt)
                                    <option value="{{ $tt->httt_id }}">{{ $tt->httt_ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" ng-click="modal()"  class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" id="modalcheckout"  ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
                            Thanh toán
                        </button>
                    </div>

                </div>
            </form>
        </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog" style="margin-top: 150px">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header">
                        <div >Thanh toán bằng PayPal <% $scope.tien %></div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
{{--                        <label>Thanh toán bằng PayPal:</label>--}}
                        <div class="m-t-20" style="text-align: center" id="paypal-button"></div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>

            </div>
        </div>

@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="{{ asset('app/controller/frontend/DonHangController.js') }}"></script>
@endsection