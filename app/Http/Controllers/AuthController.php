<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Request;

class AuthController extends Controller
{
    public function login()
    {
        $password = Request::input('password', '');
        $name = Request::input('name', '');
        $user = User::where('name', $name)->first();

        // Vérifie que le user existe
        if (empty($user)) {
            return response('Bad Request', 400);
        }
        //Vérifie le mdp
        if (bcrypt($password) != $user->password) {
            return response('Bad Request', 400);
        }
        // Persistance de l'authentification
        Session::put('id', $user->id);
        return;
    }

    public function logout()
    {
        Session::forget('id');
        return;
    }
}
