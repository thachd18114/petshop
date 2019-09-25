{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
    Đăng nhập
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')

@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
    <div class="container" style="text-align: center">
        <div class="col-md-5" style="margin: auto;">
            <section class="login_content">
                <h1 style="padding: 25px 0">Đăng Ký</h1>
                <form method="post" action="{{ route('dangky.store') }}">
                    {{ csrf_field() }}
                    <div style="padding-bottom: 15px">
                        <input type="text" name="kh_taiKhoan" class="form-control" placeholder="Tên đăng nhập" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="password"  name="kh_matKhau" class="form-control" placeholder="Mật khẩu" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_hoTen" class="form-control" placeholder="Họ và tên" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_ngaySinh" class="form-control" placeholder="Ngày sinh" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_diaChi" class="form-control" placeholder="Địa chỉ" required="" />
                    </div>
                    <div style="padding-bottom: 15px">
                        <input type="text"  name="kh_dienThoai" class="form-control" placeholder="Điện thoại" required="" />
                    </div>

                    <div style="padding: 10px">
                        <button class="btn btn-danger" >Đăng ký</button>

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
@endsection