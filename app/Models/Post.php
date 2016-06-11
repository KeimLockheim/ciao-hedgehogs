<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	//Règles pour les inputs
	public static $rules = [
		'parentPost_id' => 'Integer', //parentPost_id
		'topic_id' => 'required|Integer', //topic_id
		'answer' => 'required|String', //content
	];

	protected $table = 'posts';
	public $timestamps = true;
	protected $softDelete = false;

	/**
	 * Valide les $input reçus pour la création d'un nouveau Post
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('parentPost_id', 'topic_id','answer');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {

			// Vérification de l'existence du post parent si spécifié
			if(!empty($input['parentPost_id'])){
				if (!self::exists($input['parentPost_id'])) {
					$validator->errors()->add('exists', Message::get('exists'));
				}
			}

		});
		// Renvoi du validateur
		return $validator;
	}

	//=======================================================================
	//								Relations
	//
	//=======================================================================

	//Retourne le topic au quel le post se rapporte
	public function topic(){
		return $this->belongsTo('App\Models\Topic','topic_id');
	}

	//Retourne le user qui a écrit le post
	public function writterUser(){
		return $this->belongsTo('App\Models\User','written_by');
	}

	//Retourne le user qui edité le post
	public function updaterUser(){
		return $this->belongsTo('App\Models\User','updated_by');
	}

	//Retourne le user qui a supprimé le post
	public function deleterUser(){
		return $this->belongsTo('App\Models\User','deleted_by');
	}

	//Retourne le post parent à ce post
	public function parentPost(){
		return $this->belongsTo('App\Models\Post','parentPost_id');
	}

	//Retourne les posts enfants à ce post
	public function childrenPosts(){
		return $this->hasMany('App\Models\Post','parentPost_id');
	}

	//=======================================================================
	//								Methods
	//
	//=======================================================================

	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $id id à vérifier
	 * @return bool
	 */
	public static function exists($id)
	{
		return self::find($id) !== null;
	}

	/**
	 * Enregistre un nouveau Post selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de User
		$obj = new Domain();
		// Définition des propriétés
		$obj->parentPost_id = $values['parentPost_id'];
		$obj->topic_id = $values['topic_id'];
		$obj->content = $values['answer'];
		$obj->written_by = Session::get('user_id');
		// Enregistrement du Domain
		$obj->save();
	}


}