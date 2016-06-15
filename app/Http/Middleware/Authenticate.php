<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;
use Session;
use Illuminate\Support\Facades\Auth;

class Authenticate
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

        $userId = Session::get('id');

        if (!isset($userId)) {
            return Response::view('errors.403',['url' => redirect()->back()->getTargetUrl(),'message'=>'Oups, Accès non-autorisé !'], 403);

        }
        return $next($request);

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return Response::view('errors.403',['url' => redirect()->back()->getTargetUrl(),'message'=>'Oups, Accès non-autorisé !'], 403);

            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);

    }
}
