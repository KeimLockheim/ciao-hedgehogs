<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
		$obj->asked_by = Session::get('user_id');
		// Enregistrement de la question
		$obj->save();
	}

}
