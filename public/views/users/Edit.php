<?php
include 'header.php';
$id = null;
$show = 'false';
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    $payload = file_get_contents('http://localhost/411/public/api/user/'.$id);
    $json = json_decode($payload, true);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <h2>Edit</h2>
        <form class="form-horizontal" role="form">
            <div class="form-group">

                <label class="control-label col-sm-2" for="FirstName">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="FirstName" value=<?php echo $json['FirstName']; ?>>
                </div>
            </div>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="LastName">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="LastName" value=<?php echo $json['LastName'] ?>>
                    </div>
                </div>
            <button type="submit" class="btn btn-default" onclick="UpdateUser()">Submit</button>
    </div>
</body>
<script>
    var userId = <?php echo $json['UserId'] ?> ;
    var collegeId = <?php echo $json['CollegeId'] ?> ;
    var email = '<?php echo $json['Email'] ?>' ;
    var apikey = '<?php echo $json['ApiKey'] ?>' ;
    function UpdateUser(){
        var fname = document.getElementById("FirstName").value;
        var lname = document.getElementById("LastName").value;
        if(isNaN(fname)&&isNaN(lname)) {
            $.ajax({
                url: '/411/public/api/user',
                type: 'PUT',
                datatype: 'json',
                data: {
                    userId: userId,
                    collegeId: collegeId,
                    email: email,
                    apiKey: apikey,
                    firstName: fname,
                    lastName: lname
                },
                success: function (data) {
                    console.log(data);
                }
            })
        }else{
            alert("Invalid First Name or Last Name.");
        }
    }
</script>
</html>
