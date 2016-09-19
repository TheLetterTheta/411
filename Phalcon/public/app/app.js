var app = angular.module('app', ['ngRoute','ngMaterial','homeCtrl']);

app.config(function($routeProvider) {
    $routeProvider

        .when('/', {
            templateUrl : 'public/views/home/home.html',
            controller  : 'HomeController'
        })

        .otherwise({redirectTo: '/'});
});
