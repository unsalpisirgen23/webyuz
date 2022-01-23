<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class LastInsert
{
    public static function get_id()
    {
       return DB::getPdo()->lastInsertId();
    }
}