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

}