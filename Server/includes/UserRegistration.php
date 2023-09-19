<?php
require_once 'AdminDAO.php';

class UserRegistration {
    private $adminDAO;

    public function __construct(AdminDAO $adminDAO) {
        $this->adminDAO = $adminDAO;
    }

    public function register(Admin $admin) {
        $this->adminDAO->addAdmin($admin);
        return true;
    }
}
?>
