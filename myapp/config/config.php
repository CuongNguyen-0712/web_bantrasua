<?php
define("APP_ROOT", dirname(dirname(__FILE__, 1)));

//define đường dẫn nhanh tới assets
define('ROOT', str_replace('\\', '/', __DIR__));
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(ROOT));
define('ASSETS', $web_root . $folder . '/../public/assets/');

class Config
{
    public static function getDatabaseConfig()
    {
        return [
            'host' => 'localhost',
            'name' => 'clover_tea',
            'user' => 'root',
            'pass' => '',
        ];
    }
}