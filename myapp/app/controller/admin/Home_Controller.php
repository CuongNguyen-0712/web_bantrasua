<?php

namespace admin;

class Home_Controller extends Controller
{
    // public function index(){
    //     $home_service = new Home_Service();
    //     $accounts = $home_service->getAllAccount();
    //     include APP_ROOT ."/app/view/admin/index.php";
    // }

    public function index()
    {
        // include APP_ROOT ."/app/view/admin/index.php";
        $this->view('index', []);
    }
}
