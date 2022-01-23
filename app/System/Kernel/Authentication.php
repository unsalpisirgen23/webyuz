<?php

namespace App\System\Kernel;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class Authentication
{
    private static $instance = null;

    protected $user;
    protected $site;

    public function login($email)
    {
        $this->user = DB::table("users")
            ->where("email", "=", $email)
            ->where("status","=",1)->first();
        if (isset($this->user->id))
        {
            return true;
        }
        else{
            return  false;
        }
    }

    public function isPasswordCheck($password)
    {
        if (isset($this->user->password)) {
            return Hash::check($password, $this->user->password);
        }
    }

    public function authRole($name, $domain)
    {
        if (isset($this->user->id)) {
            if (Permission::getInstance()->isAuth($this->user->id, $name, $domain))
            {
                return  true;
            }
        }else{
            return  false;
        }
    }

    /**
     * @return SiteAuth
     */
    public function isSite()
    {
        if (isset($this->user->id)) {
            $site = DB::table("sites")
                ->join("site_databases", "site_databases.id", "=", "sites.site_database_id")
                ->where("sites.user_id", "=", $this->user->id)
                ->first([
                    'site_databases.name as database_name',
                    'site_databases.id as database_id',
                    'sites.id as sit_id',
                    'sites.domain as site_domain',
                    'sites.title as site_title',
                    'sites.created_at as site_date',
                    'sites.status as status'
                ]);
            if ($site) {
                $this->site = $site;
                return $site;
            }
        }
    }

    public function isDatabase()
    {
        if (isset($this->site->database_name)) {
            $db = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?", [$this->site->database_name]);
            if ($db) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function getSiteDatabase()
    {
         if (isset($this->site->database_name))
         {
             return $this->site->database_name;
         }
    }

    public function getSiteStatus()
    {
        if (isset($this->site->status))
        {
            return $this->site->status;
        }
    }



    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    public function configSetDatabase()
    {
        if (isset($this->site->database_name))
        {
            config()->set("database.connections.user_database.database",$this->site->database_name);
            session()->put("database_name",$this->site->database_name);
            session()->save();
            return true;
        }
    }




    public static function getInstance()
    {
        if (self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }


}