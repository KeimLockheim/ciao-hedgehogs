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
