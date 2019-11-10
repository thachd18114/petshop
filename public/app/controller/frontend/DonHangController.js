app.controller ('DonHangController', ['$scope', '$http', 'ngCart','MainURL',  function($scope, $http, ngCart,MainURL) {
    ngCart.setShipping(0);
    angular.forEach(ngCart.getCart().items, function (value, key) {
        $http.get(MainURL + 'admin/detail_thucung/' + value.getId()).then(function (response) {
            $scope.thucung = response.data;
            if($scope.thucung.length >0 || $scope.thucung.tc_trangThai === 1){
                $scope.gia = $scope.thucung.tc_giaBan*(100 - $scope.thucung.giatri)/100;
                // console.log($scope.gia);
                if ($scope.thucung.km_giaTri == null){
                    value.setPrice($scope.gia);
                    value.setName($scope.thucung.tc_ten);
                } else {
                    value.setPrice($scope.thucung.tc_giaBan);
                    value.setName($scope.thucung.tc_ten);
                }

                // value.setData($scope.thucung.tc_giaBan);
            }else {
                ngCart.removeItemById(value.getId());
            }
        });
    });
    $scope.loi = false;
    $scope.modal = function() {
        if($('#httt_id').val() == '2') {
            // debugger;
            $scope.ngCart = ngCart;
            var dataInputOrderForm_DatHang = {

                "dh_nguoiNhan": $scope.orderForm.dh_nguoiNhan.$viewValue,
                "dh_diaChi": $scope.orderForm.dh_diaChi.$viewValue,
                "dh_dienThoai": $scope.orderForm.dh_dienThoai.$viewValue,
                "httt_id": $scope.orderForm.httt_id.$viewValue,
                "dh_tongGia" : ngCart.totalCost(),
            };

            var dataCart = ngCart.getCart();

            var dataInputOrderForm = {
                "donhang": dataInputOrderForm_DatHang,
                "giohang": dataCart,
                // "_token": "{{ csrf_token() }}",
            };

            $http({
                url: MainURL + 'dat-hang',
                method: "POST",
                data: JSON.stringify(dataInputOrderForm)
            }).then(function successCallback(response) {
                $scope.ngCart.empty();
                swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');
                // if (response.data.redirectUrl) {
                //     location.href = response.data.redirectUrl;
                // }
                // window.location="http://localhost/petshop/public/thu-cung";
            }, function errorCallback(response) {
                swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                // window.location.reload();
                console.log(response);
            });
        }
        else   if($('#httt_id').val() == '1') {
            $("#myModal").modal('show');

        }else {
            $scope.loi = true;
        }

    };

    $scope.laytigia = function(){
        $http.get(MainURL + 'laytigia').then(function(response){
            $scope.tigia = response.data;
             $scope.gia = $scope.tigia[0];
            console.log($scope.gia);
    var tien = ngCart.totalCost();
    var tienusd = Math.round(tien/ $scope.gia *100)/100;

    var dataCart = ngCart.getCart().items;
    var diachi = $('#dh_diaChi').val();
    var nguoinhan = $('#dh_nguoiNhan').val();
    var dienthoai = $('#dh_dienThoai').val();
    var item = [];
    angular.forEach(dataCart, function(value){
        var newArr = {'name' : value.getName(), 'price' : value.getPrice(),'quality' : value.getQuantity(), 'tax' : 0}
        item.push(newArr);
    });
    paypal.Button.render({
        env: 'sandbox',
        style: {
            color:  'gold',
            shape:  'pill',
            label:  'pay',
            height: 40
        },
        funding: {
            allowed: [
                paypal.FUNDING.CARD,
                paypal.FUNDING.CREDIT
            ],
            disallowed: []
        },

        client: {
            sandbox: 'Ab8TrmGWdj0gBEMT-ScrcED4uZFwv9pbesmu2lex5ey3isdJzOFIrqwuxJh99yLB2EivWaa1y0lMzC6Y',
            production: ''
        },


        // Set up a payment
        payment: function(data, actions) {

            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: tienusd,
                        currency: 'USD',
                        details: {
                            subtotal: tienusd,
                        }
                    },
                    description: 'The payment transaction description.',
                    custom: '90048630024435',
                    payment_options: {
                        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                    },
                    //soft_descriptor: 'ECHI5786786',
                    item_list: {
                        items: [
                            {
                                name: 'Thanh toán Paypal từ PETSHOP',
                                quantity: '1',
                                price: tienusd,
                                currency: 'USD'
                            },
                        ],

                    }
                }],
                note_to_payer: 'Contact us for any questions on your order.'
            });
        },




        onAuthorize: function (data, actions) {
            return actions.payment.execute()
                .then(function () {
                    $scope.ngCart = ngCart;
                    var dataInputOrderForm_DatHang = {
                        "dh_tongGia" : ngCart.totalCost(),
                        "dh_nguoiNhan": $scope.orderForm.dh_nguoiNhan.$viewValue,
                        "dh_diaChi": $scope.orderForm.dh_diaChi.$viewValue,
                        "dh_dienThoai": $scope.orderForm.dh_dienThoai.$viewValue,
                        "httt_id": $scope.orderForm.httt_id.$viewValue,
                    };

                    var dataCart = ngCart.getCart();

                    var dataInputOrderForm = {
                        "donhang": dataInputOrderForm_DatHang,
                        "giohang": dataCart,
                         // "_token": "{{ csrf_token() }}",
                    };

                    $http({
                        url: MainURL + 'dat-hang',
                        method: "POST",
                        data: JSON.stringify(dataInputOrderForm)
                    }).then(function successCallback(response) {
                        $scope.ngCart.empty();
                        swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');
                        // if (response.data.redirectUrl) {
                        //     location.href = response.data.redirectUrl;
                        // }
                        // window.location="http://localhost/petshop/public/thu-cung";
                    }, function errorCallback(response) {
                        swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                        // window.location.reload();
                        console.log(response);
                    });
                });
        }
    }, '#paypal-button');
        });
    };
    $scope.laytigia();
}]);
