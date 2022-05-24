<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class AuthGate
{

    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        $rawSQL = "
			SELECT LOWER(CONCAT_WS('-',privilege.privilegeCode,accessLevel.name)) AS permission
			FROM userRole
			INNER JOIN rolePrivilege ON rolePrivilege.role_id = userRole.role_id
			INNER JOIN privilege ON privilege.id = rolePrivilege.privilege_id
			INNER JOIN accessLevel ON accessLevel.id = privilege.access_level_id
			WHERE userRole.user_id = ";

        if (!app()->runningInConsole() && $user) {
            $rawSQL .= $user->id;
            $userPermissions = DB::select($rawSQL);

            foreach ($userPermissions as $permission) {
                Gate::define($permission->permission, function () {
                    return true;
                });
            }

            // Settings stuff
            // \App\Services\SettingService::initializeSettings();
        }

        return $next($request);
    }
}
