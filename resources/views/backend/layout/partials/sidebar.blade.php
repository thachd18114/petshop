<aside class="main-sidebar">
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('trangchu') ">
                <a href="{{ route('trangchu') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span> &nbsp; Trang Chủ</span>
                </a>
            </li>
            <li class="@yield('loaithucung') ">
                <a href="{{ route('loaithucung') }} ">
                    <i class="fab fa-firefox"></i>
                    <span> &nbsp;Loại thú cưng</span>
                </a>
            </li>


            <li class="@yield('giongthucung') ">
                <a href="{{route('giong')}}">
                    <i class="fas fa-paw"></i>
                    <span> &nbsp; Giống</span>
                </a>
            </li>
            <li class="@yield('nguongoc') ">
                <a href="{{route('nguongoc')}}">
                    <i class="fas fa-chess-rook"></i>
                    <span> &nbsp; Nguồn gốc</span>
                </a>
            </li>
            <li class="@yield('nhacungcap')">
                <a href="{{route('nhacungcap')}}">
                    <i class="fas fa-industry"></i>
                    <span>&nbsp; Nhà cung cấp</span>
                </a>
            </li>
            <li class="@yield('thucung')">
                <a href="{{ route('thucung')}}">
                    <i class="fa fa-dove"></i>
                    <span>Thú cưng</span>
                </a>
            </li>
            <li class="@yield('donhang')">
                <a href="{{route('donhang')}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>&nbsp; Đơn hàng</span>
                </a>
            </li>
            <li class="@yield('khachhang')">
                <a href="{{route('khachhang')}}">
                    <i class="fas fa-address-card"></i>
                    <span>&nbsp; Khách hàng</span>
                </a>
            </li>
            <li class="@yield('hinhthucthanhtoan')">
                <a href="{{ route('hinhthucthanhtoan')}}">
                    <i class="far fa-credit-card"></i>
                    <span>&nbsp;Hình thức thanh toán</span>
                </a>
            </li>

            <li class="@yield('khuyenmai')">
                <a href="{{route('khuyenmai')}}">
                    <i class="fas fa-donate"></i>
                    <span>&nbsp; Khuyến mãi</span>
                </a>
            </li>
            <li class="@yield('ttdh')">
                <a href="{{route('ttdonhang')}}">
                    <i class="fas fa-file-import"></i>
                    <span>&nbsp;Trạng thái đơn hàng</span>
                </a>
            </li>
            <li class="@yield('quyen')">
                <a href="{{route('quyen')}}">
                    <i class="fas fa-user-clock"></i>
                    <span>&nbsp;Quyền</span>
                </a>
            </li>
            <li class="@yield('nhanvien')">
                <a href="{{route('nhanvien')}}">
                    <i class="fas fa-user-clock"></i>
                    <span>&nbsp;Nhân viên</span>
                </a>
            </li>
            <li class="@yield('faq')">
                <a href="{{route('faq')}}">
                    <i class="fas fa-comment-dots"></i>
                    <span>&nbsp;FAQ</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
