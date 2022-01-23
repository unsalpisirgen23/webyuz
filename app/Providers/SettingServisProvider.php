<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServisProvider extends ServiceProvider
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
        if (Schema::hasTable("settings")){
            $settings =  Setting::all()->toArray();
            if (array_key_exists(0,$settings))
            {
                $settings = $settings[0];
            }
            if ($settings){
                Config::set("settings",$settings);
            }
        }
    }

}
