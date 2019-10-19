b.controller('FaqController', function ($scope,$http,$filter,MainURL,DTOptionsBuilder, DTColumnBuilder) {
    $scope.isLoaded = true;
    $scope.dataTitle = "FAQ";

    $scope.refreshData = function () {
        $scope.isLoading = true;
        $http.get(MainURL + 'list_faq').then(function (response) {
            $scope.memberList = response.data;
        });
    };
    $scope.refreshData();
    $scope.faq_info = function () {
        $scope.Faq ={
            ph_noiDung : "",
        }
        $http.get(MainURL + 'faq_info/'+$('#kh_id').val()).then(function (response) {
            $scope.info = response.data;
            console.log($scope.info);
            // $scope.info.count()
        });
        // document.getElementById('faq_4').scrollIntoView();
        // document.getElementById('faq_4').scrollIntoView();


    };
    $scope.faq_info();
    $scope.crete_ph = function (){
                var url = MainURL + "create_ph";
                var data = $.param($scope.Faq);
                $http({
                    method : "POST",
                    url : url,
                    data : data,
                    headers : {'Content-type':'application/x-www-form-urlencoded'}
                }).then(function(){
                        $scope.faq_info();

                }).catch(function(){

                });
        }
});