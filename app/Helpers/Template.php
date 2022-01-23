<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Template
{

    public static $path;

    public static function serviceProvider()
    {
       $files =  glob(base_path("resources/views/templates").'/*');
       foreach ($files as $file)
       {
             $is = DB::table("templates")->where('name',"=",$file)->get()->count();
            if (!$is)
            {


                DB::table("templates")->insert(['name'=>$file]);
            }
       }
    }

    public static function isActive()
    {
        self::$path = base_path("resources/views/templates");
        $template = DB::table("templates")->where('status',"=","1")->first();
        if ($template){
                return  basename($template->name);
        }
    }

    public static function getById(){
        $template = DB::table("templates")->where('status',"=","1")->first();
        if ($template){
            return  $template->id;
        }
    }

    public static function getAll()
    {
        $template = DB::table("templates")->get();
        if ($template->count() > 0){
            return  $template;
        }
    }

    public static function renderView($path,$data=[])
    {
                $path = "templates.".\App\Helpers\Template::isActive().".".$path;
                return  view($path,$data)->render();
    }

    public static function edit($id,$status)
    {
        DB::table("templates")->update(['status'=>0]);
        DB::table("templates")->where("id","=",$id)->update(['status'=>$status]);
           return true;
    }

    public static function view($path,$data = [])
    {
        self::$path = base_path("resources/views/templates");
        $template = DB::table("templates")->where('status',"=","1")->first();
        if ($template){
            $file = self::$path."/".basename($template->name)."/".$path;
            if (rtrim(str_replace(['.','blade',"php"],['/','',""],$file),'/'))
            {
                return view("templates.".basename($template->name).".".$path,$data);
            }
        }else{
            return  "Site Kapalı Durumda";
        }
    }

    public static function assets($value='')
    {
      $template = DB::table("templates")->where('status',"=","1")->first();
      if ($template){
        return asset("assets/".basename($template->name).'/'.$value);
      }
    }


    public static function get_include($value='')
    {

      $template = DB::table("templates")->where('status',"=","1")->first();
      if ($template){

        return 'templates.'.basename($template->name).'.layouts.'.$value;

      }else{
          return  "Site Kapalı Durumda";
      }
    }

    public static function get_functionS()
    {
        $template = DB::table("templates")->where('status',"=","1")->first();
        if ($template){

            if (file_exists($template->name."/functions.php")){
                require_once $template->name."/functions.php";
            }
        }
    }

}
