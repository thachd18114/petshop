b.controller('KhuyenMaiController', function($scope,$filter,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Khuyến mãi";

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_khuyenmai').then(function(response){
            $scope.memberList = response.data;
            angular.forEach($scope.memberList, function(value, key){
                 value.kh_ngayBatDau = new Date( value.kh_ngayBatDau);
                 value.kh_ngayBatDau = $filter('date')(value.kh_ngayBatDau, "dd/MM/yyyy");
                value.kh_ngayKetThuc = new Date( value.kh_ngayKetThuc);
                value.kh_ngayKetThuc = $filter('date')(value.kh_ngayKetThuc, "dd/MM/yyyy");
                if (value.km_trangThai ===1) {
                    value.km_trangThai = 'Kích hoạt';
                }
                else {
                    value.km_trangThai = 'Khóa';
                }
            });

            $scope.isLoading = false;
        });
    }
    $scope.refreshData();

    $scope.modal = function(state,id) {
        $scope.state = state;
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.KhuyenMai ={
                    km_ten : "",
                    km_trangThai: 1,
                    km_ngayBatDau: '',
                    km_ngayKetThuc: '',
                    km_giaTri : '',
                }
                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_khuyenmai/'+id).then(function(response){
                    $scope.KhuyenMai = response.data;
                    $scope.KhuyenMai['km_ngayBatDau'] = new Date( $scope.KhuyenMai['km_ngayBatDau']);
                    // $scope.ThuCung['tc_ngaySinh'] = $filter('date')($scope.ThuCung['tc_ngaySinh'], "dd/MM/yyyy");
                    $('#km_ngayBatDau').val($scope.KhuyenMai['km_ngayBatDau']);
                    $scope.KhuyenMai['km_ngayKetThuc'] = new Date( $scope.KhuyenMai['km_ngayKetThuc']);
                    // $scope.ThuCung['tc_ngaySinh'] = $filter('date')($scope.ThuCung['tc_ngaySinh'], "dd/MM/yyyy");
                    $('#km_ngayKetThuc').val($scope.KhuyenMai['km_ngayKetThuc']);

                });


        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){
        $scope.KhuyenMai['km_ngayBatDau'] = new Date( $scope.KhuyenMai['km_ngayBatDau']);
        $scope.KhuyenMai['km_ngayBatDau'] = $filter('date')($scope.KhuyenMai['km_ngayBatDau'], "yyyy/MM/dd");

        $scope.KhuyenMai['km_ngayKetThuc'] = new Date( $scope.KhuyenMai['km_ngayKetThuc']);
        $scope.KhuyenMai['km_ngayKetThuc'] = $filter('date')($scope.KhuyenMai['km_ngayKetThuc'], "yyyy/MM/dd");

        if($scope.KhuyenMai['km_ngayBatDau'] >   $scope.KhuyenMai['km_ngayKetThuc'] ) {
            $scope.loi = true;
        }
        else  {
            $scope.loi = false;
            switch(state){
                case 'create':
                    var url = MainURL + "createkhuyenmai";
                    var data = $.param($scope.KhuyenMai);
                    $http({
                        method : "POST",
                        url : url,
                        data : data,
                        headers : {'Content-type':'application/x-www-form-urlencoded'}
                    }).then(function(){
                        swal({ title : "",text :"Thêm thành công!",type: "success", },function(isConfirm){
                            $("#Modal").modal("hide");
                            $scope.refreshData();;
                        });
                    }).catch(function(){
                        swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                            $("#Modal").modal("hide");
                        });
                    });
                    break;
                case 'edit' :
                    var url = MainURL + 'update_khuyenmai/' + id;
                    var data = $.param($scope.KhuyenMai);
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
        } ;

    };

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
                    $http.get(MainURL+'delete_khuyenmai/'+id).then(function(){
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