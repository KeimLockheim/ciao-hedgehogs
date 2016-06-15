<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class Topic extends Model {

	//Règles pour les inputs
	public static $rules = [
		'domain_id' => 'required|integer|min:0', //domain_id
		'topicName' => 'required|String', //name
		'topicPost' => 'required|String', //post -> content

	];

	/**
	 * Valide les $input reçus pour la création d'un nouveau Topic
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('domain_id', 'topicName','topicPost');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {
			$user = User::find(Session::get('id'));
			// Vérification de l'existence de l'utilisateur
			if ($user == null) {

				$validator->errors()->add('exists', Message::get('exists'));
			}


		});
		// Renvoi du validateur
		return $validator;
	}

	protected $table = 'topics';
	public $timestamps = true;
	protected $softDelete = false;

	//=======================================================================
	//								Relations
	//
	//=======================================================================

	//Retourne les posts qui sont dans ce topic
	public function posts(){
		return $this->hasMany('App\Models\Post','topic_id');
	}

	//Retourne le domain auquel est lié le topic
	public function domain(){
		return $this->belongsTo('App\Models\Domain', 'domain_id');
	}

	//Retourne l'utilisateur qui a créé le topic
	public function creatorUser(){
		return $this->belongsTo('App\Models\User', 'created_by');
	}

	//Retourne l'utilisateur qui a updaté le topic
	public function updaterUser(){
		return $this->belongsTo('App\Models\User', 'updated_by');
	}

	//Retourne l'utilisateur qui a validé le topic
	public function validatorUser(){
		return $this->belongsTo('App\Models\User', 'validated_by');
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
		return self::find($id)->first() !== null;
	}

	/** Récupère le prochain id de la table topics
	 * @return $id prochain identifiant dans la table topics
	 */
	protected static function getNextID()
	{
		$id = DB::table('topics')->max('id');
		return ++$id;
	}

	/**
	 * Enregistre un nouveau Topic selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		$post = new Post();
		$post->content = $values['topicPost'];
		$post->written_by = Session::get('id');

		// Nouvelle instance de Topic
		$topic = new Topic();
		// Définition des propriétés
		$topic->domain_id = $values['domain_id'];
		$topic->name = $values['topicName'];
		$topic->created_by = Session::get('id');

		// Enregistrement du Topic et de son post
		$topic->save();
		$post->topic()->associate($topic);
		$post->save();
		
	}
}