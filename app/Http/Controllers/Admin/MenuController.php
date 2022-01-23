<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index()
    {
        $menus = DB::connection("user_database")->table("menus")->get();
        return view("admin.menus.index");
    }


    public function create()
    {
        return  view("admin.menus.create");
    }

    public function store(MenuRequest $request)
    {
        $insert = DB::connection("user_database")->table("menus")->insert($request->postMenu());
        if ($insert)
            return  redirect()->route("admin.menus.show",LastInsert::get_id());
    }

    public function show($id)
    {
        $menu = DB::connection("user_database")->table("menus")->where('id',"=",$id)->first();
        return  view("admin.menus.show",['menu'=>$menu]);
    }


    public function edit($id)
    {
        $menu = DB::connection("user_database")->table("menus")->where('id',"=",$id)->first();
        return  view("admin.menus.edit",['menu'=>$menu]);
    }


    public function update(MenuRequest $request, $id)
    {
        $request->validated();
        $update = DB::connection("user_database")->table("menus")->where("'id",'=',$id)->update($request->postMenu());
        if ($update)
            return  redirect()->route("admin.menus.show",['id'=>$id]);
    }


    public function destroy($id)
    {
        $delete = DB::connection("user_database")->table("menus")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.menus.index");
    }

}
