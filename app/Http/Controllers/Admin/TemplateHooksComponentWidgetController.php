<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function auth;
use function redirect;
use function view;

class TemplateHooksComponentWidgetController
{

        public function index()
        {
            if (Schema::hasTable("component_widgets") && Schema::hasTable("template_hooks")){
                $templateHooksComponentWidgets = DB::table("template_hooks_component_widgets")
                    ->join('component_widgets', 'component_widgets.id', '=', 'template_hooks_component_widgets.component_widget_id')
                    ->join('template_hooks', 'template_hooks.id', '=', 'template_hooks_component_widgets.template_hooks_id')
                   ->join("templates","templates.id","=","template_hooks_component_widgets.template_id")
                    ->get(['template_hooks_component_widgets.id as thcw_id',
                        'template_hooks_component_widgets.*',
                        'component_widgets.component_title as component_title',
                        'component_widgets.component_name as component_name',
                        'component_widgets.component_group as component_group',
                        'template_hooks.action_title as action_title',
                        'template_hooks.action_group as action_group',
                        'templates.name as template_name'
                    ]);

                return view("admin.TemplateHooksComponentWidgets.index",
                    ["templateHooksComponentWidgets"=>$templateHooksComponentWidgets]);
            }
        }

        public function create()
        {
            if (Schema::hasTable("component_widgets") && Schema::hasTable("template_hooks"))
            {
                $component_widgets = DB::table("component_widgets")
                    ->get();
                $template_hooks = DB::table("template_hooks")
                    ->get();
                return view("admin.TemplateHooksComponentWidgets.create",[
                    'component_widgets'=>$component_widgets,'template_hooks'=>$template_hooks]);
            }
        }

        public function edit($id)
        {
            if (Schema::hasTable("component_widgets") && Schema::hasTable("template_hooks")){

                $templateHooksComponentWidget = DB::table("template_hooks_component_widgets")
                    ->where("id","=",$id)
                    ->first();

                $component_widgets = DB::table("component_widgets")
                    ->where("user_id","=",auth()->id())
                    ->get();

                $template_hooks = DB::table("template_hooks")
                    ->where("user_id","=",auth()->id())
                    ->get();

                return view("admin.TemplateHooksComponentWidgets.edit",
                    ['id'=>$id,
                        'templateHooksComponentWidget'=>$templateHooksComponentWidget,
                        'component_widgets'=>$component_widgets,
                        'template_hooks'=>$template_hooks
                        ]);
            }
        }

        public function store(Request  $request){
          $template_hooks_id   = $request->post("template_hooks_id");
          $component_widget_id  = $request->post("component_widget_id");
          $status  = $request->post("status");
          $component_style  = $request->post("component_style");
          $template_id  = $request->post("template_id");

          DB::table("template_hooks_component_widgets")
              ->insert([
                  "template_hooks_id"=>$template_hooks_id,
                  'component_widget_id'=>$component_widget_id,
                  'status'=>$status,
                  'component_style'=>$component_style,
                  'template_id'=>$template_id
              ]);
          return redirect()->route("admin.TemplateHooksComponentWidgets.index");
        }

        public function update(Request  $request,$id){
            $template_hooks_id   = $request->post("template_hooks_id");
            $component_widget_id  = $request->post("component_widget_id");
            $status  = $request->post("status");
            $component_style  = $request->post("component_style");
            $template_id  = $request->post("template_id");

            DB::table("template_hooks_component_widgets")
                ->where("id","=",$id)
                ->update([
                    "template_hooks_id"=>$template_hooks_id,
                    'component_widget_id'=>$component_widget_id,
                    'status'=>$status,
                    'component_style'=>$component_style,
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'template_id'=>$template_id
                ]);
            return redirect()->route("admin.TemplateHooksComponentWidgets.index");
        }

        public function destroy($id)
        {
            DB::table("template_hooks_component_widgets")
                ->where("id","=",$id)
                ->delete();
            return redirect()->route("admin.TemplateHooksComponentWidgets.index");
        }

}