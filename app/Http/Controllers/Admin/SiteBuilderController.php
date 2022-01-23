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
        $templates = DB::table("templates")->get();

        $site = DB::table('sites')->where('id','=',$id)->first();

        return view('admin.site_builder.edit',['site'=>$site,'users'=>$user,'themes'=>$templates]);

    }

    public function update(Request $request,$id){

        $user_id = Request::post('user_id');

        $domain = Request::post('domain');

        $database_name = Request::post('database_name');

        $status = Request::post('status');

        $template_id = Request::post('template_id');

        $updated_at = date('Y-m-d H:i:s');

        $update = DB::table('sites')->where('id','=',$id)->update([

            'user_id' => $user_id,
            'domain' => $domain,
            'database_name' => $database_name,
            'status' => $status,
            'updated_at'=>$updated_at,
            'template_id'=>$template_id
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
        $template_id = Request::post('template_id');

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
            'template_id'=>$template_id
        ]);

        config()->set("database.connections.user_database.database",$database_name);

        DB::connection("user_database")->table("settings")->insert([
            'site_logo' => 'https://www.katrilyon.com.tr/upload/1639996920-61c05df8e046f.png',
            'site_url'=>'webyuz.test',
            'site_title'=>'Web Yüz Demo Site',
            'site_description'=>'Merhaba, bu bir demo sitedir. Ek özellikler ve geliştirmeler için ekibimizle iletişime geçebilirsiniz.',
            'site_phone'=>'0 545 545 54 55',
            'site_email'=>'info@webyuz.net',
            'site_facebook'=>'https://facebook.com/facebook',
            'site_twitter'=>'https://twitter.com/twitter',
            'site_instagram'=>'https://instagram.com/instagram',
            'site_gmail'=>'google@gmail.com',
            'site_address'=>'Mersin / Erdemli',
            'site_working_hours'=>'08:00-17:00',
            'site_whatsapp_number'=>'0 545 545 54 54',
            'site_whatsapp_text'=>'Merhaba Demo Sitenizi İnceledim'
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