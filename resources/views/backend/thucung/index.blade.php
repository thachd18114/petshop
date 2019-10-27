@extends('backend.layout.master')

@section('title')
    Danh sách thú cưng
@endsection
@section('content-header')
    Danh Sách  Thú Cưng
@endsection
@section('breadcrumb')
     Thú cưng
@endsection
@section('thucung')
    active
@endsection
@section('content')
    {{--    <a href="#" class="btn btn-primary">Thêm mới Chủ đề</a>--}}
    <div class="box" ng-controller="ThuCungController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="">STT</th>
                    <th>Tên thú cưng</th>
                    <th>Tuổi</th>
                    <th>Giới tính</th>
                    <th>Cân nặng</th>
                    <th>Nguồn gốc</th>
                    <th>Nhà cung cấp</th>
                    <th>Trạng Thái</th>
                    <th width="16%"></th>
                    <th style="text-align: center;width: 12%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="tc in memberList">
                    <td><% tc.tc_id %> </td>
                    <td><% tc.tc_ten %></td>
                    <td><% tc.tc_tuoi %></td>
                    <td><% tc.tc_gioiTinh %></td>
                    <td><% tc.tc_canNang %></td>
                    <td><% tc.ng_ten %></td>
                    <td><% tc.ncc_ten %></td>
                    <td><% tc.tc_trangThai %></td>
                    <td> <img src="http://res.cloudinary.com/petshop/image/upload/<% tc.ha_ten %>.png" alt="IMG-PRODUCT" width="150px" height="100px"></td>

                    <td style="text-align: center">
{{--                        <button class="btn btn-xs btn-primary btn-detail" ng-click="showDetails('details',tc.tc_id)"><i class="fa fa-eye" aria-hidden="true"></i></button>--}}

                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',tc.tc_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(tc.tc_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>

                    </td>

                </tr>
                </tbody>

            </table>
            <div class="modal fade" id="Modal" >
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><% modalTitle %></h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmThuCung" id="frmThuCung" class="form-horizontal" enctype="multipart/form-data" novalidate>
                                {{ csrf_field() }}
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Tên </label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_ten.$error.required">Vui lòng nhập tên thú cưng!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="g_id" class="col-sm-2 control-label">Thuộc giống </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="ThuCung.g_id">
                                                <option value="0" ng-value="0">Chọn giống</option>
                                                <option ng-repeat="g in listgiong " value="<% g.g_id %>" ng-value="<% g.g_id %>"><% g.g_ten %></option>
                                            </select>
                                            <span class="error" ng-if="ThuCung.g_id == 0">Bạn chưa chọn giống!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ncc_id" class="col-sm-2 control-label">Nhà cung cấp </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="ThuCung.ncc_id">
                                                <option value="0" ng-value="0">Chọn nhà cung cấp</option>
                                                <option ng-repeat="ncc in listnhacungcap " value="<% ncc.ncc_id %>" ng-value="<% ncc.ncc_id %>"><% ncc.ncc_ten %></option>
                                            </select>
                                            <span class="error" ng-if="ThuCung.ncc_id == 0">Bạn chưa chọn nhà cung cấp!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_tuoi" class="col-sm-2 control-label">Tuổi</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_tuoi" name="tc_tuoi" placeholder="Tuổi" ng-model="ThuCung.tc_tuoi" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_tuoi.$error.required">Vui lòng nhập tuổi thú cưng!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ngaySinh" class="col-sm-2 control-label">Ngày sinh</label>
                                        <div class="col-sm-10">
                                            <input type="date"  class="form-control"  id="tc_ngaySinh" name="tc_ngaySinh" ng-model="ThuCung.tc_ngaySinh" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_ngaySinh.$error.required">Vui lòng nhập ngày sinh thú cưng!</span>
                                            <span class="error" ng-show="loi === true">Ngày sinh không đúng so với sô tuổi!</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_gioiTinh" class="col-sm-2 control-label">Giới tính </label>
                                        <div class="col-sm-10">
                                                <label>
                                                    <input  type="radio"  name="tc_gioiTinh"  ng-value="1" ng-model="ThuCung.tc_gioiTinh" class="">
                                                    &nbsp;&nbsp;Đực
                                                </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <input  type="radio" name="tc_gioiTinh"  ng-value="2" ng-model="ThuCung.tc_gioiTinh"  class="" >
                                                    &nbsp;&nbsp;Cái
                                                </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_canNang" class="col-sm-2 control-label">Cân nặng</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_canNang" name="tc_canNang" placeholder="Cân nặng" ng-model="ThuCung.tc_canNang" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_canNang.$error.required">Vui lòng nhập cân nặng thú cưng!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_mauSac" class="col-sm-2 control-label">Màu sắc</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_mauSac" name="tc_mauSac" placeholder="Nhập màu" ng-model="ThuCung.tc_mauSac" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_mauSac.$error.required">Vui lòng nhập màu của thú cưng!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ng_id" class="col-sm-2 control-label">Nguồn gốc </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="ThuCung.ng_id">
                                                <option value="0" ng-value="0">Chọn nguồn gốc</option>
                                                <option ng-repeat="ng in listnguongoc " value="<% ng.ng_id %>" ng-value="<% ng.ng_id %>"><% ng.ng_ten %></option>
                                            </select>
                                            <span class="error" ng-if="ThuCung.ng_id == 0">Bạn chưa chọn nguồn gốc!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_giaBan" class="col-sm-2 control-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_giaBan" name="tc_giaBan" placeholder="Nhập giá" ng-model="ThuCung.tc_giaBan" ng-required="true">
                                            <span class="error" ng-show="frmThuCung.tc_giaBan.$error.required">Vui lòng nhập giá của thú cưng!</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Tiêm chủng</label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input type="radio"  name="tc_trangThaiTiemChung"  ng-value="1" ng-model="ThuCung.tc_trangThaiTiemChung">
                                                &nbsp;&nbsp;Đã tiêm chủng
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="tc_trangThaiTiemChung"  ng-value="2" ng-model="ThuCung.tc_trangThaiTiemChung"  class="" >
                                                &nbsp;&nbsp;Chưa tiêm chủng
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="ha_ten" class="col-sm-2 control-label">Hình ảnh</label>
                                        <div class="col-sm-10">
                                            <input id="ha_ten" type="file" name="ha_ten[]" ng-model="ThuCung.ha_ten" multiple >
{{--                                            <span class="error" ng-show="frmThuCung.ha_ten.$error.required">Vui lòng thêm hình ảnh!</span>--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_moTa" class="col-sm-2 control-label">Mô tả</label>
                                        <div class="col-sm-10">
                                            <textarea ckeditor="options" name="tc_moTa" ng-model="ThuCung.tc_moTa"  ng-required="true"></textarea>
                                            <span class="error" ng-show="frmThuCung.tc_moTa.$error.required">Vui lòng nhập mô tả!</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_trangThai" class="col-sm-2 control-label">Trạng thái </label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input  type="radio"  name="tc_trangThai"  ng-value="1" ng-model="ThuCung.tc_trangThai" >
                                                &nbsp;&nbsp;Chưa bán
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input  type="radio" name="tc_trangThai"  ng-value="2" ng-model="ThuCung.tc_trangThai"  class="" >
                                                &nbsp;&nbsp;Đã bán
                                            </label>
                                        </div>
                                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" ng-disabled="frmThuCung.$invalid"   ng-click="save(state,id)"><% modalButton %></button>
                        </div>
                                </div>
                        </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customer.css') }}">
@endsection

@section('custom-js')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('app/controller/ThuCungController.js') }}"></script>

@endsection
