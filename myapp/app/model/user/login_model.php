<?php

class login_model extends Database{

    public function checkLogin($email, $password){
        $stmt = $this->getConnect()->prepare("SELECT * 
                                              FROM account
                                              WHERE email = ? AND password = ? ");
        $stmt->execute([$email, $password]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }
    
}
?>