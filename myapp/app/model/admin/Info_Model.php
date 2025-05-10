<?php

namespace admin;

class Info_Model extends Base_Model
{
    public function getInfo($email)
    {
        $query = "SELECT a.username as username, a.email as email, a.phone_number as phone, ad.street as street, ad.district as district, ad.ward as ward, ad.province as province
        FROM account a
        join address ad on a.id = ad.account_id
        WHERE a.email = :email";
        $result = $this->select($query, [':email' => $email]);
        return $result[0] ?? [];
    }
}