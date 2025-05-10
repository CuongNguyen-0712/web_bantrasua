<?php
namespace admin;
class Controller{

    public function model($model){      
        $path = APP_ROOT . "/app/model/admin/{$model}.php";
        if (file_exists($path)) {
            require_once $path;
            $className = "admin\\$model";
            return new $className;
        }
    }

    public function view($view, $data=[]){    
        $path = APP_ROOT . "/app/view/admin/{$view}.php";
        if (file_exists($path)) {
            extract($data); // Chuyển đổi mảng thành biến
            require_once $path;
        }
    }

}
?>