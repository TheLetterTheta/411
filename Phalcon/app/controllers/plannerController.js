(function(){
    "use strict"

    angular.module('app')
        .controller('plannerController', plannerController);

    plannerController.$inject = ["$scope", "$rootScope"]

    function plannerController($scope, $rootScope){
        $scope.semesters = [
            {
                id: 1,
                name: "Fall",
                year: 2016,
                classes:[
                    {id: 1, name: "CMPS 161", fullName:"Algorithm Design I",  hours: 3, averageRating: 0, totalRatings: 42},
                    {id: 2, name: "BIOL 152", fullName:"Biology Lab I", hours: 1, averageRating: 0.5, totalRatings: 32},
                    {id: 3, name: "ENGL 121H", fullName:"Honorary Freshman Composition", hours: 3, averageRating: 3.4, totalRatings: 22},
                    {id: 4, name: "MATH 200", fullName:"Calculus I", hours: 5, averageRating: 5.0, totalRatings: 12},
                    {id: 5, name: "GBIO 151", hours: 3, fullName:"General Biology I", averageRating: 4.5, totalRatings: 2},
                    {id: 6, name: "MUSA 137", hours: 1, fullName:"Applied Woodwind Lessons", averageRating: 3.5, totalRatings: 72},
                    {id: 7, name: "MUS 151", hours: 1,  fullName:"Symphonic Band",          averageRating: 2.5, totalRatings: 82},
                    {id: 8, name: "MUS 121", hours: 1,  fullName:"Wind Symphony",           averageRating: 1.5, totalRatings: 92}
                ]
            },
            {
                id: 2,
                name: "Spring",
                year: 2017,
                classes:[
                    {id: 9, name: "HIST 101", hours: 3, fullName:"American History", averageRating: 0, totalRatings: 42},
                    {id: 10, name: "PSYC 101", hours: 3, fullName:"Introduction to Psychology", averageRating: 0.5, totalRatings: 32},
                    {id: 11, name: "SE 101", hours: 3, fullName:"How to College (but only Southeastern)", averageRating: 3.4, totalRatings: 22},
                    {id: 12, name: "MATH 201", hours: 5, fullName:"Calculus II", averageRating: 5.0, totalRatings: 12},
                    {id: 13, name: "GBIO 154", hours: 3, fullName:"General Biology II", averageRating: 4.5, totalRatings: 2},
                    {id: 14, name: "MUSA 137", hours: 1, fullName:"Applied Woodwind Lessons", averageRating: 3.5, totalRatings: 72},
                    {id: 15, name: "MUS 153", hours: 1, fullName:"Symphonic Band",          averageRating: 2.5, totalRatings: 82},
                    {id: 16, name: "MUS 121", hours: 1, fullName:"Wind Symphony",           averageRating: 1.5, totalRatings: 92}
                ]
            },
            {
                id: 3,
                name: "Fall",
                year: 2017,
                classes:[
                    {id: 17, name: "CMPS 280", hours: 3, fullName:"Algorithm Design II", averageRating: 0, totalRatings: 42},
                    {id: 18, name: "CMPS 257", hours: 3, fullName:"Discrete Structures and Computer Architecture", averageRating: 0.5, totalRatings: 32},
                    {id: 19, name: "CMPS 120", hours: 3, fullName:"Visual Basic", averageRating: 3.4, totalRatings: 22},
                    {id: 20, name: "ENGL 122H", hours: 3, fullName:"Honors English Proficiency", averageRating: 5.0, totalRatings: 12},
                    {id: 21, name: "MATH 392", hours: 3, fullName:"Numerical Methods", averageRating: 4.5, totalRatings: 2},
                    {id: 22, name: "MUSA 137", hours: 1, fullName:"Applied Woodwind Lessons", averageRating: 3.5, totalRatings: 72},
                    {id: 23, name: "MUS 153", hours: 1, fullName:"Symphonic Band",          averageRating: 2.5, totalRatings: 82},
                    {id: 24, name: "MUS 121", hours: 1, fullName:"Wind Symphony",           averageRating: 1.5, totalRatings: 92}
                ]
            }
        ];

        $scope.totalSemesterHours = function(semester){
            var ret = 0;
            for (var i = 0; i < semester.classes.length; i++){
                ret += semester.classes[i].hours;
            }
            return ret;
        };
    }
})();