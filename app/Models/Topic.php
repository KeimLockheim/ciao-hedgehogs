<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

	protected $table = 'topic';
	public $timestamps = true;

	//Retourne les forums que en rapport au topic
	public function forums(){
		return $this->hasMany('App\Models\Forum','forum_id');
	}

	//Retourne les posts qui sont dans ce topic
	public function posts(){
		return $this->hasMany('App\Models\Post','topic_id');
	}

	//Retourne le forum auquel est lié le topic
	public function forum(){
		return $this->belongsTo('App\Models\Forum', 'forum_id');
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