<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\SliderRequest;

class ScrollingPicturesController extends Controller
{


    public function index()
    {
        $scrollingPictures = get_site_database()->table("scrolling_pictures")->get();
        return view("admin.scrollingPictures.index",['scrollingPictures'=>$scrollingPictures]);
    }

    public function create()
    {
        return view("admin.scrollingPictures.create");
    }


    public function store(SliderRequest $request)
    {
        $request->validated();
        $insert = get_site_database()->table("scrolling_pictures")->insert($request->postSlider());
        if ($insert)

            return  redirect()->route("admin.scrollingPictures.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $scrollingPictures = get_site_database()->table("scrolling_pictures")->where('id',"=",$id)->first();
        return  view("admin.scrollingPictures.show",['scrollingPictures'=>$scrollingPictures]);
    }


    public function edit($id)
    {
        $scrollingPicture = get_site_database()->table("scrolling_pictures")->where('id',"=",$id)->first();
        return  view("admin.scrollingPictures.edit",['scrollingPicture'=>$scrollingPicture]);
    }


    public function update(SliderRequest $request, $id)
    {
        $scrollingPictures = get_site_database()->table("scrolling_pictures")->where('id',"=",$id)->update($request->postSlider());
        if ($scrollingPictures)
        $scrollingPictures = get_site_database()->table("scrolling_pictures")->where('id',"=",$id)->first();
            return redirect()->route("admin.scrollingPictures.show",$id);
    }


    public function destroy($id)
    {
        $delete = get_site_database()->table("scrolling_pictures")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.scrollingPictures.index");
    }

}
