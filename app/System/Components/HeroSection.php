<?php

namespace App\System\Components;

class HeroSection extends BaseComponent
{

    public function __construct()
    {

    }

    public function render($args = [])
    {
        return $this->view("contents.hero-section",['args'=>$args])->render();
    }

}
