var b = angular.module('backend', ['datatables','ckeditor','file-model'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('MainURL', 'http://localhost/petshop/public/admin/');