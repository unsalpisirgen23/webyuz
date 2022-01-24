<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LastInsert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Contact\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{


    public function index()
    {
        $contact = get_site_database()->table("contacts")->get();
        return view("admin.contact.index",['contact'=>$contact]);
    }

    public function create()
    {
        return view("admin.contact.create");
    }


    public function store(ContactRequest $request)
    {
        $request->validated();
        $insert =get_site_database()->table("contacts")->insert($request->postTestimonial());
        if ($insert)

            return  redirect()->route("admin.contact.show",LastInsert::get_id());
    }


    public function show($id)
    {
        $contact = get_site_database()->table("contacts")->where('id',"=",$id)->first();
        return  view("admin.contact.show",['contact'=>$contact]);
    }


    public function edit($id)
    {
        $contact =  get_site_database()->table("contacts")->where('id',"=",$id)->first();
        return  view("admin.contact.",['contact'=>$contact]);
    }


    public function update(ContactRequest $request, $id)
    {
        $contact =  get_site_database()->table("contacts")->where('id',"=",$id)->update($request->postTestimonial());
        if ($contact)
        return redirect()->route("admin.contact.show",$id);
    }


    public function destroy($id)
    {
        $delete =  get_site_database()->table("contacts")->where('id',"=",$id)->delete();
        if ($delete)
            return redirect()->route("admin.contact.index");
    }

}
