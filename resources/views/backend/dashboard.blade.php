@extends('backend.layout.master')

@section('title')
    Trang quản trị hệ thống
@endsection
@section('trangchu')
    active
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @foreach($donhang as $dh)
                        <h3>{{$dh->donhang}}</h3>

    @endforeach
                        <p>Đơn hàng mới</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('donhang')}}" class="small-box-footer">Xem chi tiết &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        @foreach($loaithucung as $ltc)
                            <h3>{{$ltc->loaithucung}}</h3>
{{--                     <sup style="font-size: 20px">%</sup>--}}
                        @endforeach


                        <p>Loại thú cưng</p>
                    </div>
                    <div class="icon">
                        <i class="fab fa-firefox"></i>
                    </div>
                    <a href="{{route('loaithucung')}}" class="small-box-footer">Xem chi tiết &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        @foreach($thucung as $tc)
                            <h3>{{$tc->thucung}}</h3>

                        @endforeach


                        <p>Thú cưng</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dove"></i>
                    </div>
                    <a href="{{route('thucung')}}" class="small-box-footer">Xem chi tiết &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        @foreach($khachhang as $kh)
                            <h3>{{$kh->khachhang}}</h3>

                        @endforeach

                        <p>Số lượng khách hàng</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <a href="{{route('khachhang')}}" class="small-box-footer">Xem chi tiết &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
        </div>
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Doanh thu theo tháng</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- BAR CHART -->

                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tỷ số phần trăm loại thú cưng tồn kho </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- BAR CHART -->

                <!-- /.box -->

            </div>
            <div class="col-md-6">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tỷ số phần trăm giống thú cưng được mua </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- BAR CHART -->

                <!-- /.box -->

            </div>
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->

    </section>
@endsection

@section('custom-css')
@endsection

@section('custom-js')
    <script src="{{ asset('js/jquery.canvasjs.min.js') }}"></script>
    <script>
        window.onload = function() {
            var dataPoints = [];
           var dataPoints1=[]
            var dataPoints2=[]
            var options =  {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Doanh thu theo tháng"
                },
                axisX: {
                    valueFormatString: "MM-YYYY",
                },
                axisY: {
                    title: "USD",
                    titleFontSize: 24,
                    includeZero: false
                },
                data: [{
                    type: "splineArea",
                    yValueFormatString: "#,### VNĐ",
                    dataPoints: dataPoints
                }]
            };

            function addData(data) {
                for (var i = 0; i < data.length; i++) {
                        dataPoints.push({
                            x: new Date(data[i].nam,data[i].thang),
                            y: parseInt(data[i].tien),
                            // label: ['Thang1','Tyhang2']
                        });

                }
                $("#chartContainer").CanvasJSChart(options);

            }
            $.getJSON("http://localhost/petshop/public/admin/thongke_doanhthu", addData);

            var chart = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title: {
                    text: "PETSHOP"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: dataPoints1
                }]
            });
            function addData1(data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].tc_trangThai != 2) {
                        dataPoints1.push({
                            y: data[i].soluong * 100 / @forEach($soluong as $sl) {{$sl->soluong}} @endforeach,
                            label: data[i].ltc_ten
                        });
                    }
                }

                chart.render();
            }
            $.getJSON("http://localhost/petshop/public/admin/thongke_phantram", addData1);

            var chart1 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                title: {
                    text: "PETSHOP"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: dataPoints2
                }]
            });
            function addData2   (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].tc_trangThai != 1) {
                        dataPoints2.push({
                            y: data[i].soluong * 100 / 1,
                            label: data[i].g_ten
                        });
                    }
                }

                chart1.render();
            }
            $.getJSON("http://localhost/petshop/public/admin/thongke_banchay", addData2);


        }
    </script>
@endsection