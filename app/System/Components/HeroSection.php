<?php

namespace App\System\Components;

class HeroSection extends BaseComponent
{

    public function __construct()
    {

    }

    public function render($args = [])
    {
        $sliders = get_site_database()->table("sliders")->where("status","=",1)->get();
        if ($sliders)
        {
            return $this->view("contents.hero-section",['args'=>$args,'sliders'=>$sliders])->render();
        }
    }

}
