<?php
class Appointment {
    private $id;
    private $customerName;
    private $email;
    private $mobile;
    private $date;
    private $startTime;
    private $endTime;
    private $message;
   

    public function __construct(AppointmentBuilder $builder) {
        $this->id = $builder->id;
        $this->customerName = $builder->customerName;
        $this->email = $builder->email;
        $this->mobile = $builder->mobile;
        $this->date = $builder->date;
        $this->startTime = $builder->startTime;
        $this->endTime = $builder->endTime;
        $this->message = $builder->message;
    }

    public function getId() {
        return $this->id;
    }

    public function getCustomerName() {
        return $this->customerName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function getDate() {
        return $this->date;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function getMessage() {
        return $this->message;
    }
}

class AppointmentBuilder {
    public $id;
    public $customerName;
    public $mobile;
    public $email;
    public $date;
    public $startTime;
    public $endTime;
    public $message;


    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setMobile($mobile) {
        $this->mobile = $mobile;
        return $this;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
        return $this;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
        return $this;
    }

    public function setMessage($message) {
        $this->message = $message;
        return $this;
    }

    public function build() {
        return new Appointment($this);
    }
}
?>