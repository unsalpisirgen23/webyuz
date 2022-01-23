<?php

namespace App\System\Components;

class BaseComponent
{

    public function view($path,$data = [])
    {
        return view("template_components.".$path,$data);
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

}