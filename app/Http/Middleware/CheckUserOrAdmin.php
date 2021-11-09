<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $u = $request->user();
        if($u->role != 'admin')
        {
            return redirect(route('login'))->with('error','Bạn không có quyền');
        }

        return $next($request);
    }
}
