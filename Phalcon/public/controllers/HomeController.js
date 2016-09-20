var app = angular.module('homeCtrl', []);


app.controller('HomeController', function($scope) {
    $scope.show= true;
    $.getScript('https://apis.google.com/js/platform.js', function()
    {
    });
    function onSignIn(googleUser) {
        var id_token = googleUser.getAuthResponse().id_token;
        $scope.token= id_token;
        var urlPath = window.location.pathname;
        $.ajax({
            type: "GET",
            url: urlPath+ 'api/user',
            data:{
                token:id_token
            },
            dataType: "json",
            success: function(resultData){
                if(resultData.Status=='Not Found')
                {
                    $scope.userId = resultData.UserId;
                    $scope.show=false;
                    $scope.$apply()
                    console.log($scope.show);
                }
            }
        });
    }
    window.onSignIn = onSignIn;
});