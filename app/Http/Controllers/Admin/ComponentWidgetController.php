<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Hooks;
use App\System\Kernel\TemplateHook;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ComponentWidgetController
{

        public function index()
        {
            $customFields = DB::table("component_widgets")
                ->get();
            return view("admin.ComponentWidgets.index",['customFields'=>$customFields]);
        }

        public function create()
        {
           $hooks = TemplateHook::install()->getToHooks();
            return view("admin.ComponentWidgets.create",['hooks' => $hooks]);
        }

        public function edit($id)
        {
            $hooks = TemplateHook::install()->getToHooks();
            $customField = DB::table("component_widgets")
                ->where("id","=",$id)
                ->first();
            return view("admin.ComponentWidgets.edit",['id'=>$id,'component_widget'=>$customField,'hooks' => $hooks]);
        }

        public function store(Request  $request){
          $component_name   = $request->post("component_name");
          $component_group  = $request->post("component_group");
          DB::table("component_widgets")->insert(['component_name'=>$component_name,'component_group'=>$component_group]);
            return  redirect()->route("admin.ComponentWidgets.index")->with('success',"Tebrikler Widget başarıyla eklendi");

        }

        public function update(Request  $request,$id){
            $component_name   = $request->post("component_name");
            $component_group  = $request->post("component_group");
            DB::table("component_widgets")->where("id","=",$id)
                ->where("user_id","=",auth()->id())
                ->update(['component_name'=>$component_name,'component_group'=>$component_group,'updated_at'=>date('Y-m-d H:i:s')]);
            return  redirect()->route("admin.ComponentWidgets.index")->with('success',"Tebrikler Widget başarıyla güncellendi");
        }

        public function getIframe(){
            $html  = '<html><head><meta content="width=device-width, initial-scale=1.0" name="viewport">'.doAction("get_script_section")."</head><body>";
            $html .= doAction("get_hero",["style"=>"margin:0px;width:100%;height:100%;"]);
            $html .= doAction("get_style_section")."</body></html>";
            return $html;
        }


        public function destroy($id)
        {
            if (DB::table("template_hooks_component_widgets")->where("component_widget_id","=",$id)->get()->count() < 1)
            {
                DB::table("component_widgets")->where("id","=",$id)
                    ->delete();
                return  redirect()->route("admin.ComponentWidgets.index")->with('success',"Tebrikler Widget başarıyla silindi");
            }
            else{
                return  redirect()->route("admin.ComponentWidgets.index")->with('error',"bu bileşen kullanılıyor bu yüzden bu bileşeni silemezsiniz!");
            }
        }

}