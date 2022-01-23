<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{

    public function index()
    {

        $comments = DB::connection("user_database")->table("comments")->get();
        return  view("admin.comments.index",['comments'=>$comments]);
    }


    public function create()
    {}

    public function store(CommentRequest $request)
    {
        $request->validated();
        $add = DB::connection("user_database")->table("comments")->insert($request->postComment());
        if ($add)
            return redirect()->route("admin.comments.show",LastInsert::get_id());
    }


    public function show($id)
    {

        $comment = DB::connection("user_database")->table("comments")->where('id',"=",$id)->first();
        return view("admin.comments.show",['comment'=>$comment]);
    }


    public function edit($id)
    {
        $comment = DB::connection("user_database")->table("comments")->where('id',"=",$id)->first();
        return view("admin.comments.edit",['comment'=>$comment]);
    }


    public function update(CommentRequest $request, $id)
    {
        $request->validated();
         $comment = [];
         $comment["comment"] = $request->post("comment");
         $comment["status"] = $request->post("status");
         $comment["updated_at"] = date('Y-m-d H:i:s');
         $update = DB::connection("user_database")->table("comments")->where('id','=', $id)->update($comment);
         if ($update)
             return redirect()->route("admin.comments.show",$id)->with("success","Tebrikler yorum başarıyla güncellendi.");
    }


    public function destroy($id)
    {
       $delete = DB::connection("user_database")->table("comments")->where('id',"=",$id)->delete();
       if ($delete)
           return  redirect()->route("admin.comments.index")->with("success","Tebrikler yorum başarıyla silindi.");
    }
}
