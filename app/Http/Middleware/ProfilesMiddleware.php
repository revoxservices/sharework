<?php

namespace App\Http\Middleware;

use Closure;

class ProfilesMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()){

            $routes = !$request->user()->profile->name;
            dd($routes);
            switch ($routes){
                case 'Managers' :
                    return redirect()->route('managers.dashboard')->withErrors(__('auth.not_authorized'));
                    break;
                case 'Customers' :
                    return redirect()->route('customers.dashboard')->withErrors(__('auth.not_authorized'));
                    break;
            }

        }else{
            return $next($request);

        }


    }
}
