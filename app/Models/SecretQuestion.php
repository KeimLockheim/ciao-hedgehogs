<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecretQuestion extends Model {

	protected $table = 'secretQuestions';
	public $timestamps = false;

	//Retourne les utilisateurs qui ont cette secretQuestion
	public function users(){
		return $this->hasMany('App\Models\User','secretQuestion_id');
	}

}