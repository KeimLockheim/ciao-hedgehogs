<?php namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Domain;
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
    return view('view_topicsAdmin', ['topicsToValidate' => $topicsToValidate, 'topicsValidated' => $topicsValidated ]);
  }


  //to do

  public function proposeTopic($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->get()->first();
    return view('view_proposeTopic', ['domain' => $domain]);
  }

  //Finished, to test

  public function validateTopic($topic_id)
  {
    $topic = Topic::where('id', $topic_id)->with('posts')->get()->first();
    $data = ['topic' => $topic, 'posts' => $posts];

    return view('view_validateTopic', ['topic' => $topic]);
  }

  public function show($domain_id, $topic_id)
  {
    $topic = Topic::where('id', $topic_id)->with('posts','creatorUser')->get()->first();
    $domain = Domain::find($domain_id);
    $posts = $topic->posts->sortBy('created_at');

    return view('view_topic', ['topic' => $topic, 'domain' => $domain, 'posts' => $posts]);
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
  public function store()
  {
    
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