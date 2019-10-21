<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('frontend.home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="{{route('frontend.account.order')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Đơn hàng của tôi
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <span class="stext-109 cl4">
				Chi tiết đơn hàng
        </span>
    </div>
    <div class="container" style="padding: 20px 0px">
        <div class="" style="padding: 20px 30px">
            <h4  style="padding-bottom: 25px">Chi tiết đơn hàng <span style="font-size: 16px;float: right;">Ngày đặt hàng: {{$dh->dh_ngayTao}}</span></h4>

        </div>
        <div class="row" style="padding: 0px 20px">
            <div class="col-lg-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
                <span style="">ĐƠN HÀNG</span><br>
                <div style="background-color: whitesmoke;margin-top: 15px;height: 140px;padding: 20px 15px;font-size: 15px">
                    <p style="padding-bottom: 8px"> Mã đơn hàng: {{$dh->dh_id}} </p>
                    <p> Ngày đặt hàng:  {{$dh->dh_ngayTao}}</p>
                </div>

            </div>

            <div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
               <span>ĐỊA CHỈ NGƯỜI NHẬN</span><br>
                <div style="background-color: whitesmoke;margin-top: 15px;height: 140px;padding: 20px 15px;font-size: 15px">
                    <p style="color: #0a0a0a;padding-bottom: 8px">{{$dh->kh_hoTen}}</p>
                    <p style="padding-bottom: 8px">{{$dh->dh_diaChi}}</p>

                    <p>Điện thoại: {{$dh->dh_dienThoai}}</p>
                </div>
            </div>
            <div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
                <span>HÌNH THỨC THANH TOÁN</span><br>
                <div style="background-color: whitesmoke;margin-top: 15px;height: 140px;padding: 20px 15px;font-size: 15px">
                    <p> {{$dh->httt_ten}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding: 20px 0px">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" style="padding: 0px 17px;margin-top: -30px">
            <table class="table table-shopping-cart" style="background-color: #f4f4f4">
                <thead>
                <tr>
                    <th colspan="2">Sản phẩm</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Tạm tính</th>
                </tr>
                </thead>
                @foreach($data as $tc)
                <tr>
                    <td width="250px" rowspan=""><img src="{{asset('storage/photos/' . $tc->ha_ten)}}" width="100%"></td>
                    <td><p>{{$tc->tc_ten}}</p>
                        Giống: {{$tc->g_ten}}
                    </td>
                    <td rowspan="">{{$tc->tc_giaBan}}$</td>
                    <td rowspan="">
                        @if($tc->giatri == null)
                            {{0}}
                            @else
                        {{$tc->giatri*$tc->tc_giaBan/100}}
                            @endif
                    </td>
                    <td rowspan="" id="tamtinh_{{$tc->tc_id}}">{{$tc->tc_giaBan-($tc->giatri*$tc->tc_giaBan/100)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: right">Tạm tính: <br>
                        Phí vận chuyển: <br>
                        Tổng cộng:
                    </td>
                    <td style="text-align: right;padding-right: 30px" width="12%">
                        {{$tam}} $<br>
                         0$<br>
                         <p style="color: red;font-size: 20px">{{$tam}} $</p>
                    </td>
                </tr>
            </table>
            <a href="{{route('frontend.account.order')}}"> << Quay lại đơn hàng của tôi</a>
        </div>
    </div>
</div>