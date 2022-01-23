<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function auth;
use function redirect;
use function view;

class TemplateHookController
{

        public function index()
        {
            $template_hooks = DB::table("template_hooks")
                ->join("templates","templates.id","=","template_hooks.template_id")
                ->get([
                    'templates.name as template_name',
                    'template_hooks.action_title as template_action_title',
                    'template_hooks.action_group',
                    'template_hooks.action_status',
                    'template_hooks.id',
                ]);
            return view("admin.TemplateHooks.index",["template_hooks"=>$template_hooks]);
        }

        public function create()
        {
            return view("admin.TemplateHooks.create");
        }

        public function edit($id)
        {
            $template_hook = DB::table("template_hooks")
                ->where("id","=",$id)
                ->first();
            return view("admin.TemplateHooks.edit",['id'=>$id,'template_hook'=>$template_hook]);
        }

        public function store(Request  $request){
          $action_title   = $request->post("action_title");
          $action_group  = $request->post("action_group");
          $action_status  = $request->post("action_status");
          $template_id  = $request->post("template_id");
          DB::table("template_hooks")
              ->insert([
                  'template_id'=>$template_id,
                  "action_title"=>$action_title,
                  'action_group'=>$action_group,
                  'action_status'=>$action_status,
                  'user_id'=>auth()->id()
              ]);
          return redirect()->route("admin.TemplateHooks.index");
        }

        public function update(Request  $request,$id){
            $action_title   = $request->post("action_title");
            $action_group  = $request->post("action_group");
            $action_status  = $request->post("action_status");
            $template_id  = $request->post("template_id");
            DB::table("template_hooks")
                ->where("id","=",$id)
                ->update(['template_id'=>$template_id,"action_title"=>$action_title,'action_group'=>$action_group,'action_status'=>$action_status,'updated_at'=>date('Y-m-d H:i:s')]);
            return redirect()->route("admin.TemplateHooks.index");
        }

        public function destroy($id)
        {
            DB::table("template_hooks")
                ->where("id","=",$id)
                ->delete();
            return redirect()->route("admin.TemplateHooks.index");
        }

}