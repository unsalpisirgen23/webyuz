<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        return view("admin.sites.index");
    }

    public function create()
    {
        return view("admin.sites.create");
    }

    public function edit()
    {
        return view("admin.sites.edit");
    }

    public function update()
    {

    }

    public function store(Request $request)
    {

        $title = $request->post("title");
        $site_category_id = $request->post("site_category_id");
        $user_id = $request->post("user_id");
        $domain = $request->post("domain");
        $description = $request->post("description");
        $status = $request->post("status");


    }

    public function destroy()
    {

    }
}
