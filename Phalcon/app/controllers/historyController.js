(function(){
    "use strict"

    angular.module('app')
        .controller('historyController', historyController);

    historyController.$inject = ["$scope", "$rootScope"]

    function historyController($scope, $rootScope){
        $scope.history = [{
            id: 1,
            name: "Computer Science",
            courses:[{
                id: 1,
                name: "CMPS 161",
                fullName: "Algorithm Design I",
                credits: 3,
                grade: 'A',
                semesterName: "Spring",
                year: 2014,
                personalRating: 4.2
            },{
                id: 2,
                name: "CMPS 280",
                fullName: "Algorithm Design II",
                credits: 3,
                grade: 'B',
                semesterName: "Fall",
                year: 2014,
                personalRating: 3.9
            },{
                id: 3,
                name: "CMPS 257",
                fullName: "Discrete Structures and Computer Architecture",
                credits: 3,
                grade: 'A',
                semesterName: "Spring",
                year: 2015,
                personalRating: 2.8
            },{
                id: 4,
                name: "CMPS 285",
                fullName: "Software Design and Implementation I",
                credits: 3,
                grade: 'A',
                semesterName: "Fall",
                year: 2015,
                personalRating: 5.0
            },{
                id: 5,
                name: "CMPS 383",
                fullName: "Software Design and Implementation II",
                credits: 3,
                grade: 'A',
                semesterName: "Spring",
                year: 2016,
                personalRating: 0.4
            }]
        },{
            id: 2,
            name: "Math",
            courses: [{
                id: 6,
                name: "MATH 155",
                fullName: "College Algebra",
                credits: 3,
                grade: 'A',
                semesterName: "Spring",
                year: 2014,
                personalRating: 4.7
            },{
                id: 7,
                name: "MATH 165",
                fullName: "Pre-Calculus with Trig",
                credits: 3,
                grade: 'F',
                semesterName: "Fall",
                year: 2014,
                personalRating: 4.2
            },{
                id: 8,
                name: "MATH 200",
                fullName: "Calculus I",
                credits: 5,
                grade: 'F',
                semesterName: "Spring",
                year: 2015,
                personalRating: 3.2
            },{
                id: 9,
                name: "MATH 201",
                fullName: "Calculus II",
                credits: 3,
                grade: 'C',
                semesterName: "Fall",
                year: 2015,
                personalRating: 4.3
            }]
        },{
            id: 3,
            name: "English",
            courses: [{
                id: 10,
                name: "ENGL 101",
                fullName: "Freshman Composition",
                credits: 3,
                grade: 'B',
                semesterName: "Spring",
                year: 2014,
                personalRating: 3.7
            },{
                id: 11,
                name: "ENGL 102",
                fullName: "English Proficiency",
                credits: 3,
                grade: 'B',
                semesterName: "Fall",
                year: 2014,
                personalRating: 3.7
            },{
                id: 12,
                name: "ENGL 231",
                fullName: "British Literature",
                credits: 3,
                grade: 'B',
                semesterName: "Spring",
                year: 2015,
                personalRating: 1.7
            },{
                id: 14,
                name: "ENGL  322",
                fullName: "Technical Writing",
                credits: 3,
                grade: 'B',
                semesterName: "Fall",
                year: 2015,
                personalRating: 5.0
            }]
        }];

        $scope.calculateAverageGrade = function(subject){
            var avgGrade = 0;
            var totalCredits = 0;
            for(var i = 0; i < subject.courses.length; i++){
                totalCredits += subject.courses[i].credits;
                switch (subject.courses[i].grade)
                {
                    case 'A':
                        avgGrade += subject.courses[i].credits * 4;
                        break;
                    case 'B':
                        avgGrade += subject.courses[i].credits * 3;
                        break;
                    case 'C': avgGrade += subject.courses[i].credits * 2
                        break;
                    case 'D': avgGrade += subject.courses[i].credits
                        break;
                    default:
                        break;
                }
            }
            avgGrade = avgGrade / totalCredits;

            if(avgGrade > 3.5){
                return 'A';
            }else if(avgGrade > 2.5){
                return 'B';
            }else if(avgGrade > 1.5){
                return 'C';
            }else if(avgGrade > 0.5){
                return 'D';
            }else {
                return 'F';
            }
        };

        $scope.selectedSubject = $scope.history[0];

        $scope.selectSubject = function(subject){
            if($scope.selectedSubject === subject){
                $scope.selectedSubject = null;
            }else{
                $scope.selectedSubject = subject;
            }
        };

        $scope.getStarRating = function(rateClass){
            var ret  = [];
            for (var i = 1; i <= rateClass.personalRating; i++){
                ret.push("full");
            }
            if(rateClass.personalRating % 1 >= 0.5){
                ret.push("half");
            }
            return ret;
        }
    }
})();