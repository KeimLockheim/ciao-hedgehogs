<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\User;
use App\Models\Question;
use Request;
use App\Lib\Message;

class QuestionController extends Controller {

  public function listing($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with('domainQuestions','topics')->get()->first();
    //dd($domain->isSubdomain());
    dd($domain->parentDomain);
    //$subDomainQuestions = Domain::where('id', $domain_id)->with('domainQuestions','topics')->get()->first();
    //dd($subDomainQuestions->domainQuestions);
    $subQuestions = $domain->subDomainQuestions;
    //dd($subQuestions);

    return view('view_questions', ['domain' => $domain]);
  }

  public function askQuestion($domain_id)
  {
    $data=[];

    return view('view_askQuestion', $data);
  }

  public function answerQuestion($question_id)
  {
    //$user = User::where('id', Auth::id())->with('userProfile')->get()->first();

    // à effacer et remplacer avec la ligne du dessus mais pour le moment je test avec un user précis car je peux pas chopper le auth
    $user = User::where('id', 1)->with('userProfile')->get()->first();


    $question = Question::where('id', $question_id)->with('answer', 'domain')->get()->first();

    return view('view_answerQuestion', ['question' => $question,'user' => $user]);
  }


  public function show($domain_id, $question_id)
  {
    $domain = Domain::where('id', $domain_id)->with('parentDomain')->get()->first();
    $question = Question::where('id', $question_id)->with('questionUser', 'answer')->get()->first();
    return view('view_question', ['domain'=> $domain, 'question' => $question]);
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
    // On demande au modèle Question, de valider les données contenues dans la $request
    $validate = Question::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {
      return redirect()->back()->withInput()->withErrors($validate);
    }

    //Ajout dans la BD
    try{
      Question::createOne($validate->getData());
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