<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Menu;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class DomainController extends Controller {

  /**
   * @param $nickname
   * @return string retourne false si le pseudo est disponible sinon true
   */
  public function domainCheck($domain)
  {

    //Vérifie l'existence du domain
    $isAvailable = Domain::exists($domain);
    $isAvailable = !$isAvailable;

    return json_encode(['valid' => $isAvailable]);
  }

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
    $domainCurrent = Domain::where('id', $domain_id)->with(['topics' => function ($query) {
      $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);

    }])->with(['parentDomain','parentDomain.topics' => function ($query) {
          $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);
        }
    ])->get()->first();


    if($domainCurrent->isSubdomain()){
      $domain = $domainCurrent->parentDomain;
    }
    else{
      $domain = $domainCurrent;
    }
    if(!isset($domain)){
      return Response::view('errors.404',[],404);
    }
    //dd($domain->topics);

    // récupère [$highlightedTopics, $notHighlightedTopics] pour un domaine précis?
    $data = Menu::getDomains();
    $data['domain'] = $domain;
    return view('view_topics', $data);
  }

  public function show($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with(['topics' => function ($query) {
      $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);

    }])->with(['parentDomain','parentDomain.topics' => function ($query) {
      $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);
    }
    ])->get()->first();


    if($domain->isSubdomain()){
      $domainParent = $domain->parentDomain;
    }
    else{
      $domainParent = $domain;
    }
    if(!isset($domain)){
      return Response::view('errors.404',[],404);
    }


    $data = Menu::getDomains();
    $data['domain'] = $domain;
    $data['domainParent'] = $domainParent;
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
    $domains = Domain::all();
    $data = Menu::getDomains();
    $data['domains'] = $domains;
    $data['parentDomains'] = Domain::parentDomains();

    return view('view_addDomain', $data);
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
      return Response::view('errors.200',['url' => redirect()->back()->getTargetUrl(),'message'=>'Domaine créé !'], 200);

    }
    catch(\Exception $e){
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Problème de connexion à la base de donnée'], 400);

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