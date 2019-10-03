@extends('backend.layout.master')

@section('title')
    Danh sách nguồn gốc thú cưng
@endsection
@section('content-header')
    Danh Sách Nguồn Gốc Thú Cưng
@endsection
@section('breadcrumb')
   Nguồn gốc
@endsection
@section('nguongoc')
    active
@endsection
@section('content')


    <div class="box" ng-controller="NguonGocController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Nguồn Gốc</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="ng in memberList">
                    <td><% ng.ng_id %> </td>
                    <td><% ng.ng_ten %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',ng.ng_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(ng.ng_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmNguonGoc" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="ng_ten" class="col-sm-2 control-label">Nguồn gốc</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="ng_ten" name="ng_ten"  placeholder="Nguồn gốc" ng-model="NguonGoc.ng_ten" ng-required="true">
                                            <span class="error" ng-show="frmNguonGoc.ng_ten.$error.required">Vui lòng nhập nguồn gốc!</span>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-disabled="frmNguonGoc.$invalid" ng-click="save(state,id)"><% modalButton %></button>
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
    <script src="{{ asset('app/controller/NguonGocController.js') }}"></script>
@endsection