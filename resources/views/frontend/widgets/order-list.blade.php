@if(count($data) >0)
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('frontend.home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
            <span class="stext-109 cl4">
				 Đơn hàng của tôi
			</span>
        </div>
    </div>
<div class="container" style="padding: 20px 0px">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent" style="padding: 20px 30px">
    <h4  style="padding-bottom: 25px">Đơn hàng của tôi</h4>
    <table class="table table-shopping-cart" style="background-color: #f4f4f4">
        <thead>
        <tr>
            <th>Ngày</th>
            <th>Mã đơn hàng</th>
            <th>Thanh toán</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th width="11%"></th>
        </tr>

        </thead>

            @foreach($data as $dh)
            <tr>
                <td>  {{date('d-m-Y', strtotime($dh->dh_ngayTao))}}</td>
                <td>{{$dh->dh_id}}</td>
                <td>{{$dh->httt_ten}}</td>
                <td>{{$dh->dh_tongGia}}</td>
                <td>{{$dh->ttdh_ten}}</td>
                @if($dh->ttdh_id ==1)
                    <td><a href="{{route('frontend.order.info', ['id'=> $dh->dh_id])}}">Chi tiết</a> &nbsp&nbsp&nbsp <a href="#">Hủy</a>&nbsp</td>
                @else
                    <td><a href="#">Chi tiết</a></td>
                @endif
            </tr>

        @endforeach


    </table>
    </div>
</div>
    @else
    <div class="col-lg-12 col-md-12">
        <div class="alert alert-warning" role="alert">
            Bạn chưa có đơn hàng nào!
        </div>
    </div>
    @endif

