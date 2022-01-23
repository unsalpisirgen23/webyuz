<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use function Composer\Autoload\includeFile;

class Post
{

    public static function get_user_name($id)
    {
        $user = DB::table('users')->where('id', $id)->first("name as user_fullname");
        if ($user)
            return $user->user_fullname;
    }

    public static function get_category_name($id)
    {
        $post = DB::table('categories')->where('id', $id)->first("name");
        if ($post)
            return $post->name;
    }

    public static function get_name($id)
    {
        $post = DB::table('posts')->where('id', $id)->first("title");
        if ($post)
            return $post->title;
    }

}