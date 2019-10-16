<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đănh nhập </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('themes/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/font-awesome/css/all.min.css')}}">
    <!-- NProgress -->
    <link href="{{asset('themes/adminlte/css/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
{{--    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">--}}

    <!-- Custom Theme Style -->
    <link href="{{asset('themes/adminlte/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form name="frmLoginAd" action="{{ route('checkLoginAD') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h1>Đăng nhập</h1>
                    <div>
                        <input type="text" class="form-control" name="nv_taiKhoan" id="nv_taiKhoan" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" id="nv_matKhau" name="nv_matKhau" placeholder="Password" required="" />
                    </div>
                    @if(session()->has('error'))
                        <div style="color: red;padding-bottom: 10px">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div>
                        <button type="submit" class="btn btn-default submit">Đăng nhập</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> PETSHOP!</h1>
                            <p>©2019 All Rights Reserved. </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>