<?php

namespace Modules\Gallery\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Gallery\GalleryCategoriesRequest;

class GalleryCategoriesController extends Controller
{


    public function index()
    {
        $gallery_categories = DB::table("gallery_categories")->get();
        return view("gallery::categories.index",['gallery_categories'=>$gallery_categories]);
    }

    public function create()
    {
        return view("gallery::categories.create");
    }


    public function store(GalleryCategoriesRequest $request)
    {

        $request->validated();
        $postCategory = $request->postCategory();
        print_r($postCategory);
         $insert = DB::table("gallery_categories")->insert($postCategory);
          if ($insert)
              return  redirect()->route("modules.gallery.galleryCategories.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $gallery_categories = DB::table("gallery_categories")->where('id',"=",$id)->first();
        return  view("gallery::categories.show",['gallery_categories'=>$gallery_categories]);
    }


    public function edit($id)
    {
        $gallery_categories = DB::table("gallery_categories")->where('id',"=",$id)->first();
        return  view("gallery::categories.edit",['galleryCategories'=>$gallery_categories]);
    }


    public function update(GalleryCategoriesRequest $request, $id)
    {
        $gallery_categories = DB::table("gallery_categories")->where('id',"=",$id)->update($request->postCategory());
        if ($gallery_categories)
            $gallery_categories = DB::table("gallery_categories")->where('id',"=",$id)->first();
        return redirect()->route("modules.gallery.galleryCategories.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("gallery_categories")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.gallery.galleryCategories.index");
    }

}
