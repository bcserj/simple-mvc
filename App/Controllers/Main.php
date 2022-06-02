<?php

namespace App\Controllers;

use Core\BaseController;
use Core\View;

class Main extends BaseController
{

    public static function index()
    {

        View::render('index.php');
    }

}