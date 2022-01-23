<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\inspect;

class Hooks
{
    private $hooks = [];


    private static $instance;

    public function addAction($to,$function,$priority = 2)
    {
        if (!isset($this->hooks[$to])){
            $this->hooks[$to] = array();
        }
        @$this->hooks[$to][$function] = $priority;
    }

    public function removeAction($to,$function)
    {
        if (isset($this->hooks[$to][$function])){
            unset($this->hooks[$to][$function]);
        }
        return isset($this->hooks[$to][$function]);
    }


    public function getToHooks()
    {
        return $this->hooks;
    }

    public function doAction($to,$args = [])
    {
        if (isset($this->hooks[$to]))
        {
            $hooks = $this->hooks[$to];
            $result = [];
            arsort($hooks);
            foreach ($hooks as $function=>$priority)
            {
                    if (function_exists($function))
                    {

                        $result[$to] = call_user_func_array($function,[$args]);
                    }else{
                        $result[$to] = ['from'=>$function,'args'=>$args];
                    }
            }
            return $result[$to];
        }
    }



    public static function install():self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return  self::$instance;
    }

}
