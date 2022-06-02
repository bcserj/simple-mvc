<?php

namespace App\Controllers\Ajax;

use Core\BaseController;
use Core\View;

class Main extends BaseController
{

    public static function index()
    {

        View::render('ajax/index.php');
    }

}