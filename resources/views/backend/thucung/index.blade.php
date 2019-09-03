@extends('backend.layout.master')

@section('title')
    Danh sách thú cưng
@endsection
@section('content-header')
    Danh Sách  Thú Cưng
@endsection
@section('breadcrumb')
     thú cưng
@endsection
@section('thucung')
    active
@endsection
@section('content')
    {{--    <a href="#" class="btn btn-primary">Thêm mới Chủ đề</a>--}}
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 10%">STT</th>
                    <th>Tên</th>
                    <th>Tuổi</th>
                    <th>Màu</th>
                    <th>Cân nặng</th>
                    <th>Nguồn gốc</th>
                    <th style="text-align: center;width: 15%">
                        <button class="btn btn-social-icon btn btn-linkedin" style="width: 22px; height: 22px;" ><i class="fas fa-sync-alt" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn bg-olive" style="width: 22px; height: 22px;"data-toggle="modal" data-target="#modal-default" > <i class="fas fa-plus" style="font-size: 12px;margin-top: -6px"></i></button>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 1; $i <= 40; $i++){?>
                <tr>
                    <td><?php echo $i?></td>
                    <td>Chó alaska</td>
                    <td>8 tháng</td>
                    <td>Đỏ</td>
                    <td>10 kg</td>
                    <td>Hàn Quốc</td>
                    <td style="text-align: center">
                        <button class="btn btn-social-icon btn-warning margin" style="width: 22px; height: 22px;" ><i class="fas fa-info" style="font-size: 12px;margin-top: -6px"></i></button>
                        <button class="btn btn-social-icon btn btn-bitbucket" style="width: 22px; height: 22px;" ><i class="far fa-edit" style="font-size: 12px;margin-top: -6px"></i></button> &nbsp;
                        <button class="btn btn-social-icon btn-google" style="width: 22px; height: 22px;" ><i class="fas fa-trash-alt" style="font-size: 12px;margin-top: -6px"></i></button>
                    </td>

                </tr>

                <?php
                }
                ?>




                </tbody>

            </table>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Thêm giống thú cưng</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="container-fluid">
                                    <div class="form-group">
                                        <label for="loaithucung" class="col-sm-2 control-label">Tên</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="loaithucung" class="col-sm-2 control-label">Tuổi</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="loaithucung" class="col-sm-2 control-label">Màu</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="loaithucung" class="col-sm-2 control-label">Cân nặng</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="loaithucung" class="col-sm-2 control-label">Nguồn gốc</label>
                                        <div class="col-sm-10">
                                            <input type="text"  class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                        </div>
                                    </div>
                               <div class="form-group">
                                    <label for="loaithucung" class="col-sm-2 control-label">Hình ảnh</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="sp_hinhanhlienquan"   class="form-control" id="loaithucung" placeholder="Tên loại thú cưng">
                                    </div>
                                </div>


                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <script>
        $(document).ready(function() {
            $("#sp_hinh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false
            });
            $("#sp_hinhanhlienquan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                allowedFileExtensions: ["jpg", "gif", "png", "txt"]
            });
        });
    </script>
@endsection