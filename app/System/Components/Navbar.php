<?php

namespace App\System\Components;

use Illuminate\Support\Facades\DB;

class Navbar extends BaseComponent
{

        public function render($args = [])
        {
            $settings = get_site_database()->table("settings")->first();
            if ($settings)
            {
                $menu = get_nav_menu("header-menu");
                return $this->view("headers.navbar",['args'=>$args,'settings'=>$settings,'menu'=>$menu])->render();
            }
            return $this->view("headers.navbar",['args'=>$args])->render();
        }

}