b.controller('ThuCungController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
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
    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_thucung').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
        });
    };
    $scope.refreshData();

    $scope.modal = function (state, id) {
        $scope.giong();
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
                    tc_giaBan : "",
                    tc_trangThai : "",
                    g_id : 0,
                }
                $("#ha_ten").fileinput({
                    theme: 'fas',
                    showUpload: false,
                    browseClass: "btn btn-primary",
                    fileType: "any",
                    autoOrientImage: false,
                    // previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                    // overwriteInitial: false,
                    // allowedFileExtensions: ["jpg", "gif", "png", "txt"],
                });

                break;
            case 'edit':
                $scope.id = id;
                $("#ha_ten").fileinput({
                    theme: 'fas',
                    showUpload: false,
                    browseClass: "btn btn-primary",
                    fileType: "any",
                    autoOrientImage: false,
                    // previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                    // overwriteInitial: false,
                    // allowedFileExtensions: ["jpg", "gif", "png", "txt"],
                });
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_thucung/'+id).then(function(response){
                    $scope.ThuCung = response.data;
                });
        }
        $("#Modal").modal('show');
    }

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
        console.log($scope.ThuCung);

        switch(state){
            case 'create':
                var url = MainURL + "createthucung";
                var data = $.param($scope.ThuCung);
                $http({
                    method : "POST",
                    url : url,
                    data : data,
                    headers : {'Content-type':'application/x-www-form-urlencoded'}
                }).then(function(){
                    swal({ title : "",text :"Thêm thành công!",type: "success", },function(isConfirm){
                        $("#Modal").modal("hide");
                        $scope.refreshData();
                    });
                }).catch(function(){
                    swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                        $("#Modal").modal("hide");
                    });
                });
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
                        $("#Modal").modal("hide");
                        $scope.refreshData();
                    });
                }).catch(function(){
                    swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                        $("#Modal").modal("hide");
                    });
                });

                break;
        }
    };
    $("#frmThuCung").on("submit", function(event){
        event.preventDefault();
        switch($scope.state){
            case "create":
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
                            $("#ha_ten").fileinput('clear');
                        });
                    }
                })
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