@extends('backend.layout.master')

@section('title')
     FAQ
@endsection
@section('content-header')
    FAQ
@endsection
@section('breadcrumb')
    chitiet  <input type="text" class="hidden" name="kh_id" id="kh_id" value="{{$kh_id->kh_id}}"/>
@endsection
@section('faq')
    active
@endsection
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customer.css') }}">
@endsection
@section('content')
    <div class="box" ng-controller="FaqController">
        <!-- /.box-header -->
        <div class="box-body">
            <form name="frmFaq" class="form-horizontal">
                <div class="container-fluid" style="padding-top: 20px;">
                    <div class="container-fluid" style="padding-bottom: 30px">
                        <textarea class="form-control" rows="3" id="noiDung" name="ph_noiDung" ng-model="Faq.ph_noiDung"  placeholder="Phản hồi"></textarea>
                        <button class="btn btn-primary" ng-click="crete_ph()" style="margin-top: 10px; float: right"> Gửi phản hòi </button><br>
{{--                        <button class="btn btn-default" type="reset" style="margin-top: 10px;margin-left: 20px;float: right">Hủy</button><br>--}}
                        <a href="{{route('faq')}}">
                            <i class="fas fa-reply-all"></i>
                            Trở về danh sách faq
                        </a>
                    </div>
                    <hr style="border: 1px solid #e7e7e7">
                    <div class="" id="style-1" style=" overflow-x: hidden;border: 1px solid #ededed;max-height: 450px;overflow-y: scroll;">
                        <div ng-repeat="t in info" style="padding: 10px 10px" id="faq-<% $index %>">
                            <!-- Review -->
                            <div ng-show="t[3] === 1" style="padding: 8px 15px;border: 1px solid #ededed;border-left: 4px solid #0b73aa;">
                                <div>
                                    <div >
                                        <span style="font-size: 18px;font-weight: bold;color: #585858"><% t[2] %></span>
                                        <span  style="font-size: 14px;color: #878787; float:right;"><% t[1] %></span>
                                    </div>

                                    <p  style="padding-top: 8px" ><% t[0] %></p>

                                </div>
                            </div>
                            <div ng-show="t[3] === 2" style="padding: 10px 15px;border: 1px solid #ededed;border-left: 4px solid #f40a56;">
                                <div>
                                    <div >
                                        <span style="font-size: 18px;font-weight: bold;color: #585858"><% t[2] %></span>  <small style="margin-left: 7px;color: white ;font-size: 12px;background-color: #f4a0bb;padding: 1px;">Admin</small>
                                        <span  style="font-size: 14px;color: #878787; float:right;"><% t[1] %></span>
                                    </div>

                                    <p style="padding-top: 8px" ><% t[0] %></p>

                                </div>
                            </div>
                        </div >
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
@section('custom-js')
{{--    <script type="text/javascript">--}}
{{--        $( document ).ready(function() {--}}
{{--            $('#faq-3')[0].scrollIntoView();--}}
{{--        });--}}
{{--    </script>--}}
    <script src="{{ asset('app/controller/FaqController.js') }}"></script>
@endsection





