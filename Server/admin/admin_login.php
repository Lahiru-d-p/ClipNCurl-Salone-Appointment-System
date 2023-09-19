<?php 
session_start();
require_once '../includes/DatabaseManager.php';
require_once '../includes/Admin.php';
require_once '../includes/AdminDAO.php';
require_once '../includes/UserAuth.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $username=$_POST['username'];
        $password=$_POST['password'];
        $_SESSION["error_message"]=" ";

        $db = new DatabaseManager();
        $adminDAO = new AdminDAO($db);
        $login = new UserAuth($adminDAO);

        if($login->login($username, $password)){

            $admin_details=$adminDAO->getIdByUsername($username);

            $_SESSION["user_id"]=$admin_details["admin_id"];
            $_SESSION["username"]=$admin_details["username"];

            header("location:admin_appointments.php");
        }else{ 
            $_SESSION["error_message"]="Invalid Credintials";
        }
        $db->closeConnection();
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="icon" type="image/x-icon" href="icon.jpg">
        <link rel="stylesheet" type="text/css" href="../css/admin_login.css?<?php echo time(); ?>">
        <script src="https://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

        <script>  
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }   
            function validateform(){  
                var username=document.login.username.value;  
                var password=document.login.password.value;  
        
                if (username==null || username==""){
                    document.getElementById("user_info").innerHTML = "*required";
                    return false;  
                } 
                if (password==null || password==""){
                    document.getElementById("password_info").innerHTML = "*required";
                    return false;  
                } 
            } 
        </script>
    </head>

    <body>
        <div class="login-box">
            <form method="post" name="login">
            <?php if(isset($_SESSION["register_message"])){ ?>
                <span id="error_message" name="error_message" class="cool"><?php echo $_SESSION["register_message"]; ?> </span>
                <?php 
                        unset($_SESSION["register_message"]);
                }
                ?>
                <h2 style="color:#ec275f;text-decoration: none;">Clip & Curl</h2><br>
                <?php if(isset($_SESSION["error_message"])){ ?>
                <span id="error_message" name="error_message" class="danger"><?php echo $_SESSION["error_message"]; ?> </span>
                <?php 
                        unset($_SESSION["error_message"]);
                }
                ?>
                Username  <span id="user_info" style="color:red"></span>
                <input type="text" name="username" id="username"></input>
                Password  <span id="password_info" style="color:red"></span>
                <input type="password" name="password" id="password"></input>
                <input type="submit" name="submit" value="Log in"></input>
                <a href="admin_registration.php" style="color:#ec275f;text-decoration: none;">Register Here</a>
            </form>
        </div>

          
    </body>
            
</html>
