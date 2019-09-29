app.controller('DonHangController', function($scope, $http,MainURL, ngCart) {
    $scope.ngCart = ngCart;
    // $scope.submitOrderForm = function() {
    //    // debugger;
    //         var dataInputOrderForm_DatHang = {
    //
    //             "dh_nguoiNhan": $scope.orderForm.dh_nguoiNhan.$viewValue,
    //             "dh_diaChi": $scope.orderForm.dh_diaChi.$viewValue,
    //             "dh_dienThoai": $scope.orderForm.dh_dienThoai.$viewValue,
    //             "httt_id": $scope.orderForm.httt_id.$viewValue,
    //         };
    //
    //          var dataCart = ngCart.getCart();
    //
    //         var dataInputOrderForm = {
    //             "donhang": dataInputOrderForm_DatHang,
    //             "giohang": dataCart,
    //             // "_token": "{{ csrf_token() }}",
    //         };
    //
    //         $http({
    //             url: MainURL + 'dat-hang',
    //             method: "POST",
    //             data: JSON.stringify(dataInputOrderForm)
    //         }).then(function successCallback(response) {
    //             $scope.ngCart.empty();
    //             swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');
    //             // if (response.data.redirectUrl) {
    //             //     location.href = response.data.redirectUrl;
    //             // }
    //         }, function errorCallback(response) {
    //             swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
    //             console.log(response);
    //         });
    //     }
});