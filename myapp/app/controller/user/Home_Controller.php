<?php

class Home_Controller
{
    private $pdo;

    public function index()
    {

        include __DIR__ . '/../../views/index.php';
    }

}

?>