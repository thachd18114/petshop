b.controller('NhanVienController', function ($scope,$http,$filter,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Nhân Viên";

    $scope.quyen = function(){
        $http.get(MainURL + 'list_quyen').then(function(response){
            $scope.listquyen = response.data;
        });
    };

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_nhanvien').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
            angular.forEach($scope.memberList, function(value, key){

                if (value.nv_gioiTinh === 1){
                    value.nv_gioiTinh = 'Nam';
                }
                else {
                    value.nv_gioiTinh = 'Nữ';
                }
            });
        });
    };
    $scope.refreshData();
    $scope.modal = function (state, id) {
        $scope.state = state;
        $scope.quyen();
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.NhanVien ={
                    nv_gioiTinh : 1,
                    nv_hoTen :"",
                    nv_taiKhoan : "",
                    nv_matKhau : "",
                    nv_diaChi : "",
                    nv_dienThoai : "",
                    nv_email : "",
                    nv_ngaySinh : "",
                    q_id : 0,
                };
                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_nhanvien/'+id).then(function(response){
                    $scope.NhanVien = response.data;
                    $scope.NhanVien['kh_matKhau'] = "";
                });
        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){
        $scope.NhanVien['nv_ngaySinh'] = new Date( $scope.NhanVien['nv_ngaySinh']);
         $scope.NhanVien['nv_ngaySinh'] = $filter('date')($scope.NhanVien['nv_ngaySinh'], "yyyy/MM/dd");
        console.log($scope.NhanVien);
        switch(state){
            case 'create':
                var url = MainURL + "createnhanvien";
                var data = $.param($scope.NhanVien);
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
                var url = MainURL + 'update_nhanvien/' + id;
                var data = $.param($scope.NhanVien);
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
                    $http.get(MainURL+'delete_nhanvien/'+id).then(function(response){
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