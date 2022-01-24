<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;

class SliderController extends Controller
{


    public function index()
    {
        $sliders =  get_site_database()->table("sliders")->get();
        return view("admin.sliders.index",['sliders'=>$sliders]);
    }

    public function create()
    {
        return view("admin.sliders.create");
    }

    public function store(SliderRequest $request)
    {
        $request->validated();
        $insert =  get_site_database()->table("sliders")->insert($request->postSlider());
        if ($insert)
            return  redirect()->route("admin.sliders.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $slider =   get_site_database()->table("sliders")->where('id',"=",$id)->first();
        return  view("admin.sliders.show",['slider'=>$slider]);
    }


    public function edit($id)
    {
        $slider =  get_site_database()->table("sliders")->where('id',"=",$id)->first();
        return  view("admin.sliders.edit",['slider'=>$slider]);
    }


    public function update(SliderRequest $request, $id)
    {
        $slider =  get_site_database()->table("sliders")->where('id',"=",$id)->update($request->postSlider());
        if ($slider)
            return redirect()->route("admin.sliders.show",$id);
    }


    public function destroy($id)
    {
        $delete =  get_site_database()->table("sliders")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.sliders.index");
    }

}
