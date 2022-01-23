<?php

namespace App\Helpers;

class User
{

    public static function get_user_id($post)
    {
        if (isset($post->user_id)){
            return $post->user_id;
        }
        else return  0;
    }

}