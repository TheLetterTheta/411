var app = angular.module('app', ['ngRoute','ngMaterial','homeCtrl','registerCtrl']);

app.config(function($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl : 'public/views/home/home.html',
            controller  : 'homeController'
        })
        .when('/register',{
            templateUrl : 'public/views/home/register.html',
            controller : 'registerController'
        })
        .otherwise({redirectTo: '/'});
});
