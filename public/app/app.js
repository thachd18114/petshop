var b = angular.module('backend', ['datatables'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('MainURL', 'http://localhost/petshop/public/admin/');