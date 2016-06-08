<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceApplicatif extends Model {

	protected $table = 'service_applicatif';
	public $timestamps = true;

	public function groups()
	{
		return $this
			->belongsToMany('App\Models\Group','group_serviceApplicatif', 'serviceApplicatif_id', 'group_id')
			->withTimestamps();
	}
}