<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'question';
	public $timestamps = true;


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

}