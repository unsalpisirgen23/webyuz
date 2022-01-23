<?php

namespace App\Providers;

use App\Helpers\Template;
use App\Widgets\BaseWidget;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if("permission",function ($name,$group){
                return permission($name,$group);
        });

        if (Schema::hasTable("templates")){
         //   Template::get_functionS();
         //   Template::serviceProvider();
        }

        require_once  base_path("app/widgets.php");

    }

}
