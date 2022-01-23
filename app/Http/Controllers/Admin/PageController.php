<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function index()
    {
        $pages = DB::connection("user_database")->table("pages")->get();
        return  view("admin.pages.index",['pages'=>$pages]);
    }


    public function create()
    {
        return view("admin.pages.create");
    }

    public function store(PageRequest $request)
    {
        $request->validated();
        $insert = DB::connection("user_database")->table("pages")->insert($request->postPage());
        if ($insert)
            return  redirect()->route("admin.pages.show",LastInsert::get_id());
    }

    public function show($id)
    {
        $page = DB::connection("user_database")->table("pages")->where('id',"=",$id)->first();
        return view("admin.pages.show",['page'=>$page]);
    }

    public function edit($id)
    {
        $page = DB::connection("user_database")->table("pages")->where('id',"=",$id)->first();
        return view("admin.pages.edit",['page'=>$page]);
    }


    public function update(PageRequest $request, $id)
    {
         $request->validated();
         $update = DB::connection("user_database")->table("pages")->where('id','=',$id)->update($request->postPage());
             return  redirect()->route("admin.pages.show",$id);
    }

    public function destroy($id)
    {
        $delete = DB::connection("user_database")->table("pages")->where('id','=',$id)->delete();
        if ($delete)
            return  redirect()->route("admin.pages.index");
    }

}
