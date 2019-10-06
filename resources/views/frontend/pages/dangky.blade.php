{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
    Đăng Ký
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
    <style type="text/css">
        .error{
            color: red;
            text-align: left;
        }
    </style>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
    <div class="container" style="text-align: center" ng-controller="dangky">
        <div class="col-md-5" style="margin: auto;">
            <section class="login_content">
                <h1 style="padding: 25px 0">Đăng Ký</h1>
                <form method="post" action="{{ route('dangky.store') }}" name="frmdangky" id="frmdangky" >
                    {{ csrf_field() }}
                    <div style="padding-bottom: 15px">
                        <input type="text" name="kh_taiKhoan" id="kh_taiKhoan" class="form-control" placeholder="Tên đăng nhập"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="password"  name="kh_matKhau" id="kh_matKhau" class="form-control" placeholder="Mật khẩu"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="password"  name="kh_matKhau1" class="form-control" placeholder=" Nhập lại mật khẩu"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_hoTen" class="form-control" placeholder="Họ và tên"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="date"  name="kh_ngaySinh" class="form-control" placeholder="Ngày sinh"  />
                    </div>
                    <div style="padding-bottom: 15px">
                       <select class="form-control" name="kh_gioiTinh">
                           <option value="1" select="true">Nam</option>
                           <option value="2" >Nữ</option>
                       </select>
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_email" class="form-control" placeholder="Email"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_diaChi"  class="form-control" placeholder="Địa chỉ"  />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_dienThoai" class="form-control" placeholder="Điện thoại"  />
                    </div>

                    <div style="padding: 10px">
                        <button class="btn btn-danger" type="submit" >Đăng ký</button>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Quay trở lại đăng nhập
                            <a href="{{route('dangnhap')}}" class="to_register"> Đăng nhập </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div style="padding-bottom: 10px;">
                            <h1><i class="fa fa-paw"></i> PETSHOP!</h1>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        app.controller ('dangky', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
            ngCart.setShipping(0);

            angular.forEach(ngCart.getCart().items, function(value, key) {
                angular.forEach(ngCart.getCart().items, function (value, key) {
                    $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
                        $scope.thucung = response.data;
                        if($scope.thucung.length >0 || $scope.thucung.tc_trangThai ===1){
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
    <script>
        $(document).ready(function () {
            $("#frmdangky").validate({
                onkeyup: false,
                rules: {
                    kh_taiKhoan:{
                        required: true,
                        maxlength: 16,
                        remote: "http://localhost/petshop/public/checkUser"
                    },
                    kh_matKhau:{
                        required: true
                    },
                    kh_matKhau1:{
                        required: true,
                        equalTo: "#kh_matKhau",
                    },
                    kh_email:{
                        required: true,
                        email: true,
                        maxlength: 50,
                    },
                    kh_ngaySinh:{
                        required: true
                    },
                    kh_dienThoai:{
                        required: true,
                        maxlength: 10,
                        digits: true
                    },
                    kh_diaChi:{
                        required: true
                    },
                    kh_hoTen:{
                        required: true
                    },
                },messages: {
                    kh_hoTen:{
                        required: 'Vui lòng nhập tên',
                        maxlength: 'Vượt 25 ký tự cho phép'
                    },
                    kh_taiKhoan:{
                        required: 'Vui lòng nhập tên đăng nhập',
                        maxlength: 'Vượt 16 ký tự cho phép',
                        remote: "Tên đăng nhập đã tồn tại!"
                    },
                    kh_matKhau:{
                        required: 'Vui lòng nhập mật khẩu'
                    },
                    kh_matKhau1:{
                        required: 'Vui lòng xác nhận mật khẩu',
                        equalTo: 'Xác nhận mật khẩu không đúng'
                    },
                    kh_email:{
                        required: 'Vui lòng nhập email',
                        email: 'Sai định dạng email vd: a@b',
                        maxlength: 'Vượt 50 ký tự cho phép'
                    },
                    kh_ngaySinh:{
                        required: 'Vui lòng nhập ngày sinh'
                    },
                    kh_dienThoai:{
                        required: 'Vui lòng nhập số điện thoại',
                        maxlength: 'Vượt 10 số cho phép',
                        digits: 'Chỉ được nhập số'
                    },
                    kh_diaChi:{
                        required: 'Vui lòng nhập địa chỉ'
                    },
                }
            });
        });
    </script>
@endsection