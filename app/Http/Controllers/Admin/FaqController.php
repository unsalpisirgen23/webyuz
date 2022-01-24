<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\FaqRequest;

class FaqController extends Controller
{

    public function index()
    {
        $faqs =   get_site_database()->table("faqs")->get();
        return  view("admin.faqs.index",['faqs'=>$faqs]);
    }


    public function create()
    {
        return view("admin.faqs.create");
    }

    public function store(FaqRequest $request)
    {
        $request->validated();
        $insert =   get_site_database()->table("faqs")->insert($request->postFaq());
        if ($insert)
            return  redirect()->route("admin.faqs.show",LastInsert::get_id());
    }

    public function show($id)
    {
        $faq =   get_site_database()->table("faqs")->where('id',"=",$id)->first();
        return view("admin.faqs.show",['faq'=>$faq]);
    }

    public function edit($id)
    {
        $faq =  get_site_database()->table("faqs")->where('id',"=",$id)->first();
        return view("admin.faqs.edit",['faq'=>$faq]);
    }


    public function update(FaqRequest $request, $id)
    {
         $request->validated();
         $update =  get_site_database()->table("faqs")->where('id','=',$id)->update($request->postFaq());
             return  redirect()->route("admin.faqs.show",$id);
    }

    public function destroy($id)
    {
        $delete =  get_site_database()->table("faqs")->where('id','=',$id)->delete();
        if ($delete)
            return  redirect()->route("admin.faqs.index");
    }

}
