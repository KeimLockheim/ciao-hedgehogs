<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = 'user';
	public $timestamps = true;

	//Retourne les réponses que l'utilisateur a écrites
	public function answers(){
		return $this->hasMany('App\Models\Answer', 'answered_by');
	}

	//Retourne les domains que l'utilisateur a créé
	public function domains(){
		return $this->hasMany('App\Models\Domain','created_by');
	}

	//Retourne les forums que l'utilisateur a créé
	public function forums(){
		return $this->hasMany('App\Models\Forum','created_by');
	}

	//Retourne les posts que l'utilisateur a écrit
	public function writtenPosts(){
		return $this->hasMany('App\Models\Post','written_by');
	}

	//Retourne les posts que l'utilisateur a supprimé
	public function deletedPosts(){
		return $this->hasMany('App\Models\Post','deleted_by');
	}

	//Retourne les posts que l'utilisateur a édité
	public function updatedPosts(){
		return $this->hasMany('App\Models\Post','updated_by');
	}

	//Retourne les questions que l'utilisateur a posés
	public function questions(){
		return $this->hasMany('App\Models\Question', 'asked_by');
	}

	//Retourne les topics que l'utilisateur a créé
	public function createdTopics(){
		return $this->hasMany('App\Models\Topic', 'created_by');
	}

	//Retourne les topics que l'utilisateur a updaté
	public function updatedTopics(){
		return $this->hasMany('App\Models\Topic', 'updated_by');
	}

	//Retourne les questions que l'utilisateur a validé
	public function validatedTopics(){
		return $this->hasMany('App\Models\Topic', 'validated_by');
	}

	//Retourne la question à laquelle se rapporte la question
	public function secretQuestion(){
		return $this->belongsTo('App\Models\SecretQuestion', 'secretQuestion_id');
	}

	//
	public function groups()
	{
		return $this->belongsToMany('App\Models\Group', 'group_user')->withTimestamps();
	}

}