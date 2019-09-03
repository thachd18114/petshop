b.controller('GiongController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Giống";

    $scope.loaithucung = function(){
        $http.get(MainURL + 'list_loaithucung').then(function(response){
            $scope.listloaithucung = response.data;
        });
    };
    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_giong').then(function(response){
            $scope.memberList = response.data;
            $scope.isLoading = false;
        });
    };
    $scope.refreshData();
    $scope.modal = function (state, id) {
        $scope.loaithucung();
        $scope.state = state;
        switch(state){
            case 'create':
                $scope.modalTitle = "Thêm " + $scope.dataTitle;
                $scope.modalButton = "Thêm";
                $scope.Giong ={
                    g_ten : "",
                    ltc_id : 0,
                }
                break;
            case 'edit':
                $scope.id = id;
                $scope.modalTitle = "Cập nhật " + $scope.dataTitle;
                $scope.modalButton = "Cập nhật";
                $http.get(MainURL + 'edit_giong/'+id).then(function(response){
                    $scope.Giong = response.data;
                });
        }
        $("#Modal").modal('show');
    }

    $scope.save = function (state,id){
        switch(state){
            case 'create':
                var url = MainURL + "creategiong";
                var data = $.param($scope.Giong);
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
                var url = MainURL + 'update_giong/' + id;
                var data = $.param($scope.Giong);
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
                    $http.get(MainURL+'delete_giong/'+id).then(function(){
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