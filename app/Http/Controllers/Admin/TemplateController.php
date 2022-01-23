<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Template;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{


    public function index()
    {
               $templates = DB::table("templates")->get();
            return view("admin.appearance.templates.index",['templates'=>$templates]);
    }

    public function update(Request  $request){
            $id     = $request->post("id");
            $status = $request->post("status");
            DB::table("templates")->update(['status'=>0,"updated_at" => date('Y-m-d H:i:s')]);
            DB::table("templates")->where("id","=",$id)->update(['status'=>$status,"updated_at" => date('Y-m-d H:i:s')]);
          return  redirect()->route("admin.appearance.temps.index");
    }





}
