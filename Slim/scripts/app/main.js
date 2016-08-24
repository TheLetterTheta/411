angular.module('MainApp', [])
    .controller('UserCtrl', function($scope, $http) {
        $scope.users=[];
        $scope.listUsers = function(){

            $http.get('/411/public/api/user').success(function(data) {
                $scope.users = data;
            });

        }

    });
