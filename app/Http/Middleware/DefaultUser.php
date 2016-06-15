<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DefaultUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $user = User::where('id', Session::get('id'));
        if(!isset($user)){
            return response('Unauthorised', 403);
        }

        if (!$user->hasGroup('default')) {
            return response('Unauthorised', 403);
        }
        return $next($request);

    }
}
