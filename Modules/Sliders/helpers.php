<?php

use Illuminate\Support\Facades\Schema;

if (!function_exists("admin_sliders_function")){
    function admin_sliders_function()
    {
        admin_sidebar_menu("Sliderlar","fas fa-forward",[
            [
                'link'=>route("modules.sliders.create"),
                'title'=>"Slider Ekle"
            ],        [
                'link'=>route("modules.sliders.index"),
                'title'=>"Slider Listele"
            ],
        ]);
    }
}

adminHook()->addAction("admin_menu_bar","admin_sliders_function",64);


if (!function_exists("get_slider_function"))
{
    function get_slider_function($params = ['view'=>"slider"]){

        if (Schema::hasTable("sliders"))
        {
           $sliders = Modules\Sliders\Models\Slider::all();
           if ($sliders->count() > 0)
           {
               if (file_exists(base_path("resources/views/templates/".\App\Helpers\Template::isActive()."/".str_replace(["."],["/"],$params["view"]).".blade.php"))){
                   $view = \App\Helpers\Template::renderView($params['view'],['sliders'=>$sliders]);
                   return $view;
               }
           }
        }
    }
}

addAction("get_slider_widget","get_slider_function");

