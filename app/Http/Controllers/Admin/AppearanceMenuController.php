<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Menu;
use App\Helpers\Permalink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppearanceMenuController extends Controller
{
     public function index()
     {
         $menus = DB::table("menus")->get();
         return view("admin.appearance.menus.index",['menus'=>$menus]);
     }

     public function create()
     {
         return view("admin.appearance.menus.create");
     }

     public function store(Request  $request)
     {
             $menuTitle = $request->post("menuTitle");
             $content = json_encode($request->post("content"));
             $menu_link = Permalink::get($menuTitle);
            DB::table("menus")->insert(
             [
                 'status'=>1,
                 'menu_title'=>$menuTitle,
                 'menu_link'=>$menu_link,
                 'content'=>$content
             ]);
            return true;
     }

     public function edit($id)
     {
         $menu = DB::table("menus")->where("id","=",$id)->first();
            if ($menu)
            {
                $menuContent = Menu::getMenuItems(json_decode($menu->content));
                return view("admin.appearance.menus.edit",["content"=>$menuContent,"menu"=>$menu]);
            }
     }

     public function update(Request $request)
     {
         $menuTitle = $request->post("menuTitle");
         $content = json_encode($request->post("content"));
         $menu_link = Permalink::get($menuTitle);
         DB::table("menus")->where("id","=",$request->post("id"))->update(
             [
                 'status'=>1,
                 'menu_title'=>$menuTitle,
                 'menu_link'=>$menu_link,
                 'content'=>$content,
                 "updated_at" => date('Y-m-d H:i:s')
             ]);
         return true;
     }

     public function destroy($id)
     {
         DB::table("menus")->where("id","=",$id)->delete();
         return redirect()->route("admin.appearance.menus.index")->with("success","Tebrikler menü silindi");
     }

}
