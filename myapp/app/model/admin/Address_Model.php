<?php 
namespace admin;

class Address_Model extends Base_Model
{
    //này là lọc luôn cả địa chỉ quận trong tài khoản người dùng
    public function getAllDistricts() {
        $query = "
        SELECT DISTINCT district AS name FROM address
        UNION
        SELECT DISTINCT district AS name FROM `order`
        ORDER BY name ASC";
    return $this->select($query);
    }

    public function getDistrictsOrders() {
        $query = "SELECT DISTINCT district AS name FROM `order` ORDER BY name ASC";
        return $this->select($query);
    }
}
?>