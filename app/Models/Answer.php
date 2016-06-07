<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'answer';
	public $timestamps = true;


	//Retourne l'utilisateur qui a écrit la réponse
	public function answerByUser(){
		return $this->belongsTo('App\Models\User');
	}

}