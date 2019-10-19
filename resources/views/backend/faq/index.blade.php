@extends('backend.layout.master')

@section('title')
    Danh sách FAQ
@endsection
@section('content-header')
    Danh Sách FAQ
@endsection
@section('breadcrumb')
   FAQ
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
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead >
                <tr >
                    <th style="width: 10%">STT</th>
                    <th>Tài khoản</th>
                    <th>Nội dung</th>
                    <th>Thời gian</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="faq in memberList">
                    <td><% $index+1 %></td>
                    <td><% faq.kh_taiKhoan %></td>
                    <td><% faq.ch_noiDung %></td>
                    <td><% faq.ch_thoiGian %></td>

                    <td style="text-align: center">
                        <a href="{{asset('admin/faq') }}/<% faq.kh_id %>" ><button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;"  ><i class="fas fa-comment-dots" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;</a>
                    </td>

                </tr>
                </tbody>

            </table>

        </div>
    </div>

@endsection
@section('custom-js')
    <script src="{{ asset('app/controller/FaqController.js') }}"></script>
@endsection