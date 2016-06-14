<?php namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Domain;
use App\Models\Menu;
use App\Models\SecretQuestion;
use App\Models\User;
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

    $data = Menu::getDomains();

    $user = User::where('id', Session::get('id'))->with('refusedTopics', 'groups','answers', 'domains', 'questions', 'userProfile', 'createdTopics', 'validatedTopics')->get()->first();

    $data['user'] = $user;

    // pour l'utilisateur, on va envoyer son rôle à la vue
    //
    // si c'est un expert chopper ses domaines, les questions à repondre
    // si c'est un user on va prendre ses questions et réponses

    return view('view_homePage', $data);
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
      return redirect()->back()->withInput()->withErrors($validate);
    }

    //Ajout dans la BD
    try{
      User::createOne($validate->getData());
      Message::success('saved');

      return redirect('home');
    }
    catch(\Exception $e){

      Message::error('error');
      return redirect()->back()->withInput();
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
