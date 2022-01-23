<?php

namespace App\Http\Controllers\Admin;


use App\System\Builder\Migrations\MigrationBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Models\Site;
use Illuminate\Support\Facades\Schema;

class SiteBuilderController
{


    public function index(){

        $sites = DB::table('sites')->get();

        return view('admin.site_builder.index',['sites'=>$sites]);


    }




    public function create(){

        $user = DB::table('users')->get();
        $templates = DB::table("templates")->get();
        return view('admin.site_builder.create',['users'=>$user,'themes'=>$templates]);

    }

    public function edit($id){

        $user = DB::table('users')->get();

        $site = DB::table('sites')->where('id','=',$id)->first();
        return view('admin.site_builder.edit',['site'=>$site,'users'=>$user]);

    }

    public function update(Request $request,$id){
        $user_id = Request::post('user_id');
        $domain = Request::post('domain');
        $database_name = Request::post('database_name');
        $status = Request::post('status');
        $updated_at = date('Y-m-d H:i:s');
        echo $user_id.$domain.$database_name.$status;

        $update = DB::table('sites')->where('id','=',$id)->update([

            'user_id' => $user_id,
            'domain' => $domain,
            'database_name' => $database_name,
            'status' => $status,
            'updated_at'=>$updated_at,

        ]);
        return redirect()->route('admin.site_builder.index');

    }

    public function store(Request $request){
        $user_id = Request::post('user_id');
        $domain = Request::post('domain');
        $status = Request::post('status');
        $database_name = randStr('3').randNum('4');
        Schema::createDatabase($database_name);
        MigrationBuilder::up($database_name);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $insert_databases = DB::table('site_databases')->insert([
            'name'=>$database_name,
        ]);
        $last_database_id =DB::getPdo()->lastInsertId();
        $insert = DB::table('sites')->insert([

            'user_id' => $user_id,
            'domain' => $domain,
            'database_name' => $database_name,
            'site_database_id' => $last_database_id,
            'status' => $status,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at,


        ]);

        return redirect()->route('admin.site_builder.index');
    }

    public function destroy($id){
        $get_database = DB::table('sites')->where('id','=',$id)->first();
        $database_name = $get_database->database_name;
        MigrationBuilder::down($database_name);
        Schema::dropDatabaseIfExists($database_name);
        $destroy = DB::table('sites')->where('id','=',$id)->delete();

        return redirect()->route('admin.site_builder.index');

    }


}