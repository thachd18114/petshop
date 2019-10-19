@extends('backend.layout.master')

@section('title')
    Thông tin
@endsection
@section('content-header')
    Thông tin
@endsection
@section('breadcrumb')
    Thông tin
@endsection
{{--@section('quyen')--}}
{{--    active--}}
{{--@endsection--}}
@section('custom-css')

@endsection
@section('content')
    <section class="box">
        <div class="box-body" style="padding-bottom: 20px;font-size: 16px">
            <form class="form-horizontal"name="frmcapnhat" id="frmcapnhat" action="{{route('frontend.update.account')}}" method="post">
                {{ csrf_field() }}
                <table class="tainvoan" style="width: 600px;margin: auto">
                    <tr>
{{--                        <td colspan="2" style="text-align: center"> <h1 style="padding: 25px 0">Thông tin tài khoản</h1></td>--}}
                    </tr>
                    <tr>
                        <td>Tài khoản</td>
                        <td> <input type="text" id="nv_taiKhoan" name="nv_taiKhoan" readonly class="form-control" value="{{$tk->nv_taiKhoan}}"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu mới</td>
                        <td> <input type="text" id="nv_matKhau" name="nv_matKhau" class="form-control" ></td>
                    </tr>
                    <tr>
                        <td>Họ tên</td>
                        <td> <input type="text" name="nv_hoTen" readonly class="form-control" value="{{$tk->nv_hoTen}}"></td>
                    </tr>
                    <tr>
                        <td>Giới tính </td>
                        <td>  <select class="form-control" name="nv_gioiTinh">
                                <option value="1" {{ old('nv_gioiTinh', $tk->nv_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
                                <option value="2"{{ old('nv_gioiTinh', $tk->nv_gioiTinh) == 2 ? "selected" : "" }} >Nữ</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Ngày sinh </td>
                        <td> <input type="date" name="nv_ngaySinh" class="form-control"   value="{{$tk->nv_ngaySinh->format('Y-m-d')}}"></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td> <input type="text" name="nv_email" class="form-control"value="{{$tk->nv_email}}"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ </td>
                        <td> <input type="text" name="nv_diaChi" class="form-control"value="{{$tk->nv_diaChi}}"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại </td>
                        <td> <input type="text" name="nv_dienThoai" class="form-control" value="{{$tk->nv_dienThoai}}"></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <div style="margin-top: 20px">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                            </div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-danger" type="submit" >Cập nhật</button>
                            <button class="btn btn-danger" type="reset" >Hủy</button>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: center"><div class="clearfix"></div>
                            <br />

                            <div style="padding-bottom: 10px;">

                            </div></td>
                    </tr>
                </table>

            </form>
        </div>
    </section>

    <style>
        .tainvoan td {
            padding: 5px 5px;
        }
        .error {
            color: red;
        }
    </style>
    @endsection
@section('custom-scripts')
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#frmcapnhat").validate({
                onkeyup: false,
                rules: {
                    nv_email:{
                        required: true,
                        email: true,
                        maxlength: 50,
                    },
                    nv_ngaySinh:{
                        required: true
                    },
                    nv_dienThoai:{
                        required: true,
                        maxlength: 10,
                        digits: true
                    },
                    nv_diaChi:{
                        required: true
                    },
                },messages: {

                    nv_email:{
                        required: 'Vui lòng nhập email',
                        email: 'Sai định dạng email vd: a@b',
                        maxlength: 'Vượt 50 ký tự cho phép'
                    },
                    nv_ngaySinh:{
                        required: 'Vui lòng nhập ngày sinh'
                    },
                    nv_dienThoai:{
                        required: 'Vui lòng nhập số điện thoại',
                        maxlength: 'Vượt 10 số cho phép',
                        digits: 'Chỉ được nhập số'
                    },
                    nv_diaChi:{
                        required: 'Vui lòng nhập địa chỉ'
                    },
                }
            });
        });
    </script>

@endsection
@section('custom-js')
    <script src="{{ asset('app/controller/QuyenController.js') }}"></script>
@endsection