<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Admin
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

        $user = User::where('id', Session::get('id'))->first();
        if(!isset($user)){
            return Response::view('errors.403',['url' => redirect()->back()->getTargetUrl(),'message'=>'Accès non-autorisé !'], 403);
        }

        if (!$user->hasGroup('administrator')) {
            return response('Unauthorised', 403);
        }
        return $next($request);

    }
}
