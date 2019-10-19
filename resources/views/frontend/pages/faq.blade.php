{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
    FAQ
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
    <style >
        #style-1::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }
        #style-1::-webkit-scrollbar-thumb {
            background-color: #283f80;
        }
        #style-1::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
    </style>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('frontend.home')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            {{--        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">--}}
            {{--            Chó--}}
            {{--            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>--}}
            {{--        </a>--}}

            <span class="stext-109 cl4">
				 Faq
			</span>
        </div>
    </div>
    <div class="container" style="padding-top: 20px">

        <div class="col-sm-10 col-md-8 col-lg-10 m-lr-auto" id="style-1" style=" overflow-x: hidden;border: 1px solid #ededed;max-height: 450px;overflow-y: scroll;">
           @foreach($faq as $f)
               @if($f[3] ==1)
            <div class="p-b-30 m-lr-15-sm" id="{{$f[4]}}" style="margin-bottom: 15px;padding: 10px 15px;border: 1px solid #ededed;border-left: 4px solid #563bbf;" >
                <!-- Review -->
                <div class="flex-w flex-t" >
                    <div class="size-207" >
                        <div class="flex-w flex-sb-m p-b-17">
                            <span class="mtext-107 cl2 p-r-20" style="font-size: 18px;font-weight: bold;color: #585858">{{$f[2]}}</span>
                            <span class="fs-18" style="font-size: 14px;color: #878787;">{{$f[1]}}</span>
                        </div>

                        <p class="stext-102 cl6">{{$f[0]}}</p>

                    </div>
                </div>

                <!-- Add review -->
            </div>
                @else
                    <div class="p-b-30 m-lr-15-sm" id="{{$f[4]}}" style="margin-bottom: 15px;padding: 10px 15px;border: 1px solid #ededed;border-left: 4px solid #f40a56;" >
                        <!-- Review -->
                        <div class="flex-w flex-t" >
                            <div class="size-207" >
                                <div class="flex-w flex-sb-m p-b-17">
                                    <span class="mtext-107 cl2 p-r-20" style="font-size: 18px;font-weight: bold;color: #585858">{{$f[2]}}<small style="margin-left: 7px;color: white ;font-size: 12px;background-color: #f4a0bb;padding: 1px;">Admin</small></span>
                                    <span class="fs-18" style="font-size: 14px;color: #878787;">{{$f[1]}}</span>
                                </div>

                                <p class="stext-102 cl6">{{$f[0]}}</p>

                            </div>
                        </div>

                        <!-- Add review -->
                    </div>
                   @endif
            @endforeach

        </div>
        <div class="col-sm-10 col-md-8 col-lg-10 m-lr-auto" style="padding-top: 30px">
            <form class="w-full" name="frmFAQ" id="frmFAQ">

                <div class="row p-b-25">
                    <div class="col-12 p-b-5">
                        <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="noiDung" name="noiDung"></textarea>
                    </div>
                </div>

                <button id="btnFAQ" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" >
                    Submit
                </button>
            </form>
        </div>

    </div>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
    <script>
        window.onload = function () {
            var sl = {{$sl -1}}
            // alert(sl);
            document.getElementById(sl).scrollIntoView();
        };

        $('#btnFAQ').click(function(){
            var tdn = '<?php echo Session::get('tenDangNhap');  ?>';
            if (tdn){
                var url =  'http://localhost/petshop/public/question/';
                // alert(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    data:{
                        'kh_taiKhoan' : tdn,
                        'noiDung' : $("#noiDung").val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response){
                         location.reload();
                    },
                    error:function(response){

                    }
                });
            }
            else {
                window.location="http://localhost/petshop/public/dangnhap";
            }

        });
    </script>


@endsection