<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServicesTableController
{

        public function index()
        {
            $customFields = get_site_database()->table("services")->get();
            return services_view("index",['services'=>$customFields]);
        }

        public function create()
        {
            return services_view("create");
        }

        public function edit($id)
        {
            $customField = get_site_database()->table("services")->where("id","=",$id)->first();
            return services_view("edit",['id'=>$id,'service'=>$customField]);
        }

        public function store(Request  $request){

          $title  = $request->post("title");
          $content  = $request->post("content");
          $image  = $request->post("image");
            get_site_database()->table("services")->insert(['title'=>$title,'content'=>$content,'image'=>$image]);
          return services_go_route("index");
        }

        public function update(Request  $request,$id){
            $title  = $request->post("title");
            $content  = $request->post("content");
            $image  = $request->post("image");
            get_site_database()->table("services")->where("id","=",$id)->update(['title'=>$title,'content'=>$content,'image'=>$image,'updated_at'=>date('Y-m-d H:i:s')]);
            return services_go_route("index");
        }

        public function destroy($id)
        {
            get_site_database()->table("services")->where("id","=",$id)->delete();
            return services_go_route("index");
        }

}