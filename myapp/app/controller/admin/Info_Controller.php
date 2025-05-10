<?php

namespace admin;

class Info_Controller extends Controller
{
    protected $infoModel;
    public function __construct()
    {
        $this->infoModel  = $this->model('Info_Model');
    }
    public function index()
    {
        $email = $_SESSION['user']['email'];
        $info = $this->infoModel->getInfo($email);
        $this->view('info', [
            'info' => $info
        ]);
    }
}
