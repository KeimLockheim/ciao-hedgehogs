<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Session;
use Request;

class AuthController extends Controller
{
    public function login()
    {
        $password = Request::input('password', '');
        $nickname = Request::input('nickname', '');
        $user = User::where('nickname', $nickname)->first();

        // Vérifie que le user existe
        if (empty($user)) {
            return Response::view('errors.503',[], 503);
        }
        //Vérifie le mdp
        if (!Hash::check($password,$user->password)) {
            return response('Bad Request', 400);
        }
        // Persistance de l'authentification
        Session::put('id', $user->id);

        return view('view_homePage', Menu::getDomains());
    }

    public function logout()
    {
        Session::forget('id');
        return view('view_homePage', Menu::getDomains());
    }
}
