<?php

namespace App\Helpers;

class ModuleRoutes
{

    public  function route($path,$data=[])
    {
        return route("modules.ComponentWidgets." . $path, $data);
    }

    public function go()
    {

    }

    public function view()
    {

    }

}