<!DOCTYPE html>
<html ng-app="backend">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="{{ asset('themes/cozastore/images/icons/favicon.png') }}" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('themes/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/font-awesome/css/all.min.css')}}">
    <!-- alert -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-sweetalert/dist/sweetalert.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- datatables -->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/angular-datatables.min.css') }}">--}}
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- selected2 -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- icheck -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/plugins/iCheck/all.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('themes/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@yield('custom-css')
    <style>
        .error {
            color: red;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('backend.layout.partials.header')
    <!-- Left side column. contains the logo and sidebar -->
@include('backend.layout.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('content-header')

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">@yield('breadcrumb')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           @yield('content')
        </section>
        <!-- /.content -->
    </div>
@include('backend.layout.partials.footer')
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('themes/adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('themes/adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('themes/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('themes/adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('themes/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('themes/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
{{--<script src="{{asset('themrs/adminlte/bower_components/raphael/raphael.min.js')}}"></script>--}}
{{--<script src="{{asset('themes/adminlte/bower_components/morris.js/morris.min.js')}}"></script>--}}
<!-- Sparkline -->
<script src="{{asset('themes/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('themes/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('themes/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('themes/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('themes/adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('themes/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('themes/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('themes/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('themes/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('themes/adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script src="{{asset('themes/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('themes/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('themes/adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('themes/adminlte/js/pages/dashboard.js')}}"></script>
<!-- angularjs -->
<script src="{{ asset('app/lib/angular.min.js') }}"></script>
{{--<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>--}}
<script src="{{ asset('js/angular-datatables.min.js') }}"></script>
<script src="{{asset('themes/adminlte/bower_components/chart.js/Chart.js')}}"></script>
<script src="{{asset('themes/adminlte/plugins/iCheck/icheck.min.js')}}"></script>

<script src="{{ asset('vendor/bootstrap-sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('app/app.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('themes/adminlte/js/demo.js')}}"></script>
<script src="{{asset('themes/adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/angular-ckeditor/angular-ckeditor.min.js')}}"></script>
<script src='https://rawgit.com/ghostbar/angular-file-model/master/angular-file-model.js'></script>
@yield('custom-js')
<script>

    $(document).ready(function() {
        $(function () {
            $('.select2').select2()
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        })
    });
</script>
<script>


</script>
</body>
</html>
