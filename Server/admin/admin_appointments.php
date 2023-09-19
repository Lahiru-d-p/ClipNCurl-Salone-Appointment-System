<?php 
    session_start();
    require_once '../includes/AppointmentDAO.php';
	require_once '../includes/DatabaseManager.php';

    if(!isset($_SESSION["user_id"])){
        header("location:admin_login.php");
    }

    $db = new DatabaseManager();
    $apDAO = new AppointmentDAO($db);
    date_default_timezone_set('Asia/Colombo');
    $today = date('Y-m-d');
    $todays_appointments = $apDAO->getAppointmentByDate($today);

    if($apDAO->deletePreviousAppointment()){
        
    }
    $db->closeConnection();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Today's Appointments</title>
        <link rel="icon" type="image/x-icon" href="icon.jpg">
        <link rel="stylesheet" type="text/css" href="../css/admin_stylesheet1.css?<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../css/admin_profile.css?<?php echo time(); ?>"/>
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
                <a href="admin_appointments.php" class="child-nav active">
                    Today's Appointments
                </a>
                <div class="child-nav">
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
        <?php
        if(empty($todays_appointments)){ ?>
                <p align="center"><?php echo "No Appointments for today"; ?></p> <?php
            }
            else{ ?>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th></th>
                    <th>Customer Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Message</th>
                </tr>
                <?php
                $index =1;
                foreach($todays_appointments as $appointment){ ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $appointment['customer_name']; ?></td>
                    <td><?php echo $appointment['mobile']; ?></td>
                    <td><a href="mailto:<?php echo $appointment['email']; ?>"><?php echo $appointment['email']; ?></a></td>
                    <td><?php echo $appointment['start_time']; ?></td>
                    <td><?php echo $appointment['end_time']; ?></td>
                    <td><?php echo $appointment['message']; ?></td>
                </tr>
                <?php 
                $index++;
                }
            
                ?>
            </table>
        </div>
        <?php 
         }
        ?>
          
    </body>
            
</html>
