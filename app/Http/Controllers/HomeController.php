<?php

namespace App\Http\Controllers;

use App\Helpers\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class HomeController extends Controller
{

    public function index()
    {
        return view("templates.index");
    }

    public function subdomain($domain){


            return view('templates.index',['domain'=>$domain]);

    }


}
