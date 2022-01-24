<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\GalleryRequest;



class GalleryController extends Controller
{


    public function index()
    {
        $gallery = get_site_database()->table("galleries")->get();
        return view("admin.gallery.index",['galleries'=>$gallery]);
    }

    public function create()
    {
        return view("admin.gallery.create");
    }


    public function store(GalleryRequest $request)
    {
        $request->validated();
        $insert = get_site_database()->table("galleries")->insert($request->postGallery());
        if ($insert)

            return  redirect()->route("admin.gallery.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $gallery = get_site_database()->table("galleries")->where('id',"=",$id)->first();
        return  view("admin.gallery.show",['gallery'=>$gallery]);
    }


    public function edit($id)
    {
        $gallery = get_site_database()->table("galleries")->where('id',"=",$id)->first();
        return  view("admin.gallery.edit",['gallery'=>$gallery]);
    }


    public function update(GalleryRequest $request, $id)
    {
        $gallery = get_site_database()->table("galleries")->where('id',"=",$id)->update($request->postGallery());
        if ($gallery)
        return redirect()->route("admin.gallery.show",$id);
    }


    public function destroy($id)
    {
        $delete = get_site_database()->table("galleries")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.gallery.index");
    }






}
