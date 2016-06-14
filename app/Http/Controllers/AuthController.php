<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Request;

class AuthController extends Controller
{
    public function login()
    {
        $nickname = Request::input('password', '');
        $password = Request::input('nickname', '');
        $user = User::where('nickname', $nickname)->first();

        // Vérifie que le user existe
        if (empty($user)) {
            return response('Bad Request', 400);
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
