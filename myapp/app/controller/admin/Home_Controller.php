<?php

namespace admin;

class Home_Controller extends Controller
{
    protected $target;
    public function index()
    {
        $this->target = 'info';
        $this->view('index', ['page' => $this->target]);
    }

    public function order()
    {
        $this->target = 'order';
        $this->view('index', ['page' => $this->target]);
    }

    public function user()
    {
        $this->target = 'user';
        $this->view('index', ['page' => $this->target]);
    }

    public function statistics()
    {
        $this->target = 'statistics';
        $this->view('index', ['page' => $this->target]);
    }
}