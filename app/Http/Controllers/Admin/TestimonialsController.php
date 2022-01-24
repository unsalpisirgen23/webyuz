<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\TestimonialsRequest;

class TestimonialsController extends Controller
{


    public function index()
    {
        $testimonials = get_site_database()->table("testimonials")->get();
        return view("admin.testimonials.index",['testimonials'=>$testimonials]);
    }

    public function create()
    {
        return view("admin.testimonials.create");
    }


    public function store(TestimonialsRequest $request)
    {
        $request->validated();
        $insert = get_site_database()->table("testimonials")->insert($request->postTestimonial());
        if ($insert)

            return  redirect()->route("admin.testimonials.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $testimonial = get_site_database()->table("testimonials")->where('id',"=",$id)->first();
        return  view("admin.testimonials.show",['testimonial'=>$testimonial]);
    }


    public function edit($id)
    {
        $testimonial =get_site_database()->table("testimonials")->where('id',"=",$id)->first();
        return  view("admin.testimonials.edit",['testimonial'=>$testimonial]);
    }


    public function update(TestimonialsRequest $request, $id)
    {
        $testimonial = get_site_database()->table("testimonials")->where('id',"=",$id)->update($request->postTestimonial());
        if ($testimonial)
            $testimonial = get_site_database()->table("testimonials")->where('id',"=",$id)->first();
        return redirect()->route("admin.testimonials.show",$id);
    }


    public function destroy($id)
    {
        $delete = get_site_database()->table("testimonials")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.testimonials.index");
    }

}
