(function(){
    "use strict";

    angular.module("app")
        .controller('loginController', loginController)

    loginController.$inject = ["$scope", "$rootScope"];

    function loginController($scope, $rootScope){
        $scope.user = {
            WNumber : "",
            Password : ""
        }

        $scope.login = function(wNumber, password){
            //Try login!
            
            $rootScope.updateHeader('/profile');
        }
    }
})();