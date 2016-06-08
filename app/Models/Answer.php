<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'answer';
	public $timestamps = true;


	//Retourne l'utilisateur qui a écrit la réponse
	public function answerUser(){
		return $this->belongsTo('App\Models\User', 'answered_by');
	}

	//Retourne la question à laquelle se rapporte la question
	public function question(){
		return $this->belongsTo('App\Models\Question', 'question_id');
	}

}