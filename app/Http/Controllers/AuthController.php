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
            return Response::view('errors.400',['url'=>'/home'], 400);
        }
        //Vérifie le mdp
        if (!Hash::check($password,$user->password)) {
            return Response::view('errors.400',[], 400);
        }
        // Persistance de l'authentification
        Session::put('id', $user->id);

        return redirect('dashboard');
    }

    public function logout()
    {
        Session::forget('id');
        return redirect('home');
    }
}
