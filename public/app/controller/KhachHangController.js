b.controller('KhachHangController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Khách hàng";

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_khachhang').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
        });
    };
    $scope.refreshData();
    $scope.modal = function (state, id) {
        $scope.state = state;
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.KhachHang ={
                    kh_hoTen :"",
                    kh_gioiTinh : 1,
                    kh_taiKhoan : "",
                    kh_matKhau : "",
                    kh_diaChi : "",
                    kh_dienThoai : "",
                    kh_email : "",
                    kh_ngaySinh : "",
                };
                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_khachhang/'+id).then(function(response){
                    $scope.KhachHang = response.data;
                    $scope.KhachHang['kh_matKhau'] = "";
                });
        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){
        switch(state){
            case 'create':
                var url = MainURL + "createkhachhang";
                var data = $.param($scope.KhachHang);
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
                var url = MainURL + 'update_khachhang/' + id;
                var data = $.param($scope.KhachHang);
                $http({
                    method : "POST",
                    url : url,
                    data : data,
                    headers : {'Content-type':'application/x-www-form-urlencoded'}
                }).then(function(){
                    swal({ title : "",text :"Cập nhật thành công!",type: "success", },function(isConfirm){
                        $("#Modal").modal("hide");
                        $scope.refreshData();;
                    });
                }).catch(function(){
                    swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                        $("#Modal").modal("hide");
                    });
                });
                break;
        }
    }

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
                    $http.get(MainURL+'delete_khachhang/'+id).then(function(response){
                        if(!response.data['error']) {
                            swal("", "Xóa thành công!", "success")
                            $scope.refreshData();
                        }
                        else {
                            swal("",response.data['error'], "error");
                            $scope.refreshData();
                        }
                    })
                }
            });
    };
});