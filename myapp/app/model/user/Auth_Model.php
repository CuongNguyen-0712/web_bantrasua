<?php

namespace user;

use Database;
use PDO;

class Auth_Model
{

    public function checkLogin($email, $password)
    {
        $stmt = Database::getInstance()->prepare("SELECT * 
                                              FROM account
                                              WHERE email = ? AND password = ? and is_admin = 0");
        $stmt->execute([$email, $password]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
