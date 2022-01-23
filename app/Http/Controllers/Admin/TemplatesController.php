<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = DB::table("templates")->get();
        return view("admin.templates.index",['templates'=>$templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.templates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->post('name');
        $status = $request->post('status');

        $insert = DB::table('templates')->insert(['name'=>$name,'status'=>$status]);

        return redirect()->route('admin.templates.index');

    }


    public function edit($id)
    {

        $template = DB::table('templates')->where('id','=',$id)->first();
        $template_style = DB::table('template_styles')->where('template_id','=',$id)->first();


        return  view("admin.templates.edit",['template'=>$template,'style'=>$template_style]);

    }


    public function update(Request $request, $id)
    {
       // $id     = $request->post("id");
        $status = $request->post("status");
        $name = $request->post('name');
        $style = $request->post('style');
        DB::table('template_styles')->where('template_id','=',$id)->update(['content'=>$style]);
        DB::table("templates")->where("id","=",$id)->update(['status'=>$status,"updated_at" => date('Y-m-d H:i:s'),'name'=>$name]);
        return  redirect()->route("admin.templates.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('templates')->where('id','=',$id)->delete();
      return redirect()->route('admin.templates.index');
    }
}
