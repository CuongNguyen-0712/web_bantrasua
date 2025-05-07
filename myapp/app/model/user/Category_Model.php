<?php
namespace user;

use Database;
use PDO;

class Category_Model{

    public function getCategory(){
        $stmt = Database::getInstance()->prepare("SELECT * FROM category");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }
}
?>