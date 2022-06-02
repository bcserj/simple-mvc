<?php

namespace Core;

use App\Config;

class View
{
    protected static $viewDir;

    public static function render($view, $attributes = [])
    {
        self::renderHeader();
        self::renderBody($view, $attributes);
        self::renderFooter();
    }

    protected static function renderHeader()
    {
        self::getRenderFile('base/header.php');

    }

    protected static function renderBody($view, $attributes = [])
    {
        self::getRenderFile($view, $attributes = []);
    }

    protected static function renderFooter()
    {
        self::getRenderFile('base/footer.php');

    }

    protected static function getRenderFile($view, $attributes = [])
    {
        extract($attributes, EXTR_SKIP);

        $file =  Config::getInstance()->getViewsDir() . $view;
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \InvalidArgumentException("{$view} not wound");
        }
    }
}