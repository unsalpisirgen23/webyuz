<?php

namespace Modules\Contact\Controllers;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Contact\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{


    public function index()
    {
        $contact = DB::table("contacts")->get();
        return view("contact::index",['contact'=>$contact]);
    }

    public function create()
    {
        return view("contact::create");
    }


    public function store(ContactRequest $request)
    {
        $request->validated();
        $insert = DB::table("contacts")->insert($request->postTestimonial());
        if ($insert)

            return  redirect()->route("modules.contact.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $contact = DB::table("contacts")->where('id',"=",$id)->first();
        return  view("contact::show",['contact'=>$contact]);
    }


    public function edit($id)
    {
        $contact = DB::table("contacts")->where('id',"=",$id)->first();
        return  view("contact::edit",['contact'=>$contact]);
    }


    public function update(ContactRequest $request, $id)
    {
        $contact = DB::table("contacts")->where('id',"=",$id)->update($request->postTestimonial());
        if ($contact)
            $contact = DB::table("contacts")->where('id',"=",$id)->first();
        return redirect()->route("modules.contact.show",$id);
    }


    public function destroy($id)
    {
        $delete = DB::table("contacts")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("modules.contact.index");
    }

}
