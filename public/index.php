<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../helpers.php";
require_once "../vendor/autoload.php";

use \Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection(\App\Config::getInstance()->getDBConfig());
$capsule->setAsGlobal();
$capsule->bootEloquent();


$router = new Core\Router();

$router->addRoute('/', \App\Controllers\Main::class, "index");
$router->addRoute('/ajax', \App\Controllers\Ajax\Main::class, "index");

$router->dispatch($_SERVER["REQUEST_URI"]);
