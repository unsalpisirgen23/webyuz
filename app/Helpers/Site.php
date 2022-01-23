<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Site
{
    public static function get_siteCategories()
    {
      return  DB::table("site_categories")->get();
    }

    public static function get_users()
    {
        return  DB::table("users")->get();
    }

}