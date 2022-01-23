<?php

namespace App\System\Components;

class Footer extends BaseComponent
{

    public function render($args = [])
    {
        return $this->view("footers.footer",['args'=>$args])->render();
    }
}