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
            return view("admin.TemplateHooksComponentWidgets.index");
        }

        public function ajax_index(Request $request)
        {
            $id = $request->post("id");
            if (Schema::hasTable("component_widgets") && Schema::hasTable("template_hooks")){
                $templateHooksComponentWidgets = DB::table("template_hooks_component_widgets")
                    ->join('component_widgets', 'component_widgets.id', '=', 'template_hooks_component_widgets.component_widget_id')
                    ->join('template_hooks', 'template_hooks.id', '=', 'template_hooks_component_widgets.template_hooks_id')
                    ->join("templates","templates.id","=","template_hooks_component_widgets.template_id")
                    ->where('templates.id',"=",$id)
                    ->get(['template_hooks_component_widgets.id as thcw_id',
                        'template_hooks_component_widgets.*',
                        'component_widgets.component_name as component_name',
                        'template_hooks.action_title as action_title',
                        'template_hooks.action_group as action_group',
                        'templates.name as template_name'
                    ]);
                $html = "";
                foreach ($templateHooksComponentWidgets as $templateHooksComponentWidget){
                        $html .= '<tr style="border-bottom: solid 1px #ddd;min-height: 30px;">';
                        $html .='<td style="min-height: 30px;padding: 0px;font-size: 14px;padding-left: 9px;">'.$templateHooksComponentWidget->action_title.'</td>';
                        $html .='<td style="min-height: 30px;padding: 0px;font-size: 12px;">'.  $templateHooksComponentWidget->action_group .'</td>';
                        $html .= '<td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">'.$templateHooksComponentWidget->component_name .'</td>';
                        $html .= '<td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">'. $templateHooksComponentWidget->template_name .'</td>';
                        $html .= '<td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">'.($templateHooksComponentWidget->status == 1 ? "Atif" : "Pasif").'</td>';
                        $html .= '<td style="min-height: 30px;padding: 0px;width: 200px;"><a class="btn btn-primary btn-action m-0 ml-4"  href="'.route("admin.TemplateHooksComponentWidgets.edit",$templateHooksComponentWidget->thcw_id) .'" onclick="confirm(\'Bu düzenlemek istediğinize eminmisiniz?\') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a><a class="btn btn-danger btn-action m-0 ml-4" href="" onclick="event.preventDefault();  confirm(\'Bu silmek istediğinize eminmisiniz?\') ? document.getElementById(\'page-form-'.$templateHooksComponentWidget->thcw_id.').submit() : null " title="Sil"><i class="fas fa-trash"></i></a><form id="page-form-'.$templateHooksComponentWidget->thcw_id.'" action="'. route("admin.TemplateHooksComponentWidgets.destroy",$templateHooksComponentWidget->thcw_id) .'" method="POST" style="display: none;">'.csrf_field().'</form></td>';
                        $html .='</tr>';
                }
                    echo $html;
            }
        }

        public function get_hook(Request $request)
        {
                $template_hooks = DB::table("template_hooks")
                ->where("template_id","=",$request->post('id'))
                ->get();
                $html = "";
            if(isset($template_hooks)){
                foreach($template_hooks as $template_hook){
                    $html .= '<option value="'.$template_hook->id.'">'.$template_hook->action_title.'</option>';
                }
            }
            echo $html;
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