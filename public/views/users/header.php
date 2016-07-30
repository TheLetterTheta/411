<html>
<head>
    <title></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/411/public/Login.php">411</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
            <ui class=" nav navbar-nav">
                <li><a href="/411/public/views/users/index.php">User</a></li>
            </ui>
            <ul class="nav navbar-nav navbar-right">
                <li><?php
                    if(!isset($_SESSION))
                    {
                        session_start();
                    }
                    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                        echo "<a class=btn btn-default btn-outline btn-circle collapsed  href='?logout' aria-expanded=false aria-controls=nav-collapse2>Sign Out</a>";
                    }
                    ?>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->
</body>
</html>
