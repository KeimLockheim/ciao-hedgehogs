<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domSante = Domain::where('name','Santé')->first();
        dd($domSante);

        return view('view', [
            'domSante' => $domSante,
            'domStress' =>Domain::where('name','Stress')->first(),
            'domBoire' => Domain::where('name','Boire, fumer, se droguer')->first(),
            'domManger' => Domain::where('name','Manger-bouger')->first(),
            'domEstime' => Domain::where('name','Estime de soi')->first(),
            'domMoi' => Domain::where('name','Moi, toi et les autres')->first(),
            'domSex' => Domain::where('name','Sexualité')->first(),
            'domViolences' => Domain::where('name','Violences')->first(),
            'domDiscrim' => Domain::where('name','Discrimination et racismes')->first(),
            'domArgent' => Domain::where('name','Argent')->first(),
            'domReligions' => Domain::where('name','Religions')->first(),
            'domFormations' => Domain::where('name','Formation et travail')->first(),
        ]);
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
        //
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
