@extends('backend.layout.master')

@section('title')
    Danh sách giống
@endsection
@section('content-header')
    Danh Sách Giống Thú Cưng
@endsection
@section('breadcrumb')
    Giống thú cưng
@endsection
@section('giongthucung')
    active
@endsection
@section('content')
    <div class="box" ng-controller="GiongController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Giống</th>
                    <th>Loại Thú Cưng</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="g in memberList">
                    <td><% g.g_id %> </td>
                    <td><% g.g_ten %></td>
                    <td><% g.ltc_ten %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',g.g_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(g.g_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmGiong" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="g_ten" class="col-sm-2 control-label">Tên loại</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="g_ten" name="g_ten" placeholder="Tên loại giống" ng-model="Giong.g_ten" ng-required="true">
                                            <span class="error" ng-show="frmGiong.g_ten.$error.required">Vui lòng nhập giống!</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ltc_id" class="col-sm-2 control-label">Thuộc loại thú cưng</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="Giong.ltc_id">
                                                <option value="0" ng-value="0">Chọn loại thú cưng</option>
                                                <option ng-repeat="ltc in listloaithucung " value="<% ltc.ltc_id %>" ng-value="<% ltc.ltc_id %>"><% ltc.ltc_ten %></option>
                                            </select>
                                            <span class="error" ng-if="Giong.ltc_id == 0">Bạn chưa chọn loại thú cưng!</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-disabled="frmGiong.$invalid" ng-click="save(state,id)"><% modalButton %></button>
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
    <script src="{{ asset('app/controller/GiongController.js') }}"></script>
@endsection