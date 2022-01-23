<?php

namespace Modules\Teams\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamsController
{

        public function index()
        {
             $teams = DB::table("teams")->get();
            return teams_view("index",['teams'=>$teams]);
        }

        public function create()
        {
            return teams_view("create");
        }

        public function edit($id)
        {
            $service = DB::table("teams")->where("id","=",$id)->first();
            return teams_view("edit",['id'=>$id,'service'=>$service]);
        }

        public function store(Request  $request){

          $title  = $request->post("title");
          $content  = $request->post("content");
          $image  = $request->post("image");
            $facebook  = $request->post("facebook");
            $twitter  = $request->post("twitter");
            $instagram  = $request->post("instagram");
          DB::table("teams")->insert(['title'=>$title,'content'=>$content,'image'=>$image,'facebook'=>$facebook,'twitter'=>$twitter,'instagram'=>$instagram]);
          return teams_go_route("index");
        }

        public function update(Request  $request,$id){
            $title  = $request->post("title");
            $content  = $request->post("content");
            $image  = $request->post("image");
            $facebook  = $request->post("facebook");
            $twitter  = $request->post("twitter");
            $instagram  = $request->post("instagram");
            DB::table("teams")->where("id","=",$id)->update(['title'=>$title,'content'=>$content,'image'=>$image,'facebook'=>$facebook,'twitter'=>$twitter,'instagram'=>$instagram,'updated_at'=>date('Y-m-d H:i:s')]);
            return teams_go_route("index");
        }

        public function destroy($id)
        {
            DB::table("teams")->where("id","=",$id)->delete();
            return teams_go_route("index");
        }

}