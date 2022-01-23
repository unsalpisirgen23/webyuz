<?php

namespace Modules\Testimonials\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Testimonials\TestimonialsRequest;

class TestimonialsController extends Controller
{


    public function index()
    {
        $testimonials = DB::table("testimonials")->get();
        return view("testimonials::index",['testimonials'=>$testimonials]);
    }

    public function create()
    {
        return view("testimonials::create");
    }


    public function store(TestimonialsRequest $request)
    {
        $request->validated();
        $insert = DB::table("testimonials")->insert($request->postTestimonial());
        if ($insert)

            return  redirect()->route("modules.testimonials.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $testimonial = DB::table("testimonials")->where('id',"=",$id)->first();
        return  view("testimonials::show",['testimonial'=>$testimonial]);
    }


    public function edit($id)
    {
        $testimonial = DB::table("testimonials")->where('id',"=",$id)->first();
        return  view("testimonials::edit",['testimonial'=>$testimonial]);
    }


    public function update(TestimonialsRequest $request, $id)
    {
        $testimonial = DB::table("testimonials")->where('id',"=",$id)->update($request->postTestimonial());
        if ($testimonial)
            $testimonial = DB::table("testimonials")->where('id',"=",$id)->first();
        return redirect()->route("modules.testimonials.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("testimonials")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.testimonials.index");
    }

}
