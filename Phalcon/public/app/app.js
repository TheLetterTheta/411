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
        .when('/header',{
            templateUrl: 'public/views/layout/header.html',
            controller : 'headerController'
        })
        .otherwise({redirectTo: '/'});
});
app.controller("headerController",  ["$scope", "$mdSidenav", function($scope, $mdSidenav){
    $scope.header ={name: "header.html", url: "public/views/layout/header.html"};
    $scope.toggleRight =function() {
        $mdSidenav('left').toggle();
    };
}]);
