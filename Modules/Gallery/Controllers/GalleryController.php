<?php

namespace Modules\Gallery\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Gallery\GalleryRequest;

class GalleryController extends Controller
{


    public function index()
    {
        $gallery = DB::table("galleries")->get();
        return view("gallery::index",['galleries'=>$gallery]);
    }

    public function create()
    {
        return view("gallery::create");
    }


    public function store(GalleryRequest $request)
    {
        $request->validated();
        $insert = DB::table("galleries")->insert($request->postGallery());
        if ($insert)

            return  redirect()->route("modules.gallery.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $gallery = DB::table("galleries")->where('id',"=",$id)->first();
        return  view("gallery::show",['gallery'=>$gallery]);
    }


    public function edit($id)
    {
        $gallery = DB::table("galleries")->where('id',"=",$id)->first();
        return  view("gallery::edit",['gallery'=>$gallery]);
    }


    public function update(GalleryRequest $request, $id)
    {
        $gallery = DB::table("galleries")->where('id',"=",$id)->update($request->postGallery());
        if ($gallery)
        return redirect()->route("modules.gallery.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("galleries")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.gallery.index");
    }






}
