<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'group';
	public $timestamps = true;

	public function serviceApplicatifs()
	{
		return $this
			->belongsToMany('App\Models\ServiceApplicatif')
			->withTimestamps();
	}

	public function users()
	{
		return $this->belongsToMany('App\Models\User')->withTimestamps();
	}

	public function serviceApplicatifs()
	{
		return $this->belongsToMany('App\Models\ServiceApplicatif')->withTimestamps();
	}

}