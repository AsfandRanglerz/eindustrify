<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSeller
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
        $user = Auth::guard('web')->user();
        if(isset($user)) {
            if ($user->status == 1) {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
