<?php

namespace App;

class Config
{
    private static $instance;

    private string $dbDriver = '';
    private string $host = '';
    private string $dbName = '';
    private string $dbUser = '';
    private string $dbUserPass = '';


    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDBConfig()
    {
        return [
            'driver' => $this->dbDriver,
            "host" => $this->host,
            "database" => $this->dbName,
            "username" => $this->dbUser,
            "password" => $this->dbUserPass
        ];
    }

    public function getControllersNamespace(): string
    {
        return 'App\Controllers';
    }

    public function getViewsDir(): string
    {
        return dirname(__DIR__) . "/resources/views/";
    }
}
