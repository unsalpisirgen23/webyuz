<?php

namespace App\System\Components;

class AboutPage extends BaseComponent
{

    public function __construct()
    {

    }

    public function render($args = [])
    {
       // print_r()
        $sliders = get_site_database()->table("pages")->where("status","=",1)->get();
        if ($sliders)
        {
            return $this->view("contents.about-page",['args'=>$args,'sliders'=>$sliders])->render();
        }
    }


}