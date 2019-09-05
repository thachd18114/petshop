b.controller('ThuCungController', function ($scope,$http,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "Thú Cưng";

    $scope.refreshData = function(){
        $scope.isLoading = true;
        $http.get(MainURL + 'list_thucung').then(function(response){
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
                $scope.ThuCung ={
                    tc_ten : "",
                    tc_tuoi : "",
                    tc_gioiTinh : "",
                    tc_canNang : "",
                    tc_moTa : "",
                    tc_mauSac : "",
                    tc_giaBan : "",
                    tc_trangThaiTiemChung : "",
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
});