<?php namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnswerController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
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
    // On demande au modèle Answer, de valider les données contenues dans la $request
    $validate = Answer::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {

      return Response::view('errors.400',['url' =>redirect()->back()->getTargetUrl(),'message'=>'Erreur de saisie'], 400);
    }

    //Ajout dans la BD
    try{
      Answer::createOne($validate->getData());
      return Response::view('errors.200',['url' => '/dashboard','message'=>'Question répondue !'], 200);

    }
    catch(\Exception $e){
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