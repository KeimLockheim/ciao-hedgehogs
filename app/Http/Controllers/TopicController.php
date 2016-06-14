<?php namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Menu;
use App\Models\Topic;
use App\Models\Domain;
use Illuminate\Support\Facades\Response;
use Session;
use Request;

class TopicController extends Controller {



  //Finished, to test

  public function listTopics(){

    //le user c'est l'admin forcément car on est dans le middleware admin

    $topics = Topic::all();


    //trouver la liste des topics à valider et la liste des topics validés [$topicsToValidate, $topicsValidated]
    $topicsToValidate = $topics->where('validated_by', null);
    $topicsValidated = $topics->diff($topicsToValidate);

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
      return Response::view('errors.404',['url' =>'/home','message'=>'Catégorie non trouvée.'], 404);
    }
    $data = Menu::getDomains();
    $data['domain'] = $domain;
    return view('view_proposeTopic', $data);
  }

  //Finished, to test

  public function validateTopic($topic_id)
  {
    $topic = Topic::where('id', $topic_id)->with('posts')->get()->first();
    $post = $topic->posts->first();
    $data = Menu::getDomains();

    $data['topic'] = $topic;
    $data['post'] = $post;

    return view('view_validateTopic', $data);
  }

  public function show($domain_id, $topic_id)
  {
    $topic = Topic::where('id', $topic_id)->with('posts','creatorUser')->get()->first();
    $domain = Domain::find($domain_id);
    $posts = $topic->posts->sortBy('created_at');

    $data = Menu::getDomains();
    $data['topic'] = $topic;
    $data['domain'] = $domain;
    $data['posts'] = $posts;

    return view('view_topic', $data);
  }

  public function listAdmin()
  {

    $data = [];

    return view::make('view_topic', $data);
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
      return redirect()->back()->withInput()->withErrors($validate);
    }

    //Ajout dans la BD
    try{
      Topic::createOne($validate->getData());
      Message::success('saved');
      return redirect('user');
    }
    catch(\Exception $e){
      Message::error('error');
      return redirect()->back()->withInput();
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