<?php 
    session_start();
    require_once '../includes/Admin.php';
    require_once '../includes/AdminDAO.php';
    require_once '../includes/UserRegistration.php';
    require_once '../includes/DatabaseManager.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username=$_POST['username'];
        $password=$_POST['password'];
    
        $admin = new Admin($username,$password);
        $db = new DatabaseManager();
        $udao = new AdminDAO($db);
        $reg = new UserRegistration($udao);
        if($reg->register($admin)){
            $_SESSION["register_message"] ="Registration was Successful";
            header("location:admin_login.php");
        }
        
    
       
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Registration</title>
        <link rel="icon" type="image/x-icon" href="image05.jpg">
        <link rel="stylesheet" type="text/css" href="../css/admin_registration.css?<?php echo time(); ?>">
        <script src="https://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

        <script>  
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }   
            $().ready(function () {
                $("#reg").validate({
                    rules: {
                            
                        username: "required",
                        
                        password:{
                            required: true,
                            minlength: 8,
                        }
                    },
                    messages:{
                        username:"*required",
                        password:{
                            required:"*required",
                            minlength:"Your password must be at least 8 characters long",
                        }
                    },
                    submitHandler: function (form) { 
                        form.submit();
                    }
                });
            });

            $(document).ready(function(){
            $('#username').keyup(function(){
            var username = $(this).val();
                $.ajax({
                    dataType: 'json',
                    url:'admin_reg_validation.php',
                    method:"POST",
                    data:{user_name:username},
                    success:function(data){
                        if(data=="red"){
                            $('#user_info').css("color","red");
                            $('#user_info').html("username is already in use");
                            document.getElementById("submitbtn").disabled = true;
                        }if(data=="green"){
                            $('#user_info').css("color","green");
                            $('#user_info').html("username is available"); 
                            document.getElementById("submitbtn").disabled = false;
                        }
                    }

                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="login-box">
            <form method="post" name="reg" id="reg">
                <h3 style="color:#00bcff;text-decoration: none;">Clip & Curl</h3><br>
                <!-- <span id="error_message" name="error_message" class="danger"></span> -->
                Username  <span id="user_info" style="color:red"></span>
                <input type="text" name="username" id="username"></input>
                Password  <span id="password_info" style="color:red"></span>
                <input type="password" name="password" id="password"></input>
                <input type="submit" name="register" id="register" value="Register"></input>
            </form>
        </div>  
    </body>
            
</html>
