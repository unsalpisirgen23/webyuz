<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class LastInsert
{
    public static function get_id()
    {
       return  get_site_database()->getPdo()->lastInsertId();
    }
}