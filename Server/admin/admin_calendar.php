<?php 
    session_start();
    require_once '../includes/AppointmentDAO.php';
	require_once '../includes/DatabaseManager.php';

    if(!isset($_SESSION["user_id"])){
        header("location:admin_login.php");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = new DatabaseManager();
        $apDAO = new AppointmentDAO($db);
        if(isset($_POST['search_time'])){
            $date = $_POST['date'];
            $appointments = $apDAO->getAppointmentByDate($date);
            $_SESSION['date']= $date;
            $_SESSION['appointments'] = $appointments;
        }
        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            if($apDAO->deleteAppointment($id)){
                $_SESSION['appointments'] = $apDAO->getAppointmentByDate($_SESSION['date']);
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Today's Appointments</title>
        <link rel="icon" type="image/x-icon" href="icon.jpg">
        <link rel="stylesheet" type="text/css" href="../css/admin_stylesheet1.css?<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../css/admin_calendar.css?<?php echo time(); ?>"/>
    </head>

    <body>
        <div class="parent-navbar">
            <div class="header">
                Clip & Curl
            </div>
            <div class="child-navbar">
                <a href="admin_calendar.php" class="child-nav active">
                    Calendar
                </a>
                <a href="admin_appointments.php" class="child-nav">
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
        <form method="post" class="box">
            Select date :
            <input type="date" id="date" name="date" required> <br><input type="submit" id="search_time" name="search_time" value="Search Appointments" required>
        </form>
        <?php
        if(isset($_SESSION['date'])){
            if(empty($_SESSION['appointments'])){ ?>
                <p align="center"><?php echo "No Appointments for ".$_SESSION['date']; ?></p>
            <?php
            }
            else{ ?>
                <p align="center"><?php echo "Appointments for ".$_SESSION['date']; ?></p>
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
                    <th>Delete Appointment</th>
                </tr>
                <?php
                $index =1;
                foreach($_SESSION['appointments'] as $appointment){ ?>
                <form method="post" id="<?php echo $appointment['appointment_id']; ?>">
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $appointment['customer_name']; ?></td>
                    <td><?php echo $appointment['mobile']; ?></td>
                    <td><a href="mailto:<?php echo $appointment['email']; ?>"><?php echo $appointment['email']; ?></a></td>
                    <td><?php echo $appointment['start_time']; ?></td>
                    <td><?php echo $appointment['end_time']; ?></td>
                    <td><?php echo $appointment['message']; ?></td>
                    <input type="hidden" id="id" name="id" value="<?php echo $appointment['appointment_id']; ?>">
                    <td><input type="submit" id="delete" name="delete" value="Delete" class="delete-btn"></td>
                    
                </tr>
                </form>
                <?php 
                $index++;
                }
            
                ?>
            </table>
        </div>
        <?php 
         }
        }
        ?>
          
    </body>
            
</html>
