<?php namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Menu;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Response;
use Request;
use App\Lib\Message;

class QuestionController extends Controller {

  public function listing($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->with('domainQuestions','topics', 'subDomainQuestions')->get()->first();
    //dd($domain->isSubdomain());
    //dd($domain->parentDomain);
    //$subDomainQuestions = Domain::where('id', $domain_id)->with('domainQuestions','topics')->get()->first();
    //dd($subDomainQuestions->domainQuestions);
    //$subQuestions = $domain->subDomainQuestions;
    //dd($subQuestions);
    $data = Menu::getDomains();
    $data['domain'] = $domain;

    return view('view_questions', $data);
  }

  public function askQuestion($domain_id)
  {
    $domain = Domain::where('id', $domain_id)->get()->first();
    if(!isset($domain)){
      return Response::view('errors.404',['url' =>'/home','message'=>'Catégorie non trouvée.'], 404);
    }
    $parentDomains = Domain::parentDomains();

    $data = Menu::getDomains();
    $data['domain'] = $domain;
    $data['parentDomains'] = $parentDomains;
    return view('view_addQuestion', $data);
  }


  public function answerQuestion($question_id)
  {
    //$user = User::where('id', Auth::id())->with('userProfile')->get()->first();

    // à effacer et remplacer avec la ligne du dessus mais pour le moment je test avec un user précis car je peux pas chopper le auth
    $user = User::where('id', 1)->get()->first();

    $question = Question::where('id', $question_id)->with('answer', 'domain')->get()->first();
    if(!isset($question)){
      return Response::view('errors.404',['url' =>'/home','message'=>'Question non trouvée.'], 404);
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
      return Response::view('errors.404',['url' =>'/home','message'=>'Catégorie non trouvée.'], 404);
    }
    $question = Question::where('id', $question_id)->with('questionUser', 'answer')->get()->first();
    if(!isset($question)){
      return Response::view('errors.404',['url' =>'/home','message'=>'Question non trouvée.'], 404);
    }

    $data = Menu::getDomains();
    $data['domain'] = $domain;
    $data['question'] = $question;

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
      Message::success('saved');
      return Response::view('errors.200',['url' => redirect()->back()->getTargetUrl(),'message'=>'Discussion créée !'], 200);

    }
    catch(\Exception $e){
      Message::error('error');
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