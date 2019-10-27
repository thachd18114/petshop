b.controller('ThuCungController', function ($scope,$filter,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.options = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    $scope.isLoaded = true;
    $scope.dataTitle = "Thú Cưng";

    $scope.giong = function(){
        $http.get(MainURL + 'list_giong').then(function(response){
            $scope.listgiong = response.data;
        });
    };

    $scope.nhacungcap = function(){
        $http.get(MainURL + 'list_nhacungcap').then(function(response){
            $scope.listnhacungcap = response.data;
        });
    };
    $scope.nguogoc = function(){
        $http.get(MainURL + 'list_nguongoc').then(function(response){
            $scope.listnguongoc = response.data;
        });
    };

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_thucung').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
            angular.forEach($scope.memberList, function(value, key){
                if (value.tc_trangThaiTiemChung === 1){
                    value.tc_trangThaiTiemChung = 'Đã tiêm chủng';
                }
                else{
                    value.tc_trangThaiTiemChung = 'Chưa tiêm chủng';
                }
                if (value.tc_trangThai === 1){
                    value.tc_trangThai = 'Chưa bán';
                }
                else {
                    value.tc_trangThai = 'Đã bán';
                }
                if (value.tc_gioiTinh === 1){
                    value.tc_gioiTinh = 'Đực';
                }
                else {
                    value.tc_gioiTinh = 'Cái';
                }
            });
        });
    };
    $scope.refreshData();
    $scope.modal = function (state, id) {
        $scope.giong();
        $scope.nguogoc();
        $scope.nhacungcap();
        $scope.state = state;
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.ThuCung ={
                    tc_ten : "",
                    tc_tuoi : "",
                    tc_canNang : "",
                    tc_moTa : "",
                    tc_mauSac : "",
                    ng_id: 0,
                    tc_gioiTinh : 1,
                    tc_trangThaiTiemChung : 1,
                    tc_giaBan : "",
                    tc_ngaySinh : "",
                    tc_trangThai : 1,
                    g_id : 0,
                    ncc_id : 0
                }
                $("#ha_ten").fileinput({
                    theme: 'fas',
                   // minFileCount: 1,
                    showUpload: false,
                    browseClass: "btn btn-primary",
                     fileType: "any",
                    autoOrientImage: false,
                    // previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                     overwriteInitial: false,
                    // allowedFileExtensions: ["jpg", "gif", "png", "txt"],
                });

                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_thucung/'+id).then(function(response){
                    $scope.ThuCung = response.data;
                    $scope.ThuCung['tc_ngaySinh'] = new Date( $scope.ThuCung['tc_ngaySinh']);
                    // $scope.ThuCung['tc_ngaySinh'] = $filter('date')($scope.ThuCung['tc_ngaySinh'], "dd/MM/yyyy");
                    $('#tc_ngaySinh').val($scope.ThuCung['tc_ngaySinh']);
                    // console.log($scope.ThuCung['tc_ngaySinh']);
                    $("#ha_ten").fileinput({
                        theme: 'fas',
                        showUpload: false,
                        browseClass: "btn btn-primary",
                        fileType: "any",
                        autoOrientImage: false,
                        initialPreviewAsData: true,
                    });
                });
        }
        $("#Modal").modal('show');
    }
    // $scope.hinhanh_thucung = function (id){
    //     $http.get(MainURL + 'hinhanh_thucung/'+id).then(function(response){
    //         $scope.ha = response.data;
    //     });    }

    $scope.save = function (state,id){
        $scope.FileDetails= function () {
            var  name= [];
            var fi = document.getElementById('ha_ten');
            if (fi.files.length > 0) {
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fname = fi.files.item(i).name;
                    name.push(fname)
                }
            }
            return name;
        }
        $scope.name = $scope.FileDetails();
        $scope.ThuCung['ha_ten']= $scope.name;
        // var ngaySinh = new Date($scope.ThuCung.tc_ngaySinh+ "T05:00:00.000Z");
        $scope.ThuCung['tc_ngaySinh'] = new Date( $scope.ThuCung['tc_ngaySinh']);
        $scope.ThuCung['tc_ngaySinh'] = $filter('date')($scope.ThuCung['tc_ngaySinh'], "yyyy/MM/dd");
        // console.log($scope.ThuCung['tc_ngaySinh']);
        $scope.tuoi = $scope.ThuCung['tc_tuoi'];

        switch(state){
            case 'create':
                if($("#ha_ten").val() != "") {
                    var url = MainURL + "createthucung";
                    var data = $.param($scope.ThuCung);
                    $http({
                        method: "POST",
                        url: url,
                        data: data,
                        headers: {'Content-type': 'application/x-www-form-urlencoded'}
                    }).then(function () {
                        // swal({title: "", text: "Thêm thành công!", type: "success",}, function (isConfirm) {
                        //     $("#ha_ten").fileinput('clear');
                        //     $("#Modal").modal("hide");
                        //     $scope.refreshData();
                        // });
                    }).catch(function () {
                        // swal({title: "", text: "Có lỗi xảy ra!", type: "error",}, function (isConfirm) {
                        //     $("#ha_ten").fileinput('clear');
                        //     $("#Modal").modal("hide");
                        // });
                    });
                }
                break;
            case 'edit' :
                var url = MainURL + 'update_thucung/' + id;
                var data = $.param($scope.ThuCung);
                $http({
                    method : "POST",
                    url : url,
                    data : data,
                    headers : {'Content-type':'application/x-www-form-urlencoded'}
                }).then(function(){
                    swal({ title : "",text :"Cập nhật thành công!",type: "success", },function(isConfirm){
                        $("#ha_ten").fileinput('clear');
                        $("#Modal").modal("hide");
                        $scope.refreshData();
                    });
                }).catch(function(){
                    swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                        $("#ha_ten").fileinput('clear');
                        $("#Modal").modal("hide");
                    });
                });

                break;
        }
    };
    $("#frmThuCung").on("submit", function(event){
        switch($scope.state){
            case "create":

                if($("#ha_ten").val() != ""){
                    $.ajax({
                        url: MainURL + 'createthucung/hinhanh',
                        method: "POST",
                        data:new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response)
                        {
                            console.log(response.message);
                            swal({ title : "",text :"Thêm thành công!",type: "success", },function(isConfirm){
                                $("#Modal").modal("hide");
                                $scope.refreshData();
                                $("#ha_ten").fileinput('clear');
                            });

                        },
                        error: function(response)
                        {
                            console.log(response)
                            swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                                $("#Modal").modal("hide");
                                // $("#ha_ten").fileinput('clear');
                            });
                        }
                    })
                }

                break;
            case "edit":
                console.log($scope.id);
                $.ajax({
                    url: MainURL + 'update_thucung/hinhanh/'+$scope.id,
                    method: "POST",
                    data:new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response)
                    {
                        if(response.message)
                            swal({ title : "",text :"Cập nhật thành công!",type: "success", },function(isConfirm){
                                $("#Modal").modal("hide");
                                $scope.refreshData();
                                console.log(response);
                                $("#ha_ten").fileinput('clear');
                            });
                    },
                    error: function(response)
                    {
                        swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                            $("Modal").modal("hide");
                            console.log(response);
                            $("#ha_ten").fileinput('clear');
                        });
                    }

                });
                break;
        }

    });

    $scope.delConfirm = function(id) {
        swal({
                title: "Bạn có muốn xóa ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Chấp nhận",
                cancelButtonText: "Không",
                closeOnConfirm: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $http.get(MainURL+'delete_thucung/'+id).then(function(){
                        swal("", "Xóa thành công!", "success")
                        $scope.refreshData();
                    }).catch(function(){
                        swal("",'Có lỗi xảy ra!', "error");
                        $scope.refreshData();
                    });

                }
            });
    };
});