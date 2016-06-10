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



	//=======================================================================
	//								Methods
	//
	//=======================================================================

	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $id l'identifiant de la question secrète  vérifier
	 * @return bool
	 */
	public static function exists($id)
	{
		return self::find($id) !== null;
	}

}