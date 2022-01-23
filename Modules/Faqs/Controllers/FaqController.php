<?php

namespace Modules\Faqs\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Faqs\FaqRequest;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = DB::table("faqs")->get();
        return  view("faqs::index",['faqs'=>$faqs]);
    }


    public function create()
    {
        return view("faqs::create");
    }

    public function store(FaqRequest $request)
    {
        $request->validated();
        $insert = DB::table("faqs")->insert($request->postFaq());
        if ($insert)
            return  redirect()->route("modules.faqs.show",LastInsert::get_id());
    }

    public function show($id)
    {
        $faq = DB::table("faqs")->where('id',"=",$id)->first();
        return view("faqs::show",['faq'=>$faq]);
    }

    public function edit($id)
    {
        $faq = DB::table("faqs")->where('id',"=",$id)->first();
        return view("faqs::edit",['faq'=>$faq]);
    }


    public function update(FaqRequest $request, $id)
    {
         $request->validated();
         $update = DB::table("faqs")->where('id','=',$id)->update($request->postFaq());
             return  redirect()->route("modules.faqs.show",$id);
    }

    public function destroy($id)
    {
        $delete = DB::table("faqs")->where('id','=',$id)->delete();
        if ($delete)
            return  redirect()->route("modules.faqs.index");
    }

}
