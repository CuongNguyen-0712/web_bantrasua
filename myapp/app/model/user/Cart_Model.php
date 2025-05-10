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
    public function update($id, $data)
    {
        $sql = "UPDATE address SET  district = ?, province = ?, street = ?, ward = ? WHERE account_id = ?";
        $stmt = Database::getInstance()->prepare($sql);
        return $stmt->execute([
            $data['district'],
            $data['province'],
            $data['street'],
            $data['ward'],
            $id
        ]);
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

    public function toppingName($topping_id){
        $stmt = Database::getInstance()->prepare("SELECT name 
                                                  FROM topping 
                                                  WHERE id = ? ");

        $stmt->execute([$topping_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}

?>