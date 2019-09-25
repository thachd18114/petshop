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
                <h1 style="padding: 25px 0">Đăng nhập</h1>
                <form method="post" action="{{ route('dangnhap.check') }}">
                    {{ csrf_field() }}
                    <div style="padding: 15px 0">
                        <input type="text" name="kh_taiKhoan" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password"  name="kh_matKhau" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div style="padding: 10px">
                        <button class="btn btn-danger">Đăng nhập</button>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="{{route('dangky')}}" class="to_register"> Create Account </a>
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