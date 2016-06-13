<?php namespace App\Http\Controllers;

use App\Lib\Message;
use App\Models\Domain;
use App\Models\SecretQuestion;
use App\Models\User;
use Request;

class UserController extends Controller {



  public function nicknameExists($nickname)
  {

    //Vérifie l'existence du user
    $isAvailable = User::exists($nickname);

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
    //$user = User::where('id', Auth::id())->with('userProfile')->get()->first();
    $user = User::where('id', 1)->with('groups','userProfile')->get()->first();
    //dd($user->userProfile);
    $data['user'] = User::where('id', 1)->with('groups','answers', 'domains', 'questions', 'userProfile', 'createdTopics', 'validatedTopics')->get()->first();

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

    return view('view_registrationForm', ['secretQuestion' => $secretQuestion,'domSante' => Domain::where('name','Santé')->first()->subDomains,
        'domStress' =>Domain::where('name','Stress')->first()->subDomains,
        'domBoire' => Domain::where('name','Boire, fumer, se droguer')->first()->subDomains,
        'domManger' => Domain::where('name','Manger-bouger')->first()->subDomains,
        'domEstime' => Domain::where('name','Estime de soi')->first()->subDomains,
        'domMoi' => Domain::where('name','Moi, toi et les autres')->first()->subDomains,
        'domSex' => Domain::where('name','Sexualité')->first()->subDomains,
        'domViolences' => Domain::where('name','Violences')->first()->subDomains,
        'domDiscrim' => Domain::where('name','Discrimination et racismes')->first()->subDomains,
        'domArgent' => Domain::where('name','Argent')->first()->subDomains,
        'domReligions' => Domain::where('name','Religions')->first()->subDomains,
        'domFormations' => Domain::where('name','Formation et travail')->first()->subDomains,]);
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
      return redirect('user');
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
