<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{

    public function index()
    {
        $tags = DB::connection("user_database")->table("tags")->get();
        return  view("admin.tags.index",$tags);
    }

    public function create()
    {
        return view("admin.tags.create");
    }

    public function store(TagRequest $request)
    {
        $request->validated();
        $insert = DB::connection("user_database")->table("tags")->insert($request->postTag());
        if($insert)
            return redirect()->route("admin.tags.show",['id'=>LastInsert::get_id()]);
    }


    public function show($id)
    {
        $tag = DB::connection("user_database")->table("tags")->where('id',"=",$id)->first();
        return  view("admin.tags.show",['tag'=>$tag]);
    }

    public function edit($id)
    {
        $tag = DB::connection("user_database")->table("tags")->where('id',"=",$id)->first();
        return  view("admin.tags.edit",['tag'=>$tag]);
    }


    public function update(TagRequest $request, $id)
    {
        $request->validated();
        $update = DB::connection("user_database")->table("tags")->where('id',"=",$id)->update($request->postTag());
        if ($update)
            return redirect()->route("admin.tags.show",['id'=>$id]);
    }


    public function destroy($id)
    {
        $delete = DB::connection("user_database")->table("tags")->where('id',"=",$id)->delete();
        if ($delete)
            return  redirect()->route("admin.tags.index");
    }



}
