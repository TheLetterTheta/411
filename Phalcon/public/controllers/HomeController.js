(function() {
    "use strict";
    var app = angular.module('homeCtrl', []);

    var homeCtrl = app.controller('homeController', ["$scope", "$http", "$window", function ($scope, $http, $window) {
        $.getScript('https://apis.google.com/js/platform.js', function () {
        });
        function onSignIn(googleUser) {
            var id_token = googleUser.getAuthResponse().id_token;
            $scope.token = id_token;
            var urlPath = window.location.pathname;

            $http({
                method: "GET",
                url: urlPath + 'api/user',
                params: {
                    token: id_token
                }
            }).then(function success(data) {
                console.log("Successful Login!");
                console.log(data);
            }, function error(err) {
                console.log(err);
                if (err.status === 404) {
                    $window.location.href = '#/register'
                } else if (err.status === 403) {
                    $window.location.href = '#/'
                } else {
                    console.error(err);
                }
            });
        }

        window.onSignIn = onSignIn;
    }]);
})();