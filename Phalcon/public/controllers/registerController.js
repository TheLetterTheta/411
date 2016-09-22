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

        var curricula = [
            {
                id: 1,
                name: "Art"
            },
            {
                id:2,
                name: "Math"
            },
            {
                id: 3,
                name: "Computer Science"
            },
            {
                id: 4,
                name: "Music"
            },
            {
                id: 5,
                name: "English"
            },
            {
                id: 6,
                name: "Biology"
            },
            {
                id: 7,
                name: "Physics"
            },
            {
                id: 8,
                name: "Communications"
            },
            {
                id: 9,
                name: "History"
            }];

        $scope.selectedMajors = [];

        $scope.selectedMajorChange = function(newMajor){
            if(newMajor && ! $scope.selectedMajors.includes(newMajor)){
                $scope.selectedMajors.push(newMajor);
            }
            $scope.curriculumSearchText = "";
        };

        $scope.searchCurricula = function(text){
            return curricula.filter(function(curriculum){
                return curriculum.name.toUpperCase().includes(text.toUpperCase()) && ! $scope.selectedMajors.includes(curriculum);
            });
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
        };

        $scope.colleges = [
            {
                id: 1,
                name: "Southeastern Louisiana University",
                image: "https://upload.wikimedia.org/wikipedia/en/b/b6/SELouisianaLions.png"
            },
            {
                id: 2,
                name: "Louisiana State University",
                image: "http://www.fbschedules.com/images/logos/fbs/lsu-tigers.png"
            },
            {
                id: 3,
                name: "Nicholls State University",
                image: "https://pbs.twimg.com/profile_images/461145907077984256/-UXKkXWw_400x400.png"
            },
            {
                id: 4,
                name: "Harvard University",
                image: "http://www.harvard.edu/sites/default/files/user13/harvard_shield_wreath.png"
            },
            {
                id: 5,
                name: "Monster's U",
                image: "http://www.brandsoftheworld.com/sites/default/files/styles/logo-thumbnail/public/112013/monsters-university.png?itok=YvCZxvEj"
            },
            {
                id: 6,
                name: "Baton Rouge Community College",
                image: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/BRCC_2C_logo_TM.jpg/220px-BRCC_2C_logo_TM.jpg"
            },
            {
                id: 7,
                name: "ITT Technical Institute (RIP)",
                image: "http://7cef2ec547d6d5c438f1-07463a70f78b0e214543e67a622e9841.r9.cf5.rackcdn.com/wp-content/uploads/2016/09/ITT-TECH.jpg"
            },
            {
                id: 8,
                name: "Sam Houston Institute of Technology",
                image: "https://img.buzzfeed.com/buzzfeed-static/static/2015-03/12/12/campaign_images/webdr13/this-revelation-about-the-poop-emoji-will-disturb-2-513-1426176724-12_big.jpg"
            }
        ];

        $scope.searchColleges = function(text){
            return $scope.colleges.filter(function (college){
                return college.name.toUpperCase().includes(text.toUpperCase());
            });
        };
    }
    ]);
})();