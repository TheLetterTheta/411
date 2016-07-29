<html>
    <head>
        <title>411</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>

            function pressMe(){
                $.ajax({
                    url:'/411/public/api/user',
                    type:'POST',
                    datatype:'json',
                    data:{
                        collegeId: 1,
                        email: "test@test.com",
                        apiKey: "",
                        firstName: "Bob",
                        lastName: "Bobby"
                    },
                    success:function(data) {
                        console.log(data);
                    }
                })
            }
        </script>
    </head>
    <body>
        <?php
                require '../vendor/autoload.php';
                require '../app/data/const/prepared-statements.php';
                include "header.php";
                if(!isset($_SESSION))
                {
                    session_start();
                }
                $client = new Google_Client();
                $client->setClientId('630519487028-7rgetifcjskk4tdbagbmi7ib0rr3j3oe.apps.googleusercontent.com');
                $client->setClientSecret('9ESYPq2HejybZeBdH6E-WEwz');
                $client->setRedirectUri('http://localhost/411/public/login.php');
                $client->addScope("email");
                $client->addScope("profile");

                $service = new Google_Service_Oauth2($client);
                if (isset($_GET['code'])) {
                    $client->authenticate($_GET['code']);
                    $_SESSION['access_token'] = $client->getAccessToken();
                    header('Location: ' . filter_var('http://localhost/411/public/login.php', FILTER_SANITIZE_URL));
                    exit;
                }
                if (isset($_REQUEST['logout'])) {
                    unset($_SESSION['access_token']);
                    header('Location: https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
                }
        
        
                if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                    $client->setAccessToken($_SESSION['access_token']);
                } else {
                    $authUrl = $client->createAuthUrl('http://localhost/411/public/login.php');
                }
        
                        echo '<div style="margin:20px">';
                        if (isset($authUrl)){
        
                            echo '<div align="center">';
                            echo '<h3>Welcome to 411 project!</h3>';
                            echo '<div>Please click login button to connect to Google!</div>';
                            echo "<a class='btn btn-default btn-outline btn-circle collapsed' href=  $authUrl >Sign In</a>";
                            echo '</div>';
        
                        }else{
        
                        $user = $service->userinfo->get(); //get user info
                        $name=$user->name;
                        $mysqli = new mysqli("localhost", "root","", "cmps_411");
        
                        $result = $mysqli->query("SELECT  COUNT(Email) as usercount FROM users WHERE Email = '$user->email'");
                        $user_count = $result->fetch_object()->usercount;
                            
                        if($user_count) //if user already exist change greeting text to "Welcome Back"
                        {
                            echo "Welcome back $user->name ";
                        }
                        else //else greeting text "Thanks for registering"
                        {
                            echo"";
                            echo "Hi $user->name, Thanks for Registering!";
                            $statement = $mysqli->prepare("INSERT INTO users (CollegeId,FirstName, Email, LastName) VALUES (?,?,?,?)");
                            $statement->bind_param('isss',$user->verifiedEmail,$user->givenName, $user->email, $user->familyName);
                            $statement->execute();
                            echo $mysqli->error;
                        }
                    }
        ?>
    </body>
</html>
