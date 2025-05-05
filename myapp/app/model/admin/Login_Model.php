<?php

namespace admin;

class Login_Model extends Base_Model
{

    public function checkLogin($email, $password)
    {
        $query = "SELECT * 
                FROM account
                WHERE email = ? AND is_admin = 1 AND password = ? ";
        $result = $this->select($query, [$email, $password]);
        return $result;
    }
}
