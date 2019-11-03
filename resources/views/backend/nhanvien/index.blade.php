@extends('backend.layout.master')

@section('title')
    Danh sách nhân viên
@endsection
@section('content-header')
    Danh Sách Nhân Viên
@endsection
@section('breadcrumb')
    Nhân viên
@endsection
@section('nhanvien')
    active
@endsection
@section('content')

    <div class="box" ng-controller="NhanVienController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 5%">STT</th>
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
                <tr ng-repeat="nv in memberList">
                    <td><% $index+1 %> </td>
                    <td><% nv.nv_hoTen %></td>
                    <td><% nv.nv_gioiTinh %> </td>
                    <td><% nv.nv_email %></td>
                    <td><% nv.nv_ngaySinh %></td>
                    <td><% nv.nv_diaChi %> </td>
                    <td><% nv.nv_dienThoai %></td>
                    <td><% nv.nv_taiKhoan %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',nv.nv_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(nv.nv_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmNhanVien" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="nv_taiKhoan" class="col-sm-2 control-label">Tên đăng nhập</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="nv_taiKhoan" name="nv_taiKhoan" placeholder="Tên đăng nhập" ng-model="NhanVien.nv_taiKhoan" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_taiKhoan.$error.required">Vui lòng nhập tên tài khoản!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_matKhau" class="col-sm-2 control-label">Mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input type="password"  class="form-control" id="nv_matKhau" name="nv_matKhau" placeholder="Mật khẩu" ng-model="NhanVien.nv_matKhau" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_matKhau.$error.required" ng-if="state=='create'">Vui lòng nhập mật khẩu!</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nv_matKhau1" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input type="password"  class="form-control" id="nv_matKhau1" name="nv_matKhau1" placeholder="Nhập lại mật khẩu" ng-model="NhanVien.nv_matKhau1" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_matKhau1.$error.required" ng-if="state=='create'">Vui lòng nhập lại mật khẩu!</span>
                                            <span ng-if="NhanVien.nv_matKhau1 != NhanVien.nv_matKhau && !frmNhanVien.nv_matKhau1.$error.required " class="error">Mật khẩu phải giống nhau!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kh_hoTen" class="col-sm-2 control-label">Họ tên</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="kh_hoTen" name="kh_hoTen" placeholder="Nhập họ tên" ng-model="NhanVien.nv_hoTen" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_hoTen.$error.required">Vui lòng nhập họ tên khách hàng!</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nv_gioiTinh" class="col-sm-2 control-label">Giới tính </label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input  type="radio"  name="nv_gioiTinh"  ng-value="1" ng-model="NhanVien.nv_gioiTinh" >
                                                &nbsp;&nbsp;Nam
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input  type="radio" name="nv_gioiTinh"  ng-value="2" ng-model="NhanVien.nv_gioiTinh"  >
                                                &nbsp;&nbsp;Nữ
                                            </label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nv_ngaySinh" class="col-sm-2 control-label">Ngày sinh</label>
                                        <div class="col-sm-10">
                                            <input type="date"  class="form-control" id="nv_ngaySinh" name="nv_ngaySinh" placeholder="Nhập lại mật khẩu" ng-model="NhanVien.nv_ngaySinh" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_ngaySinh.$error.required">Vui lòng nhập ngày sinh!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nv_email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="nv_email" name="nv_email" placeholder="Nhập email" ng-model="NhanVien.nv_email" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_email.$error.required">Vui lòng nhập email!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nv_diaChi" class="col-sm-2 control-label"> Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="nv_diaChi" name="nv_diaChi" placeholder="Nhập địa chỉ" ng-model="NhanVien.nv_diaChi" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_diaChi.$error.required">Vui lòng nhậpđịa chỉ!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nv_dienThoai" class="col-sm-2 control-label"> Điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="nv_dienThoai" name="nv_dienThoai" placeholder="Số điện thoại" ng-model="NhanVien.nv_dienThoai" ng-required="true">
                                            <span class="error" ng-show="frmNhanVien.nv_dienThoai.$error.required">Vui lòng nhập số điện thoại!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="q_id" class="col-sm-2 control-label">Quyền </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="NhanVien.q_id">
                                                <option value="0" ng-value="0">Chọn quyền</option>
                                                <option ng-repeat="q in listquyen " value="<% q.q_id %>" ng-value="<% q.q_id %>"><% q.q_ten %></option>
                                            </select>
                                            <span class="error" ng-if="NhanVien.q_id == 0">Bạn chưa chọn quyen!</span>
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
    <script src="{{ asset('app/controller/NhanVienController.js') }}"></script>
@endsection