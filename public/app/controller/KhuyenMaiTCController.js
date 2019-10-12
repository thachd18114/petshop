b.controller('KhuyenMaiTCController', function($scope,$filter,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Danh sách thú cưng khuyến mãi";

    $scope.refreshData = function(){
        $http.get(MainURL + 'list_thucung_khuyenmai/'+$('#km_id').val()).then(function(response){
            $scope.memberList = response.data;
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
    }
    $scope.refreshData();
    $scope.list_tc = function(){
        $http.get(MainURL + 'list_thucung').then(function(response){
            $scope.listtc = response.data;
            angular.forEach($scope.listtc, function(value, key){
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

    $scope.modal = function() {
        $scope.list_tc();

                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";

        $("#Modal").modal('show');
    }



    $scope.delConfirm = function(km,tc) {
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
                    $http.get(MainURL+'delete_chitietkm/'+ km +'/'+tc).then(function(){
                        swal("", "Xóa thành công!", "success")
                        $scope.refreshData();
                    }).catch(function(){
                        swal("",'Có lỗi xảy ra!', "error");
                        $scope.refreshData();
                    });

                }
            });
    };

    $scope.check = function(){
        $scope.ck = [];
        k = 0
        for(j=0;j<$scope.memberList.length;j++){

            if($('#ck_'+$scope.memberList[j].tc_id).is(':checked') == true){
                $scope.ck[k] = $scope.memberList[j].tc_id;
                k ++;
            }
        }
      //  console.log($scope.ck);
    }
    $scope.deletelist = function(){
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
                    $scope.check();
                   var url = MainURL + 'delete_listchitietkm/'+$('#km_id').val();
                    var data = {};
                     data = $.param({'items': $scope.ck});
                    console.log($scope.ck);
                    $http({
                        method : "POST",
                        url : url,
                        data : data,
                        headers : {'Content-type':'application/x-www-form-urlencoded'}
                    }).then(function(response){
                        swal({ title : "",text :"Xóa thành công!",type: "success", },function(isConfirm){
                           
                            $scope.refreshData();
                            console.log(response.data);
                        });
                    }).catch(function(response){
                        swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
                          
                            console.log(response.data);
                        });
                    });
                }
            });
    }


    $scope.check1 = function(){
        $scope.ck1 = [];
        k = 0
        for(j=0;j<$scope.listtc.length;j++){

            if($('#ck1_'+$scope.listtc[j].tc_id).is(':checked') == true){
                $scope.ck1[k] = $scope.listtc[j].tc_id;
                k ++;
            }
        }
        //  console.log($scope.ck);
    }
    $scope.save = function() {
        $scope.check1();
        if ($scope.ck1.length > 0) {
            var url = MainURL + 'create_chitietkm/' + $('#km_id').val();
            var data = {};
            data = $.param({'items': $scope.ck1});
            console.log($scope.ck1);
            $http({
                method: "POST",
                url: url,
                data: data,
                headers: {'Content-type': 'application/x-www-form-urlencoded'}
            }).then(function (response) {
                swal({title: "", text: "Thêm thành công!", type: "success",}, function (isConfirm) {
                    $("#Modal").modal("hide");
                    $scope.refreshData();
                    console.log(response.data);
                });
            }).catch(function (response) {
                swal({title: "", text: "Có lỗi xảy ra!", type: "error",}, function (isConfirm) {
                    $("#Modal").modal("hide");
                    console.log(response.data);
                });
            });
        }
    }
});