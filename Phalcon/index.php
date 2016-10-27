<head>
    <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>
    <meta name="google-signin-client_id" content="51037973777-2i03a7rmfhlbme4cr518o1mq8661s5fo.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Angular Material style sheet -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="app/css/login.css">
</head>
<body data-ng-app="app">

    <div ng-controller="headerController" ng-hide="displayHeader">
        <div ng-include src="header.url"></div>
        <script type="text/ng-template" id="header.html"></script>
    </div>

    <div data-ng-view style="width:100%; height:100%"></div>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!-- Your application bootstrap  -->
    <script src="app/app.js"></script>
    <script src="app/controllers/loginController.js"></script>
    <script src="app/controllers/profileController.js"></script>
    <script src="app/controllers/headerController.js"></script>
    <script src="app/controllers/plannerController.js"></script>
    <script src="app/controllers/historyController.js"></script>
</body>
</html>