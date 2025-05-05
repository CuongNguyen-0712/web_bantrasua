<?php
define("APP_ROOT", dirname(dirname(__FILE__, 1)));
class Config
{
    public static function getDatabaseConfig()
    {
        return [
            'host' => 'localhost',
            'name' => 'web_bantrasua1',
            'user' => 'root',
            'pass' => '',
        ];
    }
}
?>