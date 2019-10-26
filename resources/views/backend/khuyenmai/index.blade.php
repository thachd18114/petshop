@extends('backend.layout.master')

@section('title')
    Danh sách khuyến mãi
@endsection
@section('content-header')
    Danh Sách Khuyến Mãi
@endsection
@section('breadcrumb')
    Khuyến mãi
@endsection
@section('khuyenmai')
    active
@endsection
@section('custom-css')

@endsection
@section('content')


    <div class="box" ng-controller="KhuyenMaiController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Tên</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Giá trị (%)</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange"title="Load lại trang" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" title="Tạo mới" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="km in memberList">
                    <td><% km.km_id %> </td>
                    <td><% km.km_ten %></td>
                    <td><% km.km_ngayBatDau %></td>
                    <td><% km.km_ngayKetThuc %></td>
                    <td><% km.km_giaTri %></td>
                    <td style="text-align: center">
                       <a href="{{asset('admin/thucung_khuyenmai') }}/<% km.km_id %>"><button class="btn btn-social-icon btn bg-orange" title="Danh sách thú cưng" style="width: 22px; height: 22px;" ><i class="fas fa-clipboard-list" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;</a>
                        <button class="btn btn-social-icon btn bg-purple" title="Cập nhật" style="width: 22px; height: 22px;" ng-click="modal('edit',km.km_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" title="Xóa" style="width: 22px; height: 22px;" ng-click="delConfirm(km.km_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
                    </td>

                </tr>
                </tbody>

            </table>
            <div class="modal fade" id="Modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><% modalTitle %></h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmKhuyenMai" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="km_ten" class="col-sm-2 control-label">Tên</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="km_ten" name="km_ten" placeholder="Tên khuyến mãi" ng-model="KhuyenMai.km_ten" ng-required="true">
                                            <span class="error" ng-show="frmKhuyenMai.km_ten.$error.required">Vui lòng nhập tên khuyến mãi!</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="km_giaTri" class="col-sm-2 control-label">Phần trăm giảm</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="km_giaTri" name="km_giaTri" placeholder="Nhập pần trăm" ng-model="KhuyenMai.km_giaTri" ng-pattern="/^[0-9]*$/" ng-required="true">
                                            <span class="error" ng-show="frmKhuyenMai.km_giaTri.$error.required">Vui lòng nhập giá trị!</span>
                                            <span class="error" ng-show="frmKhuyenMai.km_giaTri.$error.pattern">Chỉ được nhập số</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="km_ngayBatDau" class="col-sm-2 control-label">Ngày bắt đầu</label>
                                        <div class="col-sm-10">
                                            <input type="date"  class="form-control"  id="km_ngayBatDau" name="km_ngayBatDau" ng-model="KhuyenMai.km_ngayBatDau" ng-required="true">
                                            <span class="error" ng-show="frmKhuyenMai.km_ngayBatDau.$error.required">Vui lòng nhập ngày bắt đầu!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="km_ngayKetThuc" class="col-sm-2 control-label">Ngày kết thúc</label>
                                        <div class="col-sm-10">
                                            <input type="date"  class="form-control"  id="km_ngayKetThuc" name="km_ngayKetThuc" ng-model="KhuyenMai.km_ngayKetThuc" ng-required="true">
                                            <span class="error" ng-show="frmKhuyenMai.km_ngayKetThuc.$error.required">Vui lòng nhập ngày kết thúc</span>
                                            <span class="error" ng-show="loi === true">Ngày kết thúc phải lớn hơn ngày bắt đầu</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="km_trangThai" class="col-sm-2 control-label">Trạng Thái</label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input  type="radio"  name="km_trangThai"  ng-value="1" ng-model="KhuyenMai.km_trangThai" >
                                                &nbsp;&nbsp;Kích hoạt
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input  type="radio" name="km_trangThai"  ng-value="2" ng-model="KhuyenMai.km_trangThai"  >
                                                &nbsp;Khóa
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"  ng-disabled="frmKhuyenMai.$invalid" ng-click="save(state,id)"><% modalButton %></button>
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
@section('custom-js')
    <script src="{{ asset('app/controller/KhuyenMaiController.js') }}"></script>
@endsection