<?php
class TimeManager{
    private $apDAO;
    private $date;
    private $duration;

    public function __construct($date,$duration,$apDAO){
        $this->date = $date;
        $this->duration = $duration;
        $this->apDAO = $apDAO;
    }
    
    public function getAvailableTimeSlots(){
        date_default_timezone_set('Asia/Colombo');
        $today = date('Y-m-d');
        $date = $this->date;
        $duration = $this->duration;
        $times = $this->detect_not_overlap($date,$duration);

        if($date==$today){
            $times = $this->remove_past_time($times);
           
        }
        return $times;
    }

    private function detect_not_overlap($date,$duration){
        $available_slots = [];
    
        $start_time = strtotime('09:00:00');
        $end_time = strtotime('17:00:00');
        while ($start_time <= $end_time - $duration * 3600) {
			
            $start = date('H:i:s', $start_time);
            $start_timestamp = strtotime($start);
            $end = date('H:i:s', $start_time + $duration * 3600);
            $end_timestamp = strtotime($end);      
            $count_existing_slots = $this->apDAO->getOverlappedCount($start,$end, $date);

            if ($count_existing_slots == 0 || $count_existing_slots == null) {
                $available_slots[] = date('H:i:s', $start_time);
            }
    
            $start_time += 30 * 60;
        }
        return $available_slots;
    }

    private function remove_past_time($times){
        date_default_timezone_set('Asia/Colombo');
        $current_timestamp = time();
        foreach ($times as $index => $time) {
            $timestamp = strtotime($time);
            if ($timestamp < $current_timestamp){
                unset($times[$index]);
            }
        }
        return $times;
    }

    public function isSunday(){
        $date = $this->date;
        if (!empty($date)) {
            $day_name = date("l", strtotime($date));
            if($day_name == "Sunday"){
                return true;
            }
        }
        return false;
    }

}
?>
