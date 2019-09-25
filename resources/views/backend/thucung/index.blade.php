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
                    <td><% tc.tc_trangThaiTiemChung %></td>
                    <td><% tc.tc_trangThai %></td>


                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" ng-click="detailmd(tc.tc_id)" ><i class="fas fa-info" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
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
                            <form name="frmThuCung" id="frmThuCung" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="tc_ten" class="col-sm-2 control-label">Tên </label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ten" name="tc_ten" placeholder="Tên thú cưng" ng-model="ThuCung.tc_ten">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="g_id" class="col-sm-2 control-label">Thuộc giống </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="ThuCung.g_id">
                                                <option value="0" ng-value="0">Chọn giống</option>
                                                <option ng-repeat="g in listgiong " value="<% g.g_id %>" ng-value="<% g.g_id %>"><% g.g_ten %></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_tuoi" class="col-sm-2 control-label">Tuổi</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_tuoi" name="tc_tuoi" placeholder="Tuổi" ng-model="ThuCung.tc_tuoi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_ngaySinh" class="col-sm-2 control-label">Ngày sinh</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_ngaySinh" name="tc_ngaySinh" placeholder="Ngày sinh" ng-model="ThuCung.tc_ngaySinh">
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
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_canNang" class="col-sm-2 control-label">Cân nặng</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_canNang" name="tc_canNang" placeholder="Cân nặng" ng-model="ThuCung.tc_canNang">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_mauSac" class="col-sm-2 control-label">Màu sắc</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_mauSac" name="tc_mauSac" placeholder="Nhập màu" ng-model="ThuCung.tc_mauSac">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_giaBan" class="col-sm-2 control-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="tc_giaBan" name="tc_giaBan" placeholder="Nhập giá" ng-model="ThuCung.tc_giaBan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Tiêm chủng</label>
                                        <div class="col-sm-10">
                                            <label>
                                                <input type="radio"  name="tc_trangThaiTiemChung"  ng-value="1" ng-model="ThuCung.tc_trangThaiTiemChung" class="">
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
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tc_moTa" class="col-sm-2 control-label">Mô tả</label>
                                        <div class="col-sm-10">
{{--                                             <textarea id="editor1"  name="tc_moTa" rows="10" cols="80" ng-model="ThuCung.tc_moTa"></textarea>--}}
                                            <textarea ckeditor="options" name="tc_moTa" ng-model="ThuCung.tc_moTa"></textarea>
                                        </div>
                                    </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"  ng-click="save(state,id)"><% modalButton %></button>
                        </div>
                                </div>
                        </form>

                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
            <div class="modal fade" id="Modal-detal" >
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Chi tiết thú cưng</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                               <table class="table">
                                   <tr>
                                       <th style="width: 15%">ID</th>
                                       <td><% detail.tc_id%></td>
                                   </tr>
                                   <tr>
                                       <th>Tên</th>
                                       <td><% detail.tc_ten%></td>
                                   </tr>
                                   <tr>
                                       <th>Giá</th>
                                       <td><% detail.tc_giaBan%></td>
                                   </tr>
                                   <tr>
                                       <th>Tuổi</th>
                                       <td><% detail.tc_tuoi%></td>
                                   </tr>
                                   <tr>
                                       <th>Ngày sinh</th>
                                       <td>11-11-1192</td>
                                   </tr>
                                   <tr>
                                       <th>Giới tính</th>
                                       <td><% detail.tc_gioiTinh%></td>
                                   </tr>
                                   <tr>
                                       <th>Cân nặng</th>
                                       <td><% detail.tc_canNang%></td>
                                   </tr>
                                   <tr>
                                       <th>Màu sắc</th>
                                       <td><% detail.tc_mauSac%></td>
                                   </tr>
                                   <tr>
                                       <th>Gióng</th>
                                       <td><% detail.g_ten%></td>
                                   </tr>
                                   <tr>
                                       <th>Trạng Thái tiêm chủng</th>
                                       <td><% detail.tc_trangThaiTiemChung%></td>
                                   </tr>
                                   <tr>
                                       <th>Trạng Thái</th>
                                       <td><% detail.tc_trangThai%></td>
                                   </tr>
                                   <tr>
                                       <th>Mô tả</th>
                                       <td ng-bind-html="" >{!!"<%  %>" !!}</td>
                                   </tr>
                                   <tr>
                                       <th>Hình ảnh</th>
                                       <td>
                                           <div class="container-fluid">
                                               <div class="col-xs-3">
                                                   <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" width="80%" height="80%" alt="IMG-PRODUCT">
                                               </div>
                                               <div class="col-xs-3">
                                                   <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" width="80%" height="80%" alt="IMG-PRODUCT">

                                               </div>
                                               <div class="col-xs-3">
                                                   <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" width="80%" height="80%" alt="IMG-PRODUCT">

                                               </div>
                                               <div class="col-xs-3">
                                                   <img src="{{ asset('themes/cozastore/images/spcho4.png')}}" width="80%" height="80%" alt="IMG-PRODUCT">
                                               </div>

                                           </div>
                                       </td>
                                   </tr>



                               </table>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
{{--                            <button type="submit" class="btn btn-primary"  ng-click="save(state,id)">Đồng ý</button>--}}
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.box-body -->
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
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js"></script>
@endsection
