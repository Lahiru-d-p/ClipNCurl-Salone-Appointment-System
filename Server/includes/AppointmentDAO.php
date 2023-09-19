<?php 
require_once 'Appointment.php';
require_once 'DatabaseManager.php';
class AppointmentDAO{
    private $db;
    public function __construct($db) {
        $this->db=$db;
    }

    public function addAppointment(Appointment $appointment) {
        try{
            
            $query = "INSERT INTO appointment (customer_name, mobile, email, date, start_time, end_time, message) 
            VALUES (:customer_name, :mobile, :email, :date, :start_time, :end_time, :message)";
            $stmt = $this->db->getConnection()->prepare($query);
            
            $customer_name = $appointment->getCustomerName();
            $mobile = $appointment->getMobile();
            $email = $appointment->getEmail();
            $date = $appointment->getDate();
            $start_time= $appointment->getStartTime();
            $end_time= $appointment->getEndTime();
            $message= $appointment->getMessage();
            
            $stmt->bindParam(':customer_name', $customer_name);
            $stmt->bindParam(':mobile', $mobile);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':start_time', $start_time);
            $stmt->bindParam(':end_time', $end_time);
            $stmt->bindParam(':message', $message);
            $stmt->execute();
            
    
            return true;
        }
        catch(PDOException $e) {
           return false;
        } 
    }

    public function getAppointmentByDate($date){
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM appointment WHERE date = :date order by start_time" );
            $stmt->bindValue(":date", $date);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return false;
        } 
    }

    public function getOverlappedCount($start_time, $end_time, $date) {
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT count(*) FROM appointment WHERE end_time > :start_time AND start_time < :end_time AND date = :date");
            $stmt->bindValue(":start_time", $start_time);
            $stmt->bindValue(":end_time", $end_time);
            $stmt->bindValue(":date", $date);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            return $count;
        } catch(PDOException $e) {
            return false;
        } 
        
    }
    
    public function deleteAppointment($id) {
        try{
            $stmt = $this->db->getConnection()->prepare("DELETE FROM appointment WHERE appointment_id = :appointment_id");
            $stmt->bindParam(':appointment_id', $id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            return false;
        } 
    }

    public function deletePreviousAppointment() {
        try{
            date_default_timezone_set('Asia/Colombo');
            $two_days_ago = date('Y-m-d H:i:s', strtotime('-2 days'));

            $stmt = $this->db->getConnection()->prepare("DELETE FROM appointment WHERE date < :two_days_ago");
            $stmt->bindParam(':two_days_ago',$two_days_ago);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            return false;
        } 
    }


}

?>