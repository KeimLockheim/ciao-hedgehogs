<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Menu;
use Illuminate\Http\Response;
use Request;
use App\Lib\Message;

class DomainController extends Controller {

  public function getSubDomains($domain_id){
    $subDomains = Domain::where('id', $domain_id)->first()->subDomains;
    if(!isset($subDomains)){
      return Response::view('errors.404',[],404);
    }
    $string = '[';
    foreach($subDomains as $subDomain){
      $string.= "{\"name\" : \"$subDomain->name\",\"id\" : \"$subDomain->id\"},";
    }
    $string = substr($string, 0, -1);
    $string .= ']';

    return $string;
  }

  public function showTopics($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with('topics')->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',[],404);
    }
    // récupère [$highlightedTopics, $notHighlightedTopics] pour un domaine précis?
    $data = Menu::getDomains();
    $data['domain'] = $domain;
    return view('view_topics', $data);
  }

  public function show($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with('topics')->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',[],404);
    }

    $data = Menu::getDomains();
    $data['domain'] = $domain;
    return view('view_domain', $data);
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
  public function store(Request $request)
  {
    // On demande au modèle Domain, de valider les données contenues dans la $request
    $validate = Domain::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {
      return redirect()->back()->withInput()->withErrors($validate);
    }

    //Ajout dans la BD
    try{
      Domain::createOne($validate->getData());
      return Response::view('errors.200',[],200);
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