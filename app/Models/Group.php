<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	//Règles pour les inputs
	public static $rules = [
		'name' => 'required|String', //name
	];

	protected $table = 'groups';
	public $timestamps = true;
	protected $softDelete = false;

	//=======================================================================
	//								Relations
	//
	//=======================================================================

	//Retourne les servicesApplicatifs liés au group
	public function serviceApplicatifs()
	{
		return $this
			->belongsToMany('App\Models\serviceApplicatif','group_serviceApplicatif', 'group_id','serviceApplicatif_id')
			->withTimestamps();
	}

	//Retourne les users liés au group
	public function users()
	{
		return $this->belongsToMany('App\Models\User','group_user','group_id','user_id')->withTimestamps();
	}

}