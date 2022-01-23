<?php

namespace Modules\ScrollingPictures\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\ScrollingPictures\SliderRequest;

class ScrollingPicturesController extends Controller
{


    public function index()
    {
        $scrollingPictures = DB::table("scrolling_pictures")->get();
        return view("scrollingPictures::index",['scrollingPictures'=>$scrollingPictures]);
    }

    public function create()
    {
        return view("scrollingPictures::create");
    }


    public function store(SliderRequest $request)
    {
        $request->validated();
        $insert = DB::table("scrolling_pictures")->insert($request->postSlider());
        if ($insert)

            return  redirect()->route("modules.scrollingPictures.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $scrollingPictures = DB::table("scrolling_pictures")->where('id',"=",$id)->first();
        return  view("scrollingPictures::show",['scrollingPictures'=>$scrollingPictures]);
    }


    public function edit($id)
    {
        $scrollingPicture = DB::table("scrolling_pictures")->where('id',"=",$id)->first();
        return  view("scrollingPictures::edit",['scrollingPicture'=>$scrollingPicture]);
    }


    public function update(SliderRequest $request, $id)
    {
        $scrollingPictures = DB::table("scrolling_pictures")->where('id',"=",$id)->update($request->postSlider());
        if ($scrollingPictures)
        $scrollingPictures = DB::table("scrolling_pictures")->where('id',"=",$id)->first();
            return redirect()->route("modules.scrollingPictures.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("scrolling_pictures")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.scrollingPictures.index");
    }

}
