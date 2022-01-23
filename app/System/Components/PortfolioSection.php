<?php

namespace App\System\Components;

class PortfolioSection extends BaseComponent
{

    public function render($args = [])
    {
        return $this->view("contents.portfolio-section",['args'=>$args])->render();
    }
}