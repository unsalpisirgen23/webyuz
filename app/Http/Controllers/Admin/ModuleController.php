<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{

    public function index()
    {
        $modules = DB::table("modules")->get();
        return  view("admin.modules.index",['modules'=>$modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $dbModule = DB::table("modules")->where("id","=",$id)->first();

        if ($request->post("is_status")==1)
        {
            if ($request->post("status") == 1)
            {
                Artisan::call("optimize");
                $is = DB::table("modules")->where("id","=",$id)->update([
                    'module_status'=>0,
                    "updated_at"=>date('Y-m-d H:i:s')
                ]);
                Artisan::call("optimize");
                if ($is)
                {
                    return  redirect()->route("admin.base_modules.index")->with('Tebrikler modül başarıyla aktif oldu');
                }
            }
            if ($request->post("status") == 0)
            {
                $is = DB::table("modules")->where("id","=",$id)->update([
                    'module_status'=>1,
                    "updated_at"=>date('Y-m-d H:i:s')
                ]);
                if ($is)
                {
                       return  redirect()->route("admin.base_modules.index")->with('Tebrikler modül başarıyla aktif oldu');
                }
            }
        }

        $module_folders = glob(base_path("Modules")."/*");

        foreach ($module_folders as $module)
        {

            if (ucwords($dbModule->module_name) == basename($module) ){

                $migrations = glob($module."/database/migrations/*.php");
                    /* migrations Operations */

                    foreach ($migrations as $migration)
                    {
                        if (file_exists($migration)){
                            require_once $migration;
                        }

                        $classT = basename(str_replace([base_path("Modules"),".php"],[""],$migration));
                        $migration_p =  ucwords($classT,"_");
                        $classMigration =  preg_replace("@\d|_@","",$migration_p);

                        if (class_exists($classMigration))
                        {
                            $classMigration = new $classMigration();
                            if ($request->post("install") == 1){

                                $classMigration->up();
                                DB::table("modules")->where("id","=",$id)->update(['module_install'=>1]);
                                return  redirect()->route("admin.base_modules.index")->with("success",'Tebrikler modül başarıyla kuruldu');
                            }
                            if ($request->post("install") == 0){
                                $classMigration->down();
                                DB::table("modules")->where("id","=",$id)->update(['module_install'=>0,"module_status"=>0]);
                                return  redirect()->route("admin.base_modules.index")->with("success",'Tebrikler modül başarıyla kaldırıldı');
                            }
                        }else{
                            return  redirect()->route("admin.base_modules.index")->with("error",'Not Migration found!');
                        }
                    }
            }
        }
    }


    public function install()
    {

    }

    public function destroy($id)
    {}

}
