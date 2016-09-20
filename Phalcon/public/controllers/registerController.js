(function(){
    "use strict";
    var app = angular.module("registerCtrl", [])

    app.controller("registerController", ["$scope", function($scope) {
        $scope.actTestMethod = {
            name : "ACT",
            testMath : null,
            testEnglish : null,
            testReading : null,
            testScience : null
        };
        $scope.satTestMethod = {
            name : "SAT",
            testMath : null,
            testEnglish : null
        };

        $scope.testMethod = $scope.actTestMethod;

        $scope.computeAverage = function(test){
            var math = angular.isNumber(test.testMath)? test.testMath: 0;
            var english = angular.isNumber(test.testEnglish)? test.testEnglish : 0;
            if(test.name === "ACT"){
                var reading = angular.isNumber(test.testReading)? test.testReading : 0;
                var science = angular.isNumber(test.testScience)? test.testScience : 0;
                return (math + english + science + reading) / 4;
            }else if(test.name === "SAT"){
                return (math + english) / 2;
            }else{
                return null;
            }
        }

        $scope.selectedCollege = {};

        $scope.colleges = [
            {
                id: 1,
                name: "Southeastern Louisiana University"
            },
            {
                id: 2,
                name: "Louisiana State University"
            },
            {
                id: 3,
                name: "Nichols State University"
            },
            {
                id: 4,
                name: "Harvard University"
            },
            {
                id: 5,
                name: "Monster's U"
            },
            {
                id: 6,
                name: "Baton Rouge Community College"
            },
            {
                id: 7,
                name: "ITT Technical Institute (RIP)"
            },
            {
                id: 8,
                name: "Sam Houston Institute of Technology"
            }
        ];

        $scope.searchColleges = function(text){
            console.log(text);
            return $scope.colleges.filter(function (college){
                var ret = college.name.includes(text)
                console.log(ret);
               return ret;;
            });
        };
    }
    ]);
})();