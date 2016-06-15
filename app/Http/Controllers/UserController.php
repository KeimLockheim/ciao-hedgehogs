<?php namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Domain;
use App\Models\Menu;
use App\Models\SecretQuestion;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller {


  /**
   * @param $nickname
   * @return string retourne false si le pseudo est disponible sinon true
   */
  public function nicknameCheck($nickname)
  {

    //Vérifie l'existence du user
    $isAvailable = User::exists($nickname);
    $isAvailable = !$isAvailable;

    return json_encode(['valid' => $isAvailable]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

    $data=[];

    $data = Menu::getDomains();
    $data['user'] = User::where('id', Session::get('id'))->with( 'expertInDomains.domainQuestions.answer', 'expertInDomains.domainQuestions.domain', 'questions.answer', 'domains', 'userProfile', 'createdTopics.domain')->get()->first();

    $data['unansweredQuestionsExpert'] = $data['user']->unansweredQuestionsExpert();

    $data['myAnsweredQuestions'] = $data['user']->myAnsweredQuestions();

    $data['questionsNotAnswered'] = $data['user']->questionsNotAnswered();
    $data['questionsAnswered'] = $data['user']->questionsAnswered();

    $data['refusedTopics'] = $data['user']->refusedTopics();
    $data['myTopicsValidated'] = $data['user']->myTopicsValidated();

    // pour l'utilisateur, on va envoyer son rôle à la vue
    //
    // si c'est un expert chopper ses domaines, les questions à repondre
    // si c'est un user on va prendre ses questions et réponses

    return view('view_dashboard', $data);
  }



  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $secretQuestion = SecretQuestion::all();
    $data = Menu::getDomains();
    $data['secretQuestion'] = $secretQuestion;

    return view('view_registrationForm', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    // On demande au modèle User, de valider les données contenues dans la $request
    $validate = User::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {

      // On redirige l'utilisateur (redirect()) sur le formulaire (back())
      // avec les inputs tapés (withInput()) et les erreurs de validation (withErrors($validate))
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Erreur de saisie'], 400);
    }

    //Ajout dans la BD
    try{
      User::createOne($validate->getData());
      Message::success('saved');

      return Response::view('errors.200',['url' => '/home','message'=>'Discussion créée !'], 200);

    }
    catch(\Exception $e){

      Message::error('error');
      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Problème de connexion à la base de donnée'], 400);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
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
