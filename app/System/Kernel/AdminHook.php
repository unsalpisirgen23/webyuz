<?php

namespace App\System\Kernel;

class AdminHook extends BaseHook
{
    private static $instance;

    public static function install():self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return  self::$instance;
    }
}