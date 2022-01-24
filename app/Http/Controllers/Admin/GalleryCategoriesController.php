<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\GalleryCategoriesRequest;

class GalleryCategoriesController extends Controller
{


    public function index()
    {
        $gallery_categories = get_site_database()->table("gallery_categories")->get();
        return view("admin.gallery.categories.index",['gallery_categories'=>$gallery_categories]);
    }

    public function create()
    {
        return view("admin.gallery.categories.create");
    }


    public function store(GalleryCategoriesRequest $request)
    {

        $request->validated();
        $postCategory = $request->postCategory();
        print_r($postCategory);
         $insert = get_site_database()->table("gallery_categories")->insert($postCategory);
          if ($insert)
              return  redirect()->route("admin.gallery.galleryCategories.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $gallery_categories =get_site_database()->table("gallery_categories")->where('id',"=",$id)->first();
        return  view("admin.gallery.categories.show",['gallery_categories'=>$gallery_categories]);
    }


    public function edit($id)
    {
        $gallery_categories = get_site_database()->table("gallery_categories")->where('id',"=",$id)->first();
        return  view("admin.gallery.categories.edit",['galleryCategories'=>$gallery_categories]);
    }


    public function update(GalleryCategoriesRequest $request, $id)
    {
        $gallery_categories = get_site_database()->table("gallery_categories")->where('id',"=",$id)->update($request->postCategory());
        if ($gallery_categories)
            $gallery_categories = get_site_database()->table("gallery_categories")->where('id',"=",$id)->first();
        return redirect()->route("admin.gallery.galleryCategories.show",$id);
    }


    public function destroy($id)
    {
        $delete = get_site_database()->table("gallery_categories")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.gallery.galleryCategories.index");
    }

}
