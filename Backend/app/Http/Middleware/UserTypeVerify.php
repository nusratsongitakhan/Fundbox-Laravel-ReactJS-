<?php

namespace App\Http\Middleware;

use Closure;

class UserTypeVerify
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
        if($request->session()->get('user_type')==4){
            return $next($request);
        }else{
            return redirect('/SignIn')->with([
                'error' => true,
                'message' => 'Please login first'
            ]);
        }
    }
}
