<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Answer extends Model {

	//Règles pour les inputs
	public static $rules = [
		'theme' => 'required|String', //question -> subBomain_id
		'answerQuestion' => 'required|String', //content
		'titleQuestion' => 'required|String', //question -> name
		'question_id' => 'required|Integer',//question_id
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
		$input = $request->only('theme', 'answerQuestion','titleQuestion', 'question_id');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {
			// Vérification de l'existence de la question
			if (!self::exists($input['question_id'])) {
				dd('1');
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
	//Retourne l'utilisateur qui a écrit la réponse
	public function answererUser(){
		return $this->belongsTo('App\Models\User', 'answered_by');
	}

	//Retourne la question à laquelle se rapporte la question
	public function question(){
		return $this->belongsTo('App\Models\Question', 'question_id');
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
	 * Enregistre un nouvelle Answer selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de Answer
		$obj = new Answer();
		// Définition des propriétés
		$obj->question_id = $values['question_id'];
		$obj->content = $values['answerQuestion'];
		$obj->answered_by = Session::get('id');
		// Enregistrement de la question
		$obj->save();

		$question_related = DB::table('questions')->find($values['question_id'])->first();
		$question_related->name = $values['titleQuestion'];
		if(!empty($values['theme'])){
			$question_related->subDomain_id = $values['theme'];
		}
		$question_related->update();

	}

}
