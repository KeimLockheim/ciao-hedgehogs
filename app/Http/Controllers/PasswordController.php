<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

//use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Menu::getDomains();

        return view('view_lostPassword', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs = $request->only('nickname','password','answerQuestion');
        if (!isset($inputs['nickname']) || !isset($inputs['password']) || $inputs['password'] == "" || !isset($inputs['answerQuestion'])) {
            return Response::view('errors.404',['url' =>'/lost','message'=>'Erreur de saisie.'], 404);
        }
        $user = User::where('nickname', $inputs['nickname'])->first();
        if (!isset($user)) {
            return Response::view('errors.404',['url' =>'/lost','message'=>'Utilisateur non trouvé.'], 404);
        }
        if (!Hash::check($inputs['answerQuestion'],$user->secretQuestionAnswer)) {
            return Response::view('errors.404',['url' =>'/lost','message'=>'Mauvaise réponse !'], 404);
        }
        if (!isset($inputs['password'])) {
            return response('Fields error', 404);
        }
        $user->password = bcrypt($inputs['password']);
        $user->update();
        return Response::view('errors.200',['url' =>'/home','message'=>'Mot de passe modifié !'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
