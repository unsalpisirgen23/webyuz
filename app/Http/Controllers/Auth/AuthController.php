<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\System\Kernel\Authentication;
use App\System\Kernel\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view("auth.login");
    }

    public function authentication(Request $request)
    {
        $email    = trim($request->post("email"));
        $password = trim($request->post("password"));
        $user = Authentication::getInstance();
        if ($user->login($email))
        {
            if ($user->isPasswordCheck($password))
            {
                if (Permission::getInstance()->isAuth("login","Auth",$user->getUser()->id))
                {
                    $site  = $user->isSite();
                    if ($site)
                    {
                        if ($site->status == 0){
                            return redirect()->back()->with('error',"Sizin siteniz askıya alınmıştır!");
                        }
                       $database =  $user->isDatabase();
                       if ($database)
                       {
                               $user->configSetDatabase();
                       }
                        if (auth()->attempt(["email"=>$email,"password"=>$password])){
                            return redirect()->route("admin.home")->with("success","Tebrikler başarıyla giriş yaptınız.");
                        }
                    }else{
                        if (auth()->attempt(["email"=>$email,"password"=>$password])){
                            return redirect()->route('admin.home');
                        }
                    }
                }
                else{
                    return redirect()->back()->with('error',"Sizin sisteme giriş yetkiniz olmaya bilir!");
                }
            }else{
                return redirect()->back()->with('error',"Şifreniz hatalı olabilir!");
            }
        }else{
            return redirect()->back()->with('error',"Böyle bir kullanıcı olmaya bilir!");
        }
    }




    public function logout()
    {
        session()->reflash();;
        session()->flush();
        Auth::logout();
        return redirect()->route("home");
    }

}
