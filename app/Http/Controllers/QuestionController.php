<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Menu;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Session;

class QuestionController extends Controller {

  public function listing($domain_id)
  {
    $domainCurrent = Domain::where('id', $domain_id)->with('domainQuestions.domain',  'parentDomain.domainQuestions.domain')->get()->first();
    if($domainCurrent->isSubdomain()){
      $domain = $domainCurrent->parentDomain;
    }
    else{
      $domain = $domainCurrent;
    }
    if(!isset($domain)){
      return Response::view('errors.404',['url' =>'/home','message'=>'Catégorie non trouvée.'], 404);
    }
    $data = Menu::getDomains();
    $data['domain'] = $domain;

    if($domain->parentDomain != null){
      $domainParent = $domain->parentDomain;
    }
    else{
      $domainParent = $domain;
    }

    $data['domainParent'] = $domainParent;
    return view('view_questions', $data);
  }

  public function askQuestion($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Catégorie non trouvée.'], 404);
    }
    $parentDomains = Domain::parentDomains();

    $data = Menu::getDomains();
    $data['domain'] = $domain;
    $data['parentDomains'] = $parentDomains;
    return view('view_addQuestion', $data);
  }


  public function answerQuestion($question_id)
  {

    // à effacer et remplacer avec la ligne du dessus mais pour le moment je test avec un user précis car je peux pas chopper le auth
    $user = User::where('id', Session::get('id'))->get()->first();

    $question = Question::where('id', $question_id)->with('answer', 'domain')->get()->first();
    if(!isset($question)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Question non trouvée.'], 404);
    }
    if(isset($question->answer)){
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Question déjà répondue.'], 400);
    }

    $data = Menu::getDomains();
    $data['question'] = $question;
    $data['user'] = $user;
    return view('view_answerQuestion', $data);
  }


  public function show($domain_id, $question_id)
  {
    $domain = Domain::where('id', $domain_id)->with('parentDomain')->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Catégorie non trouvée.'], 404);
    }

    $question = Question::where('id', $question_id)->with('questionUser', 'answer.answererUser')->get()->first();
    if(!isset($question)){
      return Response::view('errors.404',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Question non trouvée.'], 404);
    }

    if($domain->parentDomain != null){
      $domainParent = $domain->parentDomain;
    }
    else{
      $domainParent = $domain;
    }



    

    $data = Menu::getDomains();
    $data['domain'] = $domain;
    $data['question'] = $question;
    $data['domainParent'] = $domainParent;
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
  public function store(Request $request)
  {
    // On demande au modèle Question, de valider les données contenues dans la $request
    $validate = Question::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Erreur de saisie'], 400);
    }

    //Ajout dans la BD
    try{
      Question::createOne($validate->getData());
      return Response::view('errors.200',['url' => redirect()->back()->getTargetUrl(),'message'=>'Question posée !'], 200);

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
  public function update($question_id)
  {
    $question = Question::where('id',$question_id)->first();
    $question->public = true;

    dd($question);
    return Response::view('errors.200',['url' =>'/hedgehogs/dashboard/topics/','message'=>'Question publique.'], 200);
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
