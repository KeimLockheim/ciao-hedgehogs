<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Session;
use App\Models\User;

class Expert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {

        $user = User::where('id', Session::get('id'))->first();
        if(!isset($user)){
            return Response::view('errors.403',['url' => redirect()->back()->getTargetUrl(),'message'=>'Oups, Accès non-autorisé !'], 403);
        }

        if (!$user->hasGroup('expert')) {
            return Response::view('errors.403',['url' => redirect()->back()->getTargetUrl(),'message'=>'Oups, Accès non-autorisé !'], 403);
        }
        return $next($request);

    }
}
