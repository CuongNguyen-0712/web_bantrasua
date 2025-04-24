<?php

namespace admin;

require_once APP_ROOT . "/app/services/admin/Home_Service.php";

class Home_Controller
{
    public function index()
    {
        $home_service = new Home_Service();
        $accounts = $home_service->getAllAccount();
        include APP_ROOT . "/app/view/admin/index.php";
    }

    public function home()
    {
        include APP_ROOT . "/app/view/admin/admin.php";
    }
}
