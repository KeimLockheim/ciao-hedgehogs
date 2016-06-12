<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecretQuestion extends Model {

	//Règles pour les inputs
	public static $rules = [
		'name' => 'required|String', //name
	];

	protected $table = 'secretQuestions';
	public $timestamps = false;
	protected $softDelete = false;


	/**
	 * Valide les $input reçus pour la création d'un nouveau Domain
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('name');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {

			// Vérification de la non existence de la question secrete
			if (self::exists($input['name'])) {

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

	//Retourne les utilisateurs qui ont cette secretQuestion
	public function users(){
		return $this->hasMany('App\Models\User','secretQuestion_id');
	}



	//=======================================================================
	//								Methods
	//
	//=======================================================================

	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $id l'identifiant de la question secrète  vérifier
	 * @return bool
	 */
	public static function exists($id)
	{
		return self::find($id) !== null;
	}

	/**
	 * Enregistre un nouvelle question secrete selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de User
		$obj = new SecretQuestion();
		// Définition des propriétés
		$obj->name = $values['name'];
		// Enregistrement de la question secrète
		$obj->save();
	}

}