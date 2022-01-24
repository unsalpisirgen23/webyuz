<?php

namespace App\System\Components;

class Features extends BaseComponent
{

    public function __construct()
    {

    }

    public function render($args = [])
    {
        $sliders = get_site_database()->table("sliders")->where("status","=",1)->get();
        if ($sliders)
        {  }
        return $this->view("contents.features",['args'=>$args])->render();
    }

}