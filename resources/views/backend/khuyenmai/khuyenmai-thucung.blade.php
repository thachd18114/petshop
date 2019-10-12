@extends('backend.layout.master')

@section('title')
    Danh sách thú cưng khuyến mãi
@endsection
@section('content-header')
    Danh Sách Thú Cưng Khuyến Mãi
@endsection
@section('breadcrumb')
    <a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang chủ</a> >
    Danh sách
    <input type="text" class="hidden" name="km_id" id="km_id" value="{{$km_id->km_id}}"/>
@endsection
@section('khuyenmai')
    active
@endsection
@section('custom-css')

@endsection
@section('content')


    <div class="box" ng-controller="KhuyenMaiTCController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th></th>
                    <th style="width: 10%">ID</th>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Giới tính</th>
                    <th>Trạng thái</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange"title="Load lại trang" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" title="Tạo mới" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                        <button class="btn btn-social-icon btn-danger" title="Xóa" style="width: 22px; height: 22px;" ng-click="deletelist()" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="km in memberList">
                    <td>  <input type="checkbox" name="ck" id="ck_<% km.tc_id %>" style="padding-top: -10px" /></td>
                    <td><% km.tc_id %> </td>
                    <td><% km.tc_ten %></td>
                    <td><% km.tc_tuoi %></td>
                    <td><% km.tc_gioiTinh %></td>
                    <td><% km.tc_trangThai %></td>
                    <td style="text-align: center">

                        <button class="btn btn-social-icon btn-danger" title="Xóa" style="width: 22px; height: 22px;" ng-click="delConfirm(km.km_id, km.tc_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
                    </td>

                </tr>
                </tbody>

            </table>
            <div class="modal fade" id="Modal">
                <div class="modal-dialog">
                    <div class="modal-content" style=" width: 800px;
    margin-left: -100px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><% modalTitle %></h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmDSThuCung" class="form-horizontal">
                                <div class="container-fluid">
                                    <table  id="example3" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                                        <thead ng-show="!isLoading">
                                        <tr>
                                            <th></th>
                                            <th style="width: 10%">ID</th>
                                            <th>Tên</th>
                                            <th>Tuổi</th>
                                            <th>Giới tính</th>
                                            <th>Trạng thái</th>
                                            <th style="text-align: center;width: 15%">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-repeat="tc in listtc">
                                            <td>  <input type="checkbox" name="ck1" id="ck1_<% tc.tc_id %>" style="padding-top: -10px" /></td>
                                            <td><% tc.tc_id %> </td>
                                            <td><% tc.tc_ten %></td>
                                            <td><% tc.tc_tuoi %></td>
                                            <td><% tc.tc_gioiTinh %></td>
                                            <td><% tc.tc_trangThai %></td>
                                            <td >
                                                <img src="{{ asset('storage/photos') }}/<% tc.ha_ten %>" alt="IMG-PRODUCT" width="150px" height="100px">
                                            </td>

                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-click="save()"><% modalButton %></button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('custom-css')
@endsection
@section('custom-js')
    <script src="{{ asset('app/controller/KhuyenMaiTCController.js') }}"></script>
@endsection