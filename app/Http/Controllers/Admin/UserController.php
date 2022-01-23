<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Responses\Admin\UserResponse;
use App\Models\MultiContexts\BbContext;
use App\Models\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->get();

        return view("admin.users.index", ['users' => $users]);
    }


    public function create()
    {

        return view("admin.users.create");
    }


    public function store(UserRequest $request)
    {
        $request->validated();
        $user = DB::table("users")->where("email", "=", $request->post("email"))->first();
        if ($user) {
            return redirect()->route("admin.users.create")->with('error', "Böyle bir kullanıcı var gözüküyor");
        }
        $insert = DB::table("users")->insert($request->postUser());
        if ($insert) {
            return redirect()->route("admin.users.show", LastInsert::get_id())->with('success', "Tebrikler kullanıcı başarıyla eklendi");
        } else {
            return redirect()->route("admin.users.index")->with('error', "Bir sorun oluştu kullanıcı eklenemedi!");
        }
    }


    public function show($id)
    {
        if ($id != null) {
            $user = DB::table('users')
                ->where('id', '=', $id)->first();
            return view("admin.users.show", ['user' => $user]);
        }
    }


    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id', '=', $id)->first();

        return view("admin.users.edit", ['user' => $user]);
    }


    public function profile($id)
    {
        $user = DB::table('users')
            ->where('id', '=', $id)->first();

        return view("admin.users.profile", ['user' => $user]);
    }

    public function update(UserRequest $request, $id)
    {
        $request->validated();
        $update = DB::table("users")->where("id", "=", $id)->update($request->postUserUpdate($id));
        if ($update)
            return redirect()->route("admin.users.show", $id)->with('success', "Tebrikler kullanıcı başarıyla güncellendi");
        else {
            return redirect()->route("admin.users.index")->with('error', "Kullanıcı güncelleme işlemi başarısız oldu!");
        }
    }


    public function destroy($id)
    {
        $delete = DB::table("users")->where('id', '=', $id)->delete();
        if ($delete)
            return redirect()->route("admin.users.index")->with('success', "Tebrikler kullanıcı başarıyla silindi.");
        else
            return redirect()->route("admin.users.index")->with('error', "Bir sorun oluştu kullanıcı silinemedi!");
    }

    public function all_delete(Request $request)
    {
      $ids = $request->post("all-delete");
      if (isset($ids)) {


        $delete = "";
        foreach ($ids as $id)
        {
            $delete = DB::table("users")->where('id', '=', $id)->delete();
        }
        if ($delete)
            return redirect()->route("admin.users.index")->with('success', "Tebrikler kullanıcı başarıyla silindi.");
        else
            return redirect()->route("admin.users.index")->with('error', "Bir sorun oluştu kullanıcı silinemedi!");
        }else{
            return redirect()->route("admin.users.index")->with('error', "Bir sorun oluştu kullanıcı silinemedi!");
        }

}
    public function notifications()
    {
        $users = DB::table("users")->where("status","=",0)->limit(6)->get();
        if ($users->count() > 0)
        {
            foreach ($users as $user) {
                echo '<a href="'.route("admin.users.edit",$user->id).'" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-user" style="text-align: center;line-height: 35px;font-size: 19px;"></i>
                </div>
                <div class="dropdown-item-desc">
                     ('.$user->name.') adlı bir kullanıcı eklendi
                    <div class="time text-primary">'.$user->created_at.'</div>
                </div>
            </a>';
            }
        }
    }


}
