var app = angular.module('app', ['ngRoute','ngMaterial','homeCtrl','registerCtrl','plannerCtrl']);

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
        .when('/planner',{
            templateUrl : 'public/views/planner/planner.html',
            controller : 'plannerController'
        })
        .otherwise({redirectTo: '/'});
});
