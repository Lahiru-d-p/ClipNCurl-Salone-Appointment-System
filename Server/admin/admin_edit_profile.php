<?php
    session_start();
    require_once '../includes/Admin.php';
    require_once '../includes/AdminDAO.php';
    require_once '../includes/UserAuth.php';

    if(!isset($_SESSION["user_id"])){
        header("location:admin_login.php");
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new DatabaseManager();
        $udao = new AdminDAO($db);
        $auth = new UserAuth($udao);                               

        if(isset($_POST["change_password"])){
            $username=$_SESSION["username"];
            $current_password =$_POST["current_password"];
            $new_password =$_POST["new_password"];
            $cnew_password=$_POST["cnew_password"];

            if($auth->login($username,$current_password) && $new_password==$cnew_password){ 
                $udao->updateAdminPassword($_SESSION["user_id"],$new_password);
                $_SESSION["update_pass"] = "Updated Successfully";
            }else{
                $_SESSION["error_message"]="Invalid Password ";
            }
        }                    
        if(isset($_POST["delete"])){
            $udao->deleteAdmin($_SESSION["user_id"]);
            session_destroy();
            header("location:admin_login.php");
        }    
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="icon" type="image/x-icon" href="image05.jpg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/admin_stylesheet1.css?<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../css/admin_profile.css?<?php echo time(); ?>"/>

        <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

        <script>
            function confirmDeletion(){
                let text ="I WANT TO DELETE THIS ACCOUNT";
                let input = prompt("To confirm deletion type I WANT TO DELETE THIS ACCOUNT and press OK");
                if (input==text) {
                    return true;
                } else {
                    return false;
                }
            }
           
            $().ready(function () {
                $("#editpassw").validate({
                rules: {
                        
                    current_password: "required",
                
                    new_password:{
                        required: true,
                        minlength: 8,
                    },
                    cnew_password:{
                        required: true,
                        minlength: 8,
                        equalTo: "#new_password",
                    },
        
                },
                messages: {
                    current_password:"*required",
        
                    new_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    },
                    cnew_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Please enter the same password as above",
                    },
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
                submitHandler: function (form) { 
                    form.submit();
                }
                });
            });

        </script>
    </head>
    <body>
        <div class="parent-navbar">
                <div class="header">
                    Clip & Curl
                </div>
                <div class="child-navbar">
                    <a href="admin_calendar.php" class="child-nav">
                        Calendar
                    </a>
                    <a href="admin_appointments.php" class="child-nav">
                        Today's Appointments
                    </a>
                    <div class="child-nav active">
                        Profile 
                        <div class="dropdown">
                            <div class="arrow">
                            
                            </div>
                            <div class="dropdown-content">
                                <a href="admin_edit_profile.php">Edit Profile</a>
                                <a href="admin_logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="message"><h2>Username : <?php echo $_SESSION['username']; ?></h2></div>
        <div class="login-box">
            <div>
                    <form method="post" id="editpassw" name="editpassw">
                        <h2 align="center">Change Password</h2><br>
                        <?php 
                        if(isset($_SESSION["update_pass"])){ ?>
                            <span class="cool"><?php echo $_SESSION["update_pass"]; ?></span><br>
                        <?php
                            unset($_SESSION["update_pass"]);
                        }
                        if(isset($_SESSION["error_message"])){ ?>
                            <span class="danger"><?php echo $_SESSION["error_message"]; ?></span><br> 
                        <?php
                            unset($_SESSION["error_message"]);
                        }
                        ?>
                        Current Password<br>
                        <input type="password" name="current_password" id="current_password"></input><br>
                        New Password<br>
                        <input type="password" name="new_password" id="new_password"></input><br>
                        Confirm Password<br>
                        <input type="password" name="cnew_password" id="cnew_password"></input><br>
                        <input type="submit" name="change_password" value="Change Password"></input>
                    </form>
                    
                    
            </div>      
            <div class="login-box">
                <form method="post" onsubmit="return confirmDeletion()">
                    <h2 align="center">Delete Account</h2>
                    <input type="submit" name="delete" value="Delete Account"></input>
                </form>
            </div>  
        </div>
       
    </body>
            
</html>
