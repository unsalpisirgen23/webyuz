<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = get_site_database()->table("posts")->get();
        if ($posts)
           return view("admin.posts.index",['posts'=>$posts]);
    }

    public function create()
    {
        return  view("admin.posts.create");
    }


    public function store(PostRequest $request)
    {
        $request->validated();
        $posts = $request->postPost();
        $posts["user_id"] = \auth()->id();
        $posts["created_at"] = date('Y-m-d H:i:s');
        $insert =  get_site_database()->table("posts")->insert($posts);
        if ($insert)
            return redirect()->route("admin.posts.show",LastInsert::get_id())->with('success',"Tebrikler içerik başarıyla eklendi.");
    }


    public function show($id)
    {
        $post = get_site_database()->table("posts")->where('id',"=",$id)->first();
            return view("admin.posts.show",['post'=>$post]);
    }


    public function edit($id)
    {
        $post =  get_site_database()->table("posts")->where('id',"=",$id)->first();
        return view("admin.posts.edit",['post'=>$post]);
    }


    public function update(PostRequest $request, $id)
    {
        $request->validated();
        $posts = $request->postPost();
        $posts["updated_at"] = date('Y-m-d H:i:s');
        $update =  get_site_database()->table("posts")->where('id',"=",$id)->update($posts);
        if ($update)
            return  redirect()->route("admin.posts.show",$id)->with('success',"Tebrikler içerik başarıyla güncellendi");
    }


    public function destroy($id)
    {
        $delete =  get_site_database()->table("posts")->where('id',"=",
        $id)->delete();
        if ($delete)
            return  redirect()->route("admin.posts.index")->with('success',"Tebrikler içerik başarıyla silindi.");
    }
}
