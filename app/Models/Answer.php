<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	//Règles pour les inputs
	public static $rules = [
		'theme' => 'required|String', //question -> subBomain_id
		'answerQuestion' => 'required|String', //content
		'titleQuestion' => 'required|String', //question -> name
	];

	protected $table = 'answers';
	public $timestamps = true;
	protected $softDelete = false;

	/**
	 * Valide les $input reçus pour la création d'une nouvelle Answer
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('pseudo', 'password','password2', 'birth', 'country','genre','secreteQuestion','answerQuestion');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {
			// Vérification de la non existence de l'utilisateur
			if (self::exists($input['pseudo'])) {

				$validator->errors()->add('exists', Message::get('exists'));
			}
			// Vérification de l'existence de la question secrète
			if (!self::exists($input['secreteQuestion'])) {

				$validator->errors()->add('exists', Message::get('exists'));
			}

		});
		// Renvoi du validateur
		return $validator;
	}


	//=======================================================================
	//								Relations
	//
	//=======================================================================
	//Retourne l'utilisateur qui a écrit la réponse
	public function answererUser(){
		return $this->belongsTo('App\Models\User', 'answered_by');
	}

	//Retourne la question à laquelle se rapporte la question
	public function question(){
		return $this->belongsTo('App\Models\Question', 'question_id');
	}


}
