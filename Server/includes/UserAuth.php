<?php
require_once 'Admin.php';
require_once 'AdminDAO.php';
class UserAuth{
    private $adminDAO;
    
    public function __construct(AdminDAO $adminDAO) {
        $this->adminDAO = $adminDAO;
    }

    public function login($username, $password) {

        $hashed_password=$this->adminDAO->getHashPassword($username);
        if (password_verify($password, $hashed_password)) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>