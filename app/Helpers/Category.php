<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Category
{


    public static function get_option($parent = 0,$st = 0)
    {
            $categories = DB::table("categories")->where('parent_id',"=",$parent)->get();
            if ($categories->count() > 0){
                foreach ($categories as $category)
                {
                    echo '<option value="'.$category->id.'" > '.str_repeat('-',$st).$category->name.'</option>';
                    self::get_option($category->id,+2);
                }
            }
            else
            {
                return false;
            }
    }

    public static function get_options($id = 0)
    {
            $categories = DB::table("categories")->where('status',"=",1)->get();
            if ($categories->count() > 0){
                foreach ($categories as $category)
                {
                    echo '<option value="'.$category->id.'" '.($id == $category->id ? "selected" : null ).' >'.$category->name.'</option>';
                }
            }
    }


    public static function get_category($id,$property){

       $category =  DB::table("categories")->where('id',"=",$id)->first();
        if (isset($category->$property))
            return $category->$property;
    }


    public static function get_gallery_options($id = 0)
    {
        $categories = DB::table("gallery_categories")->get();
        if ($categories->count() > 0){
            foreach ($categories as $category)
            {
                echo '<option value="'.$category->id.'" '.($id == $category->id ? "selected" : null ).' >'.$category->name.'</option>';
            }
        }
    }


}