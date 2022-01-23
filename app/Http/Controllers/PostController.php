<?php

namespace App\Http\Controllers;

use App\Helpers\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->where('status','=','1')->get();
        $posts = DB::table("posts")->where("status","=",1)->paginate(2);
        if ($posts->count() > 0)
        {


            return Template::view("posts_index",['posts'=>$posts,'categories'=>$categories]);
        }
    }

    public function list($title)
    {
        $categories = DB::table('categories')->where('status','=','1')->get();

        $posts = DB::table("posts")->where("status","=",1)->where("title","like",'%'.$title.'%')->paginate(2);
        if ($posts->count() > 0)
        {


            return Template::view("posts_index",['posts'=>$posts,'categories'=>$categories]);
        }else{
            return redirect()->route('not_found');

        }
    }

    public function detail($link)
    {
        $post = DB::table("posts")
            ->where("status","=",1)
            ->where("link","=",$link)
            ->first();
        $categories = DB::table('categories')->where('status','=','1')->get();
        if ($post)
        {
            return Template::view("post_detail",['post'=>$post,'categories'=>$categories]);
        }
    }

    public function category_link($link)
    {
        $category = DB::table("categories")->where("status","=",1)->where('link',"=",$link)->first();
        if ($category)
        {
            $posts = DB::table("posts")
                ->where("status","=",1)
                ->where("category_id","=",$category->id)->paginate(10);
            if ($posts->count() > 0)
            {
                return Template::view("posts_index",['posts'=>$posts]);
            }
            else{
                return  redirect()->route("index");
            }
        }
    }

    public function search(Request $r)
    {
        $title = $r->post('title');
        return redirect()->route('blog-search-list',$title);
        // $posts = DB::table("posts")->where("status","=",1)->where("title","like",'%'.$title.'%')->get();
        /*   if ($posts->count() > 0)
           {
               return redirect()->route('blog-search-list',$title);

               //return Template::view("posts_index",['posts'=>$posts]);
           }else{
               return redirect()->route('not_found');
           }
        */
    }


}
