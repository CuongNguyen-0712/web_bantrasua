<?php

class Controller
{
    // Load model
    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model();
    }

    // Load view 
    public function view($view, $data = [])
    {
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}