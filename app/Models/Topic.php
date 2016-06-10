<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Topic extends Model {

	//Règles pour les inputs
	public static $rules = [
		'domain_id' => 'required|integer|min:0', //domain_id
		'topicName' => 'required|String', //name
		'topicPost' => 'required|String', //post.content

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

	protected $table = 'topics';
	public $timestamps = true;
	protected $softDelete = false;

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
}