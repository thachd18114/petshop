{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}


{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/stype.css') }}" />


{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}

    <div class="container">
        <section class="content">
            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                        <h2>404 - Khong Tim Thay !</h2>
                    </div>
                    <a href="{{ route('frontend.home') }}">Trở về trang chủ</a>
                </div>
            </div>
        </section>
    </div>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>