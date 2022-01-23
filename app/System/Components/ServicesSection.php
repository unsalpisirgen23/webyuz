<?php

namespace App\System\Components;

class ServicesSection extends BaseComponent
{


    public function render($args = [])
    {
        return $this->view("contents.service-section",['args'=>$args])->render();
    }
}