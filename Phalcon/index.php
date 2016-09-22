<html>
    <head>
        <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
        <meta name="google-signin-client_id" content="51037973777-2i03a7rmfhlbme4cr518o1mq8661s5fo.apps.googleusercontent.com">
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-route.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body data-ng-app="app">

        <div ng-controller="headerController">
            <div ng-include src="header.url"></div>
            <script type="text/ng-template" id="header.html"></script>
        </div>
        <div data-ng-view></div>

        <script src="public/app/app.js"></script>
        <script src="public/controllers/homeController.js"></script>
        <script src="public/controllers/headerController.js"></script>
        <script src="public/controllers/registerController.js"></script>
        <script src="public/controllers/plannerController.js"></script>
        <script src="public/services/userService.js"></script>
    </body>
</html>