<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComponentServisProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once base_path("app/helpers.php");
    }
}
