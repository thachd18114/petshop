@extends('backend.layout.master')

@section('title')
    Danh sách đơn hàng
@endsection
@section('content-header')
    Danh Sách Đơn Hàng
@endsection
@section('breadcrumb')
    Đơn hàng
@endsection
@section('donhang')
    active
@endsection
@section('content')


    <div class="box" ng-controller="DonHangController">
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" dt-options="dtOptions" dt-columns="dtColumns" datatable="ng" class="table table-bordered table-striped dataTable">
                <thead ng-show="!isLoading">
                <tr>
                    <th style="width: 10%">ID</th>
                    <th>Người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Hình thức thanh toán</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền </th>
                    <th>Trạng Thái</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;" name="btnReLoad" id="btnReLoad" ng-click="refreshData()"><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
{{--                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;" name="btnAdd" id="btnAdd"   ng-click="modal('create')" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>--}}

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="dh in memberList">
                    <td><% dh.dh_id %> </td>
                    <td><% dh.dh_nguoiNhan %></td>
                    <td><% dh.dh_diaChi %> </td>
                    <td><% dh.dh_dienThoai %></td>
                    <td><% dh.httt_ten %> </td>
                    <td><% dh.kh_hoTen %></td>
                    <td>$ <% dh.dh_tongGia %></td>
                    <td><% dh.ttdh_ten %></td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn bg-orange" style="width: 22px; height: 22px;"  ng-click="detail(dh.dh_id, dh.kh_id)"><i class="fas fa-info" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;

                        <button class="btn btn-social-icon btn bg-purple" style="width: 22px; height: 22px;" ng-click="modal('edit',dh.dh_id)" ><i class="fas fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-danger" style="width: 22px; height: 22px;" ng-click="delConfirm(dh.dh_id)" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>

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
                                        <label for="dh_nguoiNhan" class="col-sm-2 control-label">Người nhận</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" placeholder="Người nhận" ng-model="DonHang.dh_nguoiNhan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dh_diaChi" class="col-sm-2 control-label">Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="dh_diaChi" name="dh_diaChi" placeholder="Địa chỉ" ng-model="DonHang.dh_diaChi">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dh_dienThoai" class="col-sm-2 control-label">Điện thoại</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="dh_dienThoai" name="dh_dienThoai" placeholder="Điện thoại" ng-model="DonHang.dh_dienThoai">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="g_id" class="col-sm-2 control-label">Hình thức thanh toán</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="DonHang.httt_id">
                                                <option value="0" ng-value="0">Chọn cách thanh toán</option>
                                                <option ng-repeat="tt in listhttt " value="<% tt.httt_id %>" ng-value="<% tt.httt_id %>"><% tt.httt_ten %></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="g_id" class="col-sm-2 control-label">Khách hàng </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="DonHang.kh_id">
                                                <option value="0" ng-value="0">Khách hàng</option>
                                                <option ng-repeat="kh in listkhachhang " value="<% kh.kh_id %>" ng-value="<% kh.kh_id %>"><% kh.kh_hoTen %></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="g_id" class="col-sm-2 control-label">Trạng Thái </label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%"  ng-model="DonHang.ttdh_id">
                                                <option value="0" ng-value="0">Trạng thái</option>
                                                <option ng-repeat="tt in listttdh " value="<% tt.ttdh_id %>" ng-value="<% tt.ttdh_id %>"><% tt.ttdh_ten %></option>
                                            </select>
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
            <div class="modal fade" id="Modal1">
                <div class="modal-dialog">
                    <div class="modal-content" id="modal-dhchitiet">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><% modalTitle %></h4>
                        </div>
                        <div class="modal-body">
                            <section class="invoice">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            <i class="fa fa-globe"></i> PETSHOP.
                                            <small class="pull-right">Ngày tạo: <% donhang.dh_ngayTao %></small>
                                        </h2>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-2 invoice-col">
                                        Từ
                                        <address>
                                            <strong>PETSHOP</strong><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-5 invoice-col">
                                        Đến
                                        <address>
                                            <strong><% donhang.dh_nguoiNhan %></strong><br>
                                            Địa chỉ: <% donhang.dh_diaChi %><br>
                                            Phone: <% donhang.dh_dienThoai %><br>
                                            Email: <% khachhang1.kh_email %>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-5 invoice-col">
                                        <b>Đơn hàng</b><br>
                                        <br>
                                        <b>Mã đơn hàng:</b> <% donhang.dh_id %><br>

                                        <b>Khách hàng:</b> <% khachhang1.kh_hoTen %>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Mã</th>
                                                <th>Thú Cưng</th>
                                                <th>Giống</th>
                                                <th>Giá</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr ng-repeat="ct in chitiet">
                                                <td><% ct.tc_id %></td>
                                                <td><% ct.tc_ten %></td>

                                                <td><% ct.g_ten %></td>
                                                <td><% ct.tc_giaBan %></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        <p class="lead">Hình thức thanh toán:</p>
                                        <img src="{{asset('themes/adminlte/img/credit/paypal2.png')}}" alt="Paypal">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
{{--                                            <p class="lead">Amount Due 2/22/2014</p>--}}

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr  >
                                                    <th style="width:50%">Tổng giá:</th>
                                                    <td><% donhang.dh_tongGia%> $</td>
                                                </tr>
{{--                                                <tr>--}}
{{--                                                    <th>Tax (9.3%)</th>--}}
{{--                                                    <td>0</td>--}}
{{--                                                </tr>--}}
                                                <tr>
                                                    <th>Shipping:</th>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><% donhang.dh_tongGia%> $</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
{{--                                <div class="row no-print">--}}
{{--                                    <div class="col-xs-12">--}}
{{--                                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>--}}
{{--                                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment--}}
{{--                                        </button>--}}
{{--                                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">--}}
{{--                                            <i class="fa fa-download"></i> Generate PDF--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
{{--                            <button type="button" class="btn btn-primary" ng-click="save(state,id)"><% modalButton %></button>--}}
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

    <link rel="stylesheet" type="text/css" href="{{ asset('css/customer.css') }}">
    <script src="{{ asset('app/controller/DonHangController.js') }}"></script>
@endsection