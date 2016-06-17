<?php namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Topic;
use App\Models\Domain;
use Illuminate\Support\Facades\Response;
use Session;
use Illuminate\Http\Request;

class TopicController extends Controller {



  //Finished, to test

  public function listTopics(){

    //le user c'est l'admin forcément car on est dans le middleware admin

    $topics = Topic::all();


    //trouver la liste des topics à valider et la liste des topics validés [$topicsToValidate, $topicsValidated]
    $topicsToValidate = $topics->where('validated_by', null);
    $topicsValidated = $topics->where('validated_by','<>', null);

    $data = Menu::getDomains();
    $data['topicsToValidate'] = $topicsToValidate;
    $data['topicsValidated'] = $topicsValidated;
    return view('view_topicsAdmin', $data);
  }


  //to do

  public function proposeTopic($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',['url' => redirect()->back()->getTargetUrl(),'message'=>'Catégorie non trouvée.'], 404);
    }
    $data = Menu::getDomains();
    $data['domain'] = $domain;
    return view('view_proposeTopic', $data);
  }

  //Finished, to test

  public function validateTopic($topic_id)
  {
    $topic = Topic::where([['id', $topic_id],['validated_by','=', null],])->with('posts')->get()->first();

    if(!isset($topic)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Discussion non trouvée.'], 404);
    }
    $post = $topic->posts->first();

    $data = Menu::getDomains();

    $data['topic'] = $topic;
    $data['post'] = $post;

    return view('view_validateTopic', $data);
  }

  public function show($domain_id, $topic_id)
  {
    $topic = Topic::where([
        ['id', $topic_id],
        ['validated_by','<>', null],
        ['refusedReason','=',null],
    ])->with('posts','creatorUser')->get()->first();

    if(!isset($topic)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Discussion non trouvée.'], 404);
    }
    $domain = Domain::where('id', $domain_id)->with(['topics' => function ($query) {
      $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);

    }])->with(['parentDomain','parentDomain.topics' => function ($query) {
      $query->where('validated_by', '<>', null)->where('refusedReason', '=', null);
    }
    ])->get()->first();


    if(!isset($domain)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Catégorie non trouvée.'], 404);
    }

    if($domain->isSubdomain()){
      $domainParent = $domain->parentDomain;
    }
    else{
      $domainParent = $domain;
    }

    $posts = $topic->posts->sortBy('created_at');

    $data = Menu::getDomains();
    $data['topic'] = $topic;
    $data['domain'] = $domain;
    $data['posts'] = $posts;
    $data['domainParent'] = $domainParent;

    return view('view_topic', $data);
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
    // On demande au modèle Topic, de valider les données contenues dans la $request
    $validate = Topic::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Erreur de saisie'], 400);
    }
    //Ajout dans la BD
    try{
      Topic::createOne($validate->getData());
      return Response::view('errors.200',['url' => redirect()->back()->getTargetUrl(),'message'=>'Discussion créée !'], 200);
    }
    catch(\Exception $e){
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Problème de connexion à la base de donnée'], 400);
    }
  }

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
  public function update(Request $request)
  {
    $inputs = $request->only('reason','validateStatus','topic_id');
    if (!isset($inputs['validateStatus']) || (!isset($inputs['reason']) && $inputs['validateStatus'] == 'non') || !isset($inputs['topic_id'])) {

      return Response::view('errors.404',['url' => redirect()->back()->getTargetUrl(),'message'=>'Erreur de saisie.'], 404);
    }
    $topic = Topic::where('id',$inputs['topic_id'])->first();

    if (!isset($topic)) {
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Topic non trouvé.'], 404);
    }
    if($inputs['validateStatus'] == 'non'){
      $topic->refusedReason = $inputs['reason'];
    }
    $topic->validated_by = Session::get('id');
    $topic->update();
    return Response::view('errors.200',['url' =>'/dashboard/topics/','message'=>'Topic modéré.'], 200);
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