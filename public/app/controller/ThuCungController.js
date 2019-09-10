b.controller('ThuCungController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
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
        $scope.array_gt = [{
            name: 'Đực',
            value: 1,
        }, {
            name: 'Cái',
            value: 2,
            checked: false,
        }];
        $scope.array_tt = [{
            name: 'Đã tiêm chủng',
            value: 1,
            checked: true,
        }, {
            name: 'Đã tiêm chủng',
            value: 2,
        }];
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
                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_thucung/'+id).then(function(response){
                    $scope.Giong = response.data;
                });
        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){

        console.log($scope.ThuCung);
        // switch(state){
        //     case 'create':
        //         var url = MainURL + "createthucung";
        //         var data = $.param($scope.ThuCung);
        //         $http({
        //             method : "POST",
        //             url : url,
        //             data : data,
        //             headers : {'Content-type':'application/x-www-form-urlencoded'}
        //         }).then(function(){
        //             swal({ title : "",text :"Thêm thành công!",type: "success", },function(isConfirm){
        //                 $("#Modal").modal("hide");
        //                 $scope.refreshData();;
        //             });
        //         }).catch(function(){
        //             swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
        //                 $("#Modal").modal("hide");
        //             });
        //         });
        //         break;
        //     case 'edit' :
        //         var url = MainURL + 'update_thucung/' + id;
        //         var data = $.param($scope.ThuCung);
        //         $http({
        //             method : "POST",
        //             url : url,
        //             data : data,
        //             headers : {'Content-type':'application/x-www-form-urlencoded'}
        //         }).then(function(){
        //             swal({ title : "",text :"Cập nhật thành công!",type: "success", },function(isConfirm){
        //                 $("#Modal").modal("hide");
        //                 $scope.refreshData();;
        //             });
        //         }).catch(function(){
        //             swal({ title : "",text :"Có lỗi xảy ra!",type: "error", },function(isConfirm){
        //                 $("#Modal").modal("hide");
        //             });
        //         });
        //         break;
        // }
    }
});