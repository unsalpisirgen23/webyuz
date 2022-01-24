<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Data;
use App\Helpers\Permalink;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        return view("admin.categories.index");
    }

    public function indexAjax()
    {
        return datatables(get_site_database()->table("categories")->get())->make(true);
    }

    public function parent_index(Request  $request)
    {
        $category = get_site_database()->table("categories");
        $category->where('id',"=",$request->post("id"));
     return json_encode($category->first());
    }

    public function parent_create(Request  $request)
    {
        $name = $request->post("name");
        $id = $request->post("parent_id");
        $status = $request->post("status");
        $category = get_site_database()->table("categories")->insert([
                'name'=>$name,
            'parent_id'=>$id,
            'status'=>$status
        ]);
        return ['success'=>"Tebrikler Kategori Başarıyla Eklen."];
    }


    public function option_select()
    {
        $categories = get_site_database()->table("categories")->get();
        $response = [];
        foreach ($categories as $category)
        {
            $response[] = [
            'name'=>$category->name,
                'id'=>$category->id
            ];
        }
     return json_encode($response);
    }



    public function create()
    {
        return view("admin.categories.create");
    }


    public function store(CategoryRequest $request)
    {
        $request->validated();
print_r($request->postCategory());
        $insert = get_site_database()->table("categories")->insert($request->postCategory());
        if ($insert)
            return redirect()->route("admin.categories.show",get_site_database()->getPdo()->lastInsertId());
    }


    public function show($id)
    {
        if($id != null){
            config()->set("database.connections.user_database.database",session()->get("database_name"));
            $category = DB::connection("user_database")->table("categories")->where('id',"=",$id)->first();
            return view("admin.categories.show",['category'=>$category]);
        }
    }


    public function edit(Request $request,$id)
    {
        config()->set("database.connections.user_database.database",session()->get("database_name"));
        $category = DB::connection("user_database")->table("categories")->where('id',"=",$request->get("id"))->first();
        echo json_encode($category);
    }


    public function update(Request $request, $id)
    {
        config()->set("database.connections.user_database.database",session()->get("database_name"));
            $id = $request->post("id");
            $name = $request->post("name");
            $status = $request->post("status");
            $update = DB::connection("user_database")->table("categories")->where('id', "=", $id)->update([
                'name'=>$name,
                'status'=>$status,
                'link'=>Permalink::get($name)
            ]);
            if ($update)
            return json_encode(['success'=>"Tebrikler Kategori Başarıyla Güncellendi."]);
    }


    public function destroy(Request $request,$id)
    {
        config()->set("database.connections.user_database.database",session()->get("database_name"));
        $delete = DB::connection("user_database")->table("categories")->where("id","=",$request->post("id"))->delete();
        if ($delete)
            return  json_encode(['success'=>"Tebrikler kategori başarıyla silindi."]);
    }


    public function all_delete(Request $request)
    {
        config()->set("database.connections.user_database.database",session()->get("database_name"));
        $ids = $request->post("ids");
        $delete = "";
        foreach ($ids as $id)
        {
            $delete = DB::connection("user_database")->table("categories")->where("id","=",$id)->delete();
        }
        if ($delete)
            return redirect()->route("admin.categories.index")->with("success","Tebrikler seçili kategoriler başarıyla silindi.");
    }


}
