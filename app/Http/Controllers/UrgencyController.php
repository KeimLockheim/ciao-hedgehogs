<?php

namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Menu;
use App\Models\Urgency;
use App\Models\Domain;

use App\Http\Requests;

class UrgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::getDomains();
        $data['urgencies'] = $urgencies;
        return view('view_urgencyAll', $data);
    }

    public function indexDomain($domain_id)
    {
        $domain = Domain::where('id', $domain_id)->with('urgencies')->get()->first();
        return view('view_urgencyAll', ['domain' => $domain]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // On demande au modèle Urgency, de valider les données contenues dans la $request
        $validate = Urgency::getValidation($request);

        // Si la validation échoue
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        //Ajout dans la BD
        try{
            Urgency::createOne($validate->getData());
            Message::success('saved');
            return redirect('user');
        }
        catch(\Exception $e){
            Message::error('error');
            return redirect()->back()->withInput();
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
