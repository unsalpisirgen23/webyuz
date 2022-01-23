<?php

namespace App\System\Kernel;

use Illuminate\Support\Facades\DB;

class Permission
{
    protected $db;
    protected $group;

    private static $instance = null;

    public function __construct()
    {}


    public function getPermissionGroup()
    {

    }

    public function getPermissions($id = 0){
            $permissions_group = DB::select("select  * from permissions ");
            {
                    foreach ($permissions_group as $permission)
                    {

                    }
            }
    }


    public function isAuth($name,$domain,$id)
    {
        $Domain = DB::table("permission_domains")
            ->where("domain","=",$domain)
            ->get();

        if ($Domain->count() < 1){
            DB::table("permission_domains")->insert(['domain'=>$domain]);
        }

        $domain_id = DB::getPdo()->lastInsertId();

        if ($domain_id < 1){
            $domain_id = $Domain->first()->id;
        }

        $is = DB::table("permissions")
            ->where("name","=",$name)
            ->where("permission_domain_id","=",$domain_id)
            ->get()
            ->count();

        if ($is < 1)
        {
            DB::table("permissions")->insert(['name'=>$name,"permission_domain_id"=>$domain_id]);
        }else{
            $user_role_permissions =  DB::table("user_role_permissions")
                ->join("user_role_users","user_role_users.role_id","=","user_role_permissions.user_role_id")
                ->join("permissions","permissions.id","=","user_role_permissions.permission_id")
                ->join("user_roles","user_roles.id","=","user_role_users.role_id")
                ->join("users","users.id","=","user_role_users.user_id")
                ->where("user_role_users.user_id","=",$id)
                ->where("permissions.name","=",$name)
                ->where("permissions.permission_domain_id","=",$domain_id)
                ->orderBy("permission_domain_id")
                ->get([
                    'users.id as users_id ',
                    'user_roles.id as user_roles_id',
                    "permissions.name as permissions_name",
                    "permissions.permission_domain_id as permission_domain_id",
                    'user_roles.name as user_roles_name',
                    'users.name as users_name',
                    'users.lastname as users_lastname',
                    'users.username as users_username',
                    'users.language_type as users_language_type',
                ]);
            if ($user_role_permissions)
            {
                if ($user_role_permissions->count() > 0)
                {
                    return true;
                }else{
                    return  false;
                }
            }
        }
    }


    public function is($name,$domain = "")
    {
        $Domain = DB::table("permission_domains")
            ->where("domain","=",$domain)
            ->get();

        if ($Domain->count() < 1){
            DB::table("permission_domains")->insert(['domain'=>$domain]);
        }

        $domain_id = DB::getPdo()->lastInsertId();

        if ($domain_id < 1){
            $domain_id = $Domain->first()->id;
        }

        $is = DB::table("permissions")
            ->where("name","=",$name)
            ->where("permission_domain_id","=",$domain_id)
            ->get()
            ->count();

       if ($is < 1)
       {
           DB::table("permissions")->insert(['name'=>$name,"permission_domain_id"=>$domain_id]);
       }else{
              $user_role_permissions =  DB::table("user_role_permissions")
                    ->join("user_role_users","user_role_users.role_id","=","user_role_permissions.user_role_id")
                    ->join("permissions","permissions.id","=","user_role_permissions.permission_id")
                    ->join("user_roles","user_roles.id","=","user_role_users.role_id")
                    ->join("users","users.id","=","user_role_users.user_id")
                    ->where("user_role_users.user_id","=",auth()->id())
                    ->where("permissions.name","=",$name)
                    ->where("permissions.permission_domain_id","=",$domain_id)
                    ->orderBy("permission_domain_id")
                    ->get([
                        'users.id as users_id ',
                        'user_roles.id as user_roles_id',
                        "permissions.name as permissions_name",
                        "permissions.permission_domain_id as permission_domain_id",
                        'user_roles.name as user_roles_name',
                        'users.name as users_name',
                        'users.lastname as users_lastname',
                        'users.username as users_username',
                        'users.language_type as users_language_type',
                    ]);
              if ($user_role_permissions)
              {
                  if ($user_role_permissions->count() > 0)
                  {
                      return true;
                  }else{
                      return  false;
                  }
              }
       }
    }


    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }



}