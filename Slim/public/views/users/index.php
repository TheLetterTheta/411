<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <script src="/411/scripts/angular.min.js"></script>
    <script src ="/411/scripts/app/main.js"></script>
</head>
<body>
<?php
    include 'header.php';

?>
<div id="bodyContainer" ng-controller="UserCtrl" ng-app="MainApp" ng-init="listUsers()">
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>College Id</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th></th>
        </tr>
        <tbody>
        <tr ng-repeat='user in users'>
            <td>{{user.UserId}}</td>
            <td>{{user.CollegeId}}</td>
            <td>{{user.Email}}</td>
            <td>{{user.FirstName}}</td>
            <td>{{user.LastName}}</td>
            <td><a href="Edit.php?id={{user.UserId}}">Edit</a></td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
