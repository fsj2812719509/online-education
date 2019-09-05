<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddeware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //验证是否登录

        $user = session('admins');
        if($user['a_name']==''){
            echo '请登录';
            return redirect('/admin_login');

        }
        return $next($request);
    }
}
