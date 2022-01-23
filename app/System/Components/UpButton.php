<?php

namespace App\System\Components;

class UpButton extends BaseComponent
{

    public function render($args = [])
    {
        return $this->view("others.up-button",['args'=>$args])->render();
    }
}