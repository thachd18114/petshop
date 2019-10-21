b.controller('DonHangController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Đơn hàng";

    $scope.hinhthucthanhtoan = function(){
        $http.get(MainURL + 'list_hinhthucthanhtoan').then(function(response){
            $scope.listhttt = response.data;
        });
    };

    $scope.khachhang = function(){
        $http.get(MainURL + 'list_khachhang').then(function(response){
            $scope.listkhachhang = response.data;
        });
    };

    $scope.ttdh = function(){
        $http.get(MainURL + 'list_ttdonhang').then(function(response){
            $scope.listttdh = response.data;
        });
    };

    $scope.ctdonhang = function(id){
        $http.get(MainURL + 'edit_donhang/'+id).then(function(response){
            $scope.donhang = response.data;
        });
    };
    $scope.ctkhachhang = function(id){
        $http.get(MainURL + 'edit_khachhang/'+id).then(function(response){
            $scope.khachhang1 = response.data;
        });
    };

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_donhang').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
        });
    };
    $scope.refreshData();

    $scope.detail = function(id, kh){

        $scope.ctdonhang(id);
        $scope.ctkhachhang(kh);
        $scope.modalTitle = "Chi tiết đơn hàng ";
        $http.get(MainURL + 'chitietdonhang/'+id).then(function(response){
            $scope.chitiet = response.data;
            $scope.isLoading = false;
        });
        $("#Modal1").modal('show');
    }


    $scope.modal = function (state, id) {
        $scope.hinhthucthanhtoan();
        $scope.khachhang();
        $scope.state = state;
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.DonHang ={
                    dh_diaChi :"",
                    dh_dienThoai : "",
                    dh_nguoiNhan : "",
                    httt_id : 0,
                    kh_id : 0,
                };
                break;
            case 'edit':
                $scope.ttdh();
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_donhang/'+id).then(function(response){
                    $scope.DonHang = response.data;
                });
        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){
        switch(state){
            case 'create':
                var url = MainURL + "createdonhang";
                var data = $.param($scope.DonHang);
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
                var url = MainURL + 'update_donhang/' + id;
                var data = $.param($scope.DonHang);
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
                    $http.get(MainURL+'delete_donhang/'+id).then(function(){
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