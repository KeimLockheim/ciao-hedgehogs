<?php namespace App\Http\Controllers;
class TopicController extends Controller {



  //Finished, to test

  public function listTopics(){

    $topics = Topic::all;
    $data=[];


    //trouver la liste des topics à valider et la liste des topics validés [$topicsToValidate, $topicsValidated]

    return view('view_topicsAdmin', $data);
  }


  //to do

  public function proposeTopic($topic_id)
  {

    $topic = Topic::find($topic_id);
    $data =[];

    return View::make('view_proposeTopic', $data);
  }

  //Finished, to test

  public function validateTopic($topic_id)
  {
    $topic = Topic::find($topic_id);
    $post = $topic->posts->first();
    $data = ['topic' => $topic, 'post' => $post];

    return View::make('view_validateTopic', $data);
  }

  public function show($topic_id)
  {
    $topic = Topic::find($topic_id);

    $data=['topic' => $topic];

    return view('view_topic', $data);
  }

  public function listAdmin()
  {

    $data = [];

    return View::make('view_topic', $data);
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