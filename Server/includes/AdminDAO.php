<?php 
require_once 'Admin.php';
require_once 'DatabaseManager.php';
class AdminDAO{
    private $db;
    public function __construct($db) {
        $this->db=$db;
    }

    public function addAdmin(Admin $admin) {
        try{
            $query = "INSERT INTO admin (username,password) VALUES (:username, :password)";
            $stmt = $this->db->getConnection()->prepare($query);
            $username = $admin->getUsername();
            $password = $admin->getPassword();
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$hashed_password);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
           return false;
        } 
    }

    public function getHashPassword($username) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $query="SELECT password FROM admin where username=:username";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            return false;
        }
        $hashedPassword = $result["password"];
        return $hashedPassword;
     }
  
     private function hashPassword($password) {
        $options = [
           'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
     }

     public function updateAdminPassword($id,$password){
        try{
            $stmt = $this->db->getConnection()->prepare("UPDATE admin SET password = :password WHERE admin_id = :admin_id");
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $stmt->bindValue(":admin_id", $id);
            $stmt->bindValue(":password", $hashed_password);
            $stmt->execute();
         
        }
        catch(PDOException $e) {
            return false;
        } 
    } 

    public function deleteAdmin($id) {
        try{
            $stmt = $this->db->getConnection()->prepare("DELETE FROM admin WHERE admin_id = :admin_id");
            $stmt->bindParam(':admin_id', $id);
            $stmt->execute();
            $this->db->closeConnection();
        }
        catch(PDOException $e) {
            return false;
        } 
    }

    public function getIdByUsername($username) {
        try{
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM admin WHERE username = :username");
            $stmt->bindValue(":username", $username);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e) {
            return false;
        } 
        finally{
            $this->db->closeConnection();
        }
    }
    public function getAdminById($id) {
        try{
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM admin WHERE admin_id = :admin_id");
            $stmt->bindValue(":admin_id", $id);
            $stmt->execute();
            $result =$stmt->fetch(PDO::FETCH_ASSOC);
            $this->db->closeConnection();
            return $result;
        }
        catch(PDOException $e) {
            return false;
        } 
    }
}
?>