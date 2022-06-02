<?php

namespace Core;

class BaseController
{

    public static function __callStatic($method, array $arguments)
    {
    return static::$method(...$arguments);
    }
}