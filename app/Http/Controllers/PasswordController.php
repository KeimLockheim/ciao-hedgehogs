<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

//use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

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
        if (!isset($inputs['nickname']) || !isset($inputs['password']) || !isset($inputs['answerQuestion'])) {
            return response('Fields error', 404);
        }
        $user = User::where('nickname', $inputs['nickname'])->first();
        if (!isset($user)) {
            return response('Not found', 404);
        }
        if (!Hash::check($inputs['answerQuestion'],$user->secretQuestionAnswer)) {
            return response('Wrong answer', 400);
        }
        if (!isset($inputs['password'])) {
            return response('Fields error', 404);
        }
        $user->password = bcrypt($inputs['password']);
        $user->update();
        return redirect('/home');
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