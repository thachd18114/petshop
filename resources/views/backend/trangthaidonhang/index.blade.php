@extends('backend.layout.master')

@section('title')
    Danh sách trạng thái đơn hàng
@endsection
@section('content-header')
    Danh Sách Trạng Thái Đơn Hàng
@endsection
@section('breadcrumb')
    Trạng thái đơn hàng
@endsection
@section('ttdh')
    active
@endsection
@section('custom-css')

@endsection
@section('content')


    <div class="box" ng-controller="TrangThaiDonHangController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Trạng thai</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="ttdhang in memberList">
                    <td><% ttdhang.ttdh_id %> </td>
                    <td><% ttdhang.ttdh_ten %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',ttdhang.ttdh_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(ttdhang.ttdh_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
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
                            <form name="frmTrangThaiDonHang" class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="ltc_ten" class="col-sm-2 control-label">Tên trạng thái</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="ttdh_ten" name="ttdh_ten" placeholder="Tên trạng thái" ng-model="TrangThaiDonHang.ttdh_ten" ng-required="true">
                                            <span class="error" ng-show="frmTrangThaiDonHang.ttdh_ten.$error.required">Vui lòng nhập trạng thái!</span>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"  ng-disabled="frmTrangThaiDonHang.$invalid" ng-click="save(state,id)"><% modalButton %></button>
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
    <script src="{{ asset('app/controller/TrangThaiDonHangController.js') }}"></script>
@endsection