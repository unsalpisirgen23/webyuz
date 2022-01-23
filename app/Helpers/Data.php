<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Data
{
    public static function get_data($table,$id,$property){
        $data =  DB::table($table)->where('id',"=",$id)->first();
        if (isset($data->$property)){
            return $data->$property;
        }
    }
    public static function get_datas($table){
        $data =  DB::table($table)->get();
        if (isset($data)){
            return $data;
        }
    }
}