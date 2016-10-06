(function(){
    "use strict"

    angular.module('app')
        .controller('profileController', profileController)

    profileController.$inject = ['$scope']

    function profileController($scope){
        $scope.user={
            id: 1,
            name: "Mr.Klansman",
            email:"Harambe.vanKlansman@selu.edu",
            majors: [
                {
                    id: 1,
                    name: "Computer Science",
                    isMinor: false,
                    description: "Literally the greatest major offered at Southeastern. You learn a lot about computers and other things. Bacon ipsum dolor amet et kevin irure, esse shankle pariatur in andouille voluptate ball tip hamburger officia ullamco jowl. In magna duis sunt fatback ham hock et salami venison prosciutto ribeye. Cupidatat occaecat filet mignon in short ribs. Filet mignon capicola pig in, ea meatball commodo pastrami lorem t-bone short ribs qui. Salami culpa meatloaf, jowl non in id laboris deserunt burgdoggen excepteur kevin. Qui drumstick culpa strip steak tempor adipisicing. Cupidatat spare ribs pork sint, ground round excepteur meatloaf deserunt id salami irure doner officia ad.",
                    progress: 85
                },
                {
                    id: 2,
                    name: "English",
                    isMinor: false,
                    description: "You learn how to write sentences, and read books goodly. Esse tri-tip chicken, incididunt alcatra prosciutto jowl shoulder burgdoggen rump proident ea ad tongue in. Anim sint kevin aliquip alcatra dolore kielbasa ullamco shank sirloin duis ribeye frankfurter occaecat. Consectetur salami aliquip cupidatat ribeye. Biltong leberkas sunt nulla cow aliqua tri-tip turkey. Nisi bresaola officia in sausage. Irure drumstick pig tri-tip biltong.",
                    progress: 14
                },
                {
                    id: 3,
                    name : "Music",
                    isMinor: true,
                    description: "The most fun you can have in a lifetime bundled into many different bands, and wierdos. Corned beef ut jerky, prosciutto t-bone short loin ut capicola chicken cow exercitation consequat meatloaf frankfurter strip steak. Proident tail laborum swine t-bone mollit occaecat. Exercitation do prosciutto, veniam hamburger salami cow tenderloin. In cupidatat spare ribs, prosciutto ad id laborum. Rump landjaeger tongue shankle. Landjaeger leberkas hamburger dolor short loin, minim aliqua drumstick chuck in jerky pastrami et. Qui ut prosciutto, exercitation cillum tenderloin aliqua meatloaf chuck minim officia.",
                    progress: 54
                },
                {
                    id: 4,
                    name : "Math",
                    isMinor: true,
                    description: "Doner nostrud tail, jerky enim shankle pork belly brisket meatball eu lorem. Nulla dolore in, ipsum do meatball chuck swine ad hamburger ribeye est. Leberkas rump sint, excepteur landjaeger tri-tip tail. Drumstick nulla cupim nisi, deserunt burgdoggen dolor pork belly kielbasa turducken ut esse ex beef ribs consequat. Sint incididunt fatback laborum pork loin. Nostrud ball tip pastrami proident bresaola in laboris cillum exercitation.",
                    progress: 100
                }],
            GPA: 2.77,
            classification: "Junior",
            completionPercentage: 88
        }
    };
})();