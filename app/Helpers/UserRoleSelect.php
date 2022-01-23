<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class UserRoleSelect
{
    public static function get($id,$user_id)
    {
        if (DB::table("user_role_users")->where("role_id","=",$id)->where("user_id","=",$user_id)->get()->count() > 0)
        {
            return true;
        }
        return  false;
    }
}