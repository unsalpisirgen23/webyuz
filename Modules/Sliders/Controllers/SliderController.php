<?php

namespace Modules\Sliders\Controllers;
use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Sliders\SliderRequest;

class SliderController extends Controller
{


    public function index()
    {
        $sliders = DB::table("sliders")->get();
        return view("sliders::index",['sliders'=>$sliders]);
    }

    public function create()
    {
        return view("sliders::create");
    }


    public function store(SliderRequest $request)
    {
        $request->validated();
        $insert = DB::table("sliders")->insert($request->postSlider());
        if ($insert)

            return  redirect()->route("modules.sliders.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $slider = DB::table("sliders")->where('id',"=",$id)->first();
        return  view("sliders::show",['slider'=>$slider]);
    }


    public function edit($id)
    {
        $slider = DB::table("sliders")->where('id',"=",$id)->first();
        return  view("sliders::edit",['slider'=>$slider]);
    }


    public function update(SliderRequest $request, $id)
    {
        $slider = DB::table("sliders")->where('id',"=",$id)->update($request->postSlider());
        if ($slider)
        $slider = DB::table("sliders")->where('id',"=",$id)->first();
            return redirect()->route("modules.sliders.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("sliders")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.sliders.index");
    }

}
