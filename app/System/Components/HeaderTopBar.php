<?php

namespace App\System\Components;

use Illuminate\Support\Facades\DB;

class HeaderTopBar extends BaseComponent
{

    public function render($args = [])
    {
            $settings = get_site_database()->table("settings")->first();
            if ($settings)
            {
                return $this->view("headers.header-top-bar",['args'=>$args,'settings'=>$settings])->render();
            }
      //  return $this->view("headers.header-top-bar",['args'=>$args])->render();
    }

}