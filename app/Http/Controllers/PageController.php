<?php

namespace App\Http\Controllers;

use App\Helpers\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
        public function index($link)
        {
            $page = DB::table("pages")->where("status","=",1)->where("link","=",$link)->first();
            return Template::view("page_detail",['page'=>$page]);
        }

        public function detail($link)
        {
            return view("templates.page_detail",['link'=>$link]);
        }

}
