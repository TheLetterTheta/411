(function(){
    "use strict";

    var app = angular.module("app", ["ngMaterial", "ngRoute"]);

    app.config(["$mdThemingProvider", "$routeProvider", function($mdThemingProvider, $routeProvider){

        $mdThemingProvider.theme('altTheme')
            .primaryPalette('green')
            .accentPalette('yellow');
        $mdThemingProvider.setDefaultTheme('altTheme');
        $mdThemingProvider.alwaysWatchTheme(true);
        $mdThemingProvider.theme('grey').backgroundPalette('blue-grey');
        $mdThemingProvider.theme('black').backgroundPalette('grey');

        $routeProvider
           .when("/home",{
               templateUrl: "app/views/login.html",
               controller: "loginController",
               controllerAs: "loginCtrl"
           })
            .when('/profile',{
                templateUrl: 'app/views/profile.html',
                controller: 'profileController',
                controllerAs: 'profileCtrl'
            })
            .when('/planner',{
                templateUrl: 'app/views/planner.html',
                controller: 'plannerController',
                controllerAs: 'plannerCtrl'
            })
            .when('/history',{
                templateUrl: 'app/views/history.html',
                controller: 'historyController',
                controllerAs: 'historyCtrl'
            })
           .otherwise('/home');
    }])
    .run(['$rootScope', '$location', function($rootScope, $location){
        $rootScope.displayHeader = $location.path() === '/' || $location.path() === '/home';

        $rootScope.$on('$locationChangeSuccess', function() {
            $rootScope.displayHeader = $location.path() === '/' || $location.path() === '/home';
        });

        $rootScope.updateHeader = function(path){
            $location.path(path);
        };
    }]);
})();