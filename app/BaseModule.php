<?php

namespace App;

abstract class BaseModule
{
    public $mergeConfigFrom;
    public $loadRoutesFrom;
    public $loadMigrationsFrom;
    public $loadViewsFrom;
   abstract public function init();
}