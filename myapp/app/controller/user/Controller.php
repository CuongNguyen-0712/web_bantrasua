<?php

namespace user;

class Controller
{

    public function model($model)
    {      //$model = tên file
        $path = APP_ROOT . "/app/model/user/{$model}.php";
        if (file_exists($path)) {
            require_once $path;
            $className = "user\\$model";
            return new $className;
        }
    }

    public function view($view, $data = [])
    {    //$view = tên file, $data hứng dữ liệu từ view đổ về
        $path = APP_ROOT . "/app/view/user/{$view}.php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
}
