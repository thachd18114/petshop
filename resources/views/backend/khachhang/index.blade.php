@extends('backend.layout.master')

@section('title')
    Danh sách khách hàng
@endsection
@section('content-header')
    Danh Sách Khách Hàng
@endsection
@section('breadcrumb')
    Khách hàng
@endsection
@section('khachhang')
    active
@endsection
@section('content')


    <div class="box" ng-controller="KhachHangController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 5%">ID</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Tài khoản</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="kh in memberList">
                    <td><% kh.kh_id %> </td>
                    <td><% kh.kh_hoTen %></td>
                    <td><% kh.kh_gioiTinh %> </td>
                    <td><% kh.kh_email %></td>
                    <td><% kh.kh_ngaySinh %></td>
                    <td><% kh.kh_diaChi %> </td>
                    <td><% kh.kh_dienThoai %></td>
                    <td><% kh.kh_taiKhoan %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',kh.kh_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(kh.kh_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmDonHang" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="kh_taiKhoan" class="col-sm-2 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" placeholder="Tên đăng nhập" ng-model="KhachHang.kh_taiKhoan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_matKhau" class="col-sm-2 control-label">Mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input type="password"  class="form-control" id="kh_matKhau" name="kh_matKhau" placeholder="Mật khẩu" ng-model="KhachHang.kh_matKhau">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_matKhau1" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input type="password"  class="form-control" id="kh_matKhau1" name="kh_matKhau1" placeholder="Nhập lại mật khẩu" ng-model="KhachHang.kh_matKhau1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_hoTen" class="col-sm-2 control-label">Họ tên</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_hoTen" name="kh_hoTen" placeholder="Nhập họ tên" ng-model="KhachHang.kh_hoTen">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="kh_gioiTinh" class="col-sm-2 control-label">Giới tính </label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input  type="radio"  name="kh_gioiTinh"  ng-value="1" ng-model="KhachHang.kh_gioiTinh" class="">
                                                &nbsp;&nbsp;Nam
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input  type="radio" name="kh_gioiTinh"  ng-value="2" ng-model="KhachHang.kh_gioiTinh"  class="" >
                                                &nbsp;&nbsp;Nữ
                                            </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_ngaySinh" class="col-sm-2 control-label">Ngày sinh</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" placeholder="Nhập lại mật khẩu" ng-model="KhachHang.kh_ngaySinh">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_email" name="kh_email" placeholder="Nhập email" ng-model="KhachHang.kh_email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_diaChi" class="col-sm-2 control-label"> Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_diaChi" name="kh_diaChi" placeholder="Nhập địa chỉ" ng-model="KhachHang.kh_diaChi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_dienThoai" class="col-sm-2 control-label"> Điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_dienThoai" name="kh_dienThoai" placeholder="Số điện thoại" ng-model="KhachHang.kh_dienThoai">
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-click="save(state,id)"><% modalButton %></button>
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
    <script src="{{ asset('app/controller/KhachHangController.js') }}"></script>
@endsection