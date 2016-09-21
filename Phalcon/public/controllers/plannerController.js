(function(){
    "use strict";
    var app = angular.module("plannerCtrl", [])

    app.controller("plannerController", ["$scope","$mdSidenav", function($scope, $mdSidenav)
        {
            $scope.toggleRight =function() {
                $mdSidenav('left').toggle();
            };
            var plannedSemsters=[]
            
        }
        
    ]);
})();