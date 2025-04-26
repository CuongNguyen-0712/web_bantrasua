<?php 
namespace admin;

class Home_Model{
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password){
        $this->username =  $username;
        $this->email =  $email;
        $this->password =  $password;
    }

    public function getUserName(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassWord(){
        return $this->password;
    }
}    

?>