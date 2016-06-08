<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model {

	protected $table = 'forum';
	public $timestamps = true;

	//Retourne le domain auquel le forum se rapporte
	public function domain(){
		return $this->belongsTo('App\Models\Domain','domain_id');
	}

	//Retourne l'utilisateur qui a créé la question
	public function creatorUser(){
		return $this->belongsTo('App\Models\User','created_by');
	}

	//Retourne les topics que en rapport au forum
	public function topics(){
		return $this->hasMany('App\Models\Topic','forum_id');
	}

}