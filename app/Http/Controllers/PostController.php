<?php namespace App\Http\Controllers;

use App\Models\Post;
use Request;
use App\Lib\Message;

class PostController extends Controller {

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
    // On demande au modèle Post, de valider les données contenues dans la $request
    $validate = Post::getValidation($request);

    // Si la validation échoue
    if ($validate->fails()) {
      return redirect()->back()->withInput()->withErrors($validate);
    }

    //Ajout dans la BD
    try{
      Post::createOne($validate->getData());
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