<?php

namespace App\System\Kernel;

class TemplateHook
{
    private static $instance;

    protected static $classInstance;

    protected $hooks = [];

    public function addAction($to,$function,$priority = 2)
    {
        $this->addActionElement($to,$function,$priority);
    }

    protected function addActionElement($to,$function,$priority = 2)
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
                if (class_exists($function))
                {
                    self::$classInstance = new $function($args);

                   if (method_exists(self::$classInstance,"render"))
                   {
                    $result[$to] = self::$classInstance->render($args);
                   }
                }
                if (function_exists($function))
                {
                    $result[$to] = call_user_func_array($function,[$args]);
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