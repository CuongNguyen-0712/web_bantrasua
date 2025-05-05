<?php

namespace user;
use Database;
use PDO;  

class Cart_Model{

    public function getAddress($user_id){
        $stmt = Database::getInstance()->prepare("SELECT * 
                                                  FROM address 
                                                  WHERE account_id = ? ");

        $stmt->execute([$user_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPhoneNumber($user_id){
        $stmt = Database::getInstance()->prepare("SELECT phone_number 
                                                  FROM account 
                                                  WHERE id = ? ");

        $stmt->execute([$user_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getUserName($user_id){
        $stmt = Database::getInstance()->prepare("SELECT username 
                                                  FROM account 
                                                  WHERE id = ? ");

        $stmt->execute([$user_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}

?>