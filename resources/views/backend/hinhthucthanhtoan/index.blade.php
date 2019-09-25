@extends('backend.layout.master')

@section('title')
    Danh sách hình thức thanh toán
@endsection
@section('content-header')
    Danh Sách Hình Thức Thanh Toán
@endsection
@section('breadcrumb')
    Hình thức thanh toán
@endsection
@section('hinhthucthanhtoan')
    active
@endsection
@section('content')


    <div class="box" ng-controller="HinhThucThanhToanController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Hình thức thanh toán</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="httt in memberList">
                    <td><% httt.httt_id %> </td>
                    <td><% httt.httt_ten %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',httt.httt_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(httt.httt_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmHinhThucThanhToan" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="httt_ten" class="col-sm-2 control-label">Hình thức thanh toán</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="httt_ten" name="httt_ten" placeholder="Tên hình thức thanh toán" ng-model="HinhThucThanhToan.httt_ten">
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
    <script src="{{ asset('app/controller/HinhThucThanhToanController.js') }}"></script>
@endsection