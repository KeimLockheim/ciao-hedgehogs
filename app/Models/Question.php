<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;


class Question extends Model {

	//Règles pour les inputs
	public static $rules = [
		'domain' => 'required|Integer', //domain_id
		'subDomain' => 'Integer', //subDomain_id
		'content' => 'required|String', //content
	];

	protected $table = 'questions';
	public $timestamps = true;
	protected $softDelete = false;

	/**
	 * Valide les $input reçus pour la création d'une nouvelle Question
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('domain', 'subDomain','content');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {

			// Vérification de l'existence du sous domain si spécifié
			if(!empty($input['subDomain'])){
				if (!Domain::existsWithId($input['subDomain'])) {
					$validator->errors()->add('exists', 'exists');
				}
			}
			// Vérification de l'existence du domain
			if (!Domain::existsWithId($input['domain'])) {
				$validator->errors()->add('exists', 'exists');
			}

		});
		// Renvoi du validateur
		return $validator;
	}

	//=======================================================================
	//								Relations
	//
	//=======================================================================
	//Retourne la réponses a rapport à cette question
	public function answer(){
		return $this->hasOne('App\Models\Answer','question_id');
	}

	//Retourne l'utilisateur qui a posé la question
	public function questionUser(){
		return $this->belongsTo('App\Models\User', 'asked_by');
	}

	//Retourne le domain en rapport avec la question
	public function domain(){
		return $this->belongsTo('App\Models\Domain', 'domain_id');
	}

	//Retourne le subDomaine en rapport avec la question
	public function subDomain(){
		return $this->belongsTo('App\Models\Domain', 'subDomain_id');
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

	/**
	 * Enregistre un nouveau Domain selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de Question
		$obj = new Question();
		// Définition des propriétés
		$obj->domain_id = $values['domain'];
		$obj->subDomain_id = $values['subDomain'];
		$obj->content = $values['content'];
		$obj->asked_by = Session::get('id');
		// Enregistrement de la question
		$obj->save();
	}

}
