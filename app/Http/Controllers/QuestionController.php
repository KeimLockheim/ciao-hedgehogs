<?php namespace App\Http\Controllers;

class QuestionController extends Controller {

  public function list($domain_name)
  {
    $data=[$domain_name];

    return view('view_questions', $data);
  }

  public function askQuestion($domain_id)
  {
    $data=[];

    return view('view_askQuestion', $data);
  }

  public function answerQuestion($question_id)
  {
    $data=[];

    return view('view_answerQuestion', $data);
  }


  public function show($question_id)
  {
    $data=[];

    return view('view_question', $data);
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