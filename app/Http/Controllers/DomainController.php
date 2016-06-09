<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\User;
use App\Models\Topic;

use App\Models\Category;
use Session;
use Request;

class DomainController extends Controller {


  public function showTopics($domain_name)
  {
    $data=[];

    // récupère [$highlightedTopics, $notHighlightedTopics] pour un domaine précis

    return view('view_topics', $data);
  }

  public function show($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with('topics')->get()->first();

    $data=['domain', $domain];

    return view('view_domain', ['domain' => $domain]);
  }




  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>