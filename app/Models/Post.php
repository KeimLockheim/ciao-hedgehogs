<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'post';
	public $timestamps = true;

	//Retourne le topic au quel le post se rapporte
	public function topic(){
		return $this->belongsTo('App\Models\Topic','topic_id');
	}

	//Retourne le user qui a écrit le post
	public function writterUser(){
		return $this->belongsTo('App\Models\User','written_by');
	}

	//Retourne le user qui edité le post
	public function updaterUser(){
		return $this->belongsTo('App\Models\User','updated_by');
	}

	//Retourne le user qui a supprimé le post
	public function deleterUser(){
		return $this->belongsTo('App\Models\User','deleted_by');
	}

	//Retourne le post parent à ce post
	public function parentPost(){
		return $this->belongsTo('App\Models\Post','parentPost_id');
	}

	//Retourne les posts enfants à ce post
	public function childrenPosts(){
		return $this->hasMany('App\Models\Post','parentPost_id');
	}


}