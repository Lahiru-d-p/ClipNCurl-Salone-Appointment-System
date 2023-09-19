<?php
    session_start();
    require_once 'Server/includes/Appointment.php';
    require_once 'Server/includes/AppointmentDAO.php';
    require_once 'Server/includes/DatabaseManager.php';
    require_once 'Server/includes/TimeManager.php';

    $customer_name = $_POST['name'];
    $mobile = $_POST['phone'];
    echo $mobile;
    $email = $_POST['email'];
    $duration = $_POST['duration'];
    $date = $_POST['date'];
    echo $date;
    $message = $_POST['message'];

    $_SESSION['name'] = $customer_name;
    $_SESSION['phone'] = $mobile;
    $_SESSION['email'] = $email;
    $_SESSION['duration'] = $duration;
    $_SESSION['date'] = $date;
    $_SESSION['message'] = $message;
    echo $_SESSION['message'];
     
    $db = new DatabaseManager();
    $apDAO = new AppointmentDAO($db);

    if(isset($_POST['proceed_appointment'])){
        $start_time = $_POST['time'];
    
        $timestamp = strtotime($start_time); 
        $new_timestamp = $timestamp + $duration*3600; 
        $end_time = date("H:i:s", $new_timestamp);
       
      

        $appointmentBuilder = new AppointmentBuilder();
        $appointment = $appointmentBuilder->setCustomerName($customer_name)
                                            ->setMobile($mobile)
                                            ->setEmail($email)
                                            ->setDate($date)
                                            ->setStartTime($start_time)
                                            ->setEndTime($end_time)
                                            ->setMessage($message)
                                            ->build();

        if($apDAO->addAppointment($appointment)){
            $_SESSION['success_message']="Congratz! Appointment is Sent Successfully!";
            header("location:Appointment.php");
        }
    }
    elseif(isset($_POST['search_time'])){
      
        $time_manager = new TimeManager($date,$duration,$apDAO);
        if($time_manager->isSunday()){
            $_SESSION['sunday_message'] ="Please note that We are closed on Sundays";
        }else{
            $time_slots = $time_manager->getAvailableTimeSlots();
            if(empty($time_slots)){
                $_SESSION['empty_message'] ="No avialble times for this date";
            }else{
                $_SESSION['time_slots'] = $time_slots;
            }
        }
       
        header("location:Appointment.php#date");
    }
    
    $db->closeConnection();



?>