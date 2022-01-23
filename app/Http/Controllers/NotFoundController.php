<?php

namespace App\Http\Controllers;

use App\Helpers\Template;
use Illuminate\Http\Request;

class NotFoundController extends Controller
{
        public function index()
        {
          return Template::view("404");
        }
}
