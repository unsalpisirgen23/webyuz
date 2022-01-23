<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecurityPolicyController extends Controller
{


    public function permissionPolicy()
    {
        $permissions = DB::table("permissions")
            ->join("permission_domains","permission_domains.id","=","permissions.permission_domain_id")
            ->get(
                ['permissions.id as permissions_id',
                    "permission_domains.id as permission_domains_id",
                    'permissions.name as name',
                    'permissions.description as description',
                    'permission_domains.domain as domain'
                ]);
        return view("admin.security.permissionPolicy", ['permissions' => $permissions]);
    }


    public function permissionPolicyEdit($id)
    {
        $permission = DB::table("permissions")
            ->where("id", "=", $id)->first();
        if ($permission)
        {
            return view("admin.security.permissionPolicyEdit", ['permission' => $permission]);
        }
    }


    public function permissionPolicyUpdate(Request $request, $id)
    {
        DB::table("permissions")
            ->where("id", "=", $id)
            ->update(['description' => $request->post("description")]);
        return redirect()->route("admin.security_policy.permissionPolicy");
    }

    public function GroupPolicyIndex()
    {
        $user_role_users = DB::table("user_role_users")
            ->join("user_roles", "user_roles.id", "=", "user_role_users.role_id")
            ->get([
                'user_roles.name as user_roles_name',
                'user_roles.id as user_roles_id'
            ]);
        if ($user_role_users->count() > 0) {
            return view("admin.security.GroupPolicyIndex", ['user_role_users' => $user_role_users]);
        }
    }

    public function GroupPolicyAssignment($id)
    {
        $user_role_user = DB::table("user_role_permissions")
            ->join("user_roles", "user_roles.id", "=", "user_role_permissions.user_role_id")
            ->where("user_role_permissions.user_role_id","=",$id)
            ->get([
                'user_role_permissions.user_role_id as user_role_id',
                'user_role_permissions.permission_id as permission_id',
                'user_roles.name as user_roles_name'
            ]);
        if ($user_role_user)
        {
            $permission_domains = DB::table("permission_domains")->get();
            $permissions = DB::table("permissions")
                ->get();
            $user_role = DB::table("user_roles")->where("id","=",$id)->first();
            return view("admin.security.GroupPolicyAssignment", ['user_role_user' => $user_role_user,'user_role'=>$user_role,'permission_domains'=>$permission_domains,'permissions'=>$permissions]);
        }
    }


    public function GroupPolicyUpdate(Request $request,$user_roles_id)
    {
        $permission_id = $request->post("permission_id");
        DB::table("user_role_permissions")->where('user_role_id',"=",$user_roles_id)->delete();
        if (isset($permission_id)){
            foreach ($permission_id as $item) {
                DB::table("user_role_permissions")
                    ->insert(['permission_id'=>$item,'user_role_id'=>$user_roles_id]);
            }
        }
       return   redirect()->route("admin.security_policy.GroupPolicyIndex",$user_roles_id);
    }


}
