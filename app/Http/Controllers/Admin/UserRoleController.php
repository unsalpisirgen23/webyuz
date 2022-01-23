<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{

    public function index()
    {
       $user_roles = DB::table("user_roles")->get();
        return  view("admin.user_roles.index",['user_roles'=>$user_roles]);
    }


    public function create()
    {
        return view("admin.user_roles.create");
    }


    public function store(Request $request)
    {
        $request->validate(['name'=>"required"]);
       $name =  $request->post('name');
       DB::table("user_roles")->insert(['name'=>$name]);
       return redirect()->route("admin.user_roles.index")->with("success","Başarıyla Eklendi");
    }




    public function edit($id)
    {
       $user_role = DB::table("user_roles")->where("id","=",$id)->first();
        return view("admin.user_roles.edit",['user_role'=>$user_role]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(['name'=>"required"]);
        $name =  $request->post('name');
        DB::table("user_roles")->where("id","=",$id)->update(['name'=>$name]);
        return redirect()->route("admin.user_roles.index")->with("success","Başarıyla Güncellendi");
    }

    public function destroy($id)
    {
        DB::table("user_roles")->where("id","=",$id)->delete();
        return redirect()->route("admin.user_roles.index")->with("success","Başarıyla Silindi");
    }

    public function action($id)
    {
        $users = DB::table("users")->where("status","=",1)->get();
        if ($users->count() > 0)
        {
          return  view("admin.role_operations.action",['id'=>$id,'users'=>$users]);
        }
    }

    public function save(Request  $request,$id)
    {
         $user_ids = $request->post("user_id");
         DB::table("user_role_users")->where("role_id","=",$id)->delete();
        if (isset($user_ids))
        {
            foreach ($user_ids as $user_id )
            {
                DB::table("user_role_users")->insert(['role_id'=>$id,"user_id"=>$user_id]);
            }
        }
      return redirect()->route("admin.user_roles.index");
    }

}
