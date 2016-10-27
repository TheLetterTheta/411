(function(){
    "use strict";

    angular.module('app')
        .controller('headerController', headerController)

    headerController.$inject = ['$scope', '$mdSidenav', '$rootScope'];

    function headerController($scope, $mdSidenav, $rootScope){
        $scope.header = {
            name: 'header.html',
            url: 'app/views/header.html'
        };

        $scope.navigations = [{
            title: "Profile",
            nav: "/profile"
        },{
            title: "Planner",
            nav: "/planner"
        },{
            title: "Class History",
            nav: "/history"
        }];

        $scope.changeNavigation = function(newNav){
            $rootScope.updateHeader(newNav);
        }

        $scope.toggleRight = function(){
            $mdSidenav('left').toggle();
        };

        $scope.toPlanner = function(){
            $rootScope.updateHeader('/planner');
        };
    }
})();