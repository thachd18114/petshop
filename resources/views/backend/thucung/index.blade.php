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
                    <th>Trạng Thái Tiêm Chủng</th>
                    <th>Trạng Thái</th>
                    <th style="text-align: center;width: 10%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="tc in memberList">
                    <td><% tc.tc_id %> </td>
                    <td><% ltc.tc_ten %></td>
                    <td style="text-align: center">
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
                            <form name="frmThuCung" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Tên </label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Thuộc giống </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="Giong.ltc_id">
                                                <option value="0" ng-value="0">Chọn loại thú cưng</option>
                                                <option   value="" ng-value="">1</option>
                                                <option   value="" ng-value="">1</option>
                                                <option   value="" ng-value="">1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_tuoi" class="col-sm-2 control-label">Tuổi</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_tuoi" name="tc_tuoi" placeholder="Tên thú cưng" ng-model="ThuCung.tc_tuoi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Giới tính </label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input type="radio" name="tc_gioiTinh" class="minimal" checked>
                                                &nbsp;&nbsp;<i class="fas fa-mars" style="color: #0b3e6f; font-size:medium" ></i>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="tc_gioiTinh" class="minimal">
                                                &nbsp;&nbsp;<i class="fas fa-venus-double" style="color: #6c1646;font-size:medium"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Cân nặng</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Màu sắc</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Tiêm chủng</label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input type="radio"  name="tc_tinhTrangTiemChung" class="minimal" checked>
                                                &nbsp;&nbsp;Đã tiêm chủng
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="tc_tinhTrangTiemChung" class="minimal">
                                                &nbsp;&nbsp;Chưa tiêm chủng
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="ha_ten" class="col-sm-2 control-label">Hình ảnh</label>
                                        <div class="col-sm-10">
                                            <input id="ha_ten" type="file" name="ha_ten[]" multiple>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Mô tả</label>
                                        <div class="col-sm-10">
                                             <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
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
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customer.css') }}">
@endsection

@section('custom-js')
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('app/controller/ThuCungController.js') }}"></script>
@endsection