<?php

namespace App\Http\Middleware;

use App\System\Kernel\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionMiddleware
{

    private static  $guard = [];

    public function handle(Request $request, Closure $next,...$guards)
    {
        $route = Route::getRoutes()->match($request);
        [$controler,$method] = explode("@", $route->getActionName());
        $domain = "";
         if (isset($guards[0]))
        {
            $domain = $guards[0];
        }
         $action = "";
         if (isset($guards[1]))
         {
             $action = $guards[1];
         }
        $permission = permission($action,$domain);
         if ($permission){
             return $next($request,$guards);
         }else{
         return redirect()->route("admin.home");
         }
    }


}
