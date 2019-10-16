var b = angular.module('backend', ['datatables','ckeditor','file-model'], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('MainURL', 'http://petshopct.herokuapp.com/public/admin/');
var app = angular.module('petApp', ['ngCart'],
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).constant('MainURL', 'http://petshopct.herokuapp.com/public/');