<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model {

	protected $table = 'domain';
	public $timestamps = true;


	//Retourne le domain parent à ce domain
	public function parentDomain(){
		return $this->belongsTo('App\Models\Domain', 'parentDomain_id');
	}

	//Retourne les domains enfants à ce domain
	public function childrenDomains(){
		return $this->hasMany('App\Models\Domain', 'parentDomain_id');
	}

	//Retourne l'utilisateur qui a créé le domain
	public function creatorUser(){
		return $this->belongsTo('App\Models\User','created_by');
	}

	//Retourne les topics liés au domain
	public function topics(){
		return $this->hasMany('App\Models\Topics','domain_id');
	}

	//Retourne les questions liés au domain
	public function domainQuestions(){
		return $this->hasMany('App\Models\Question','domain_id');
	}

	//Retourne les questions liés au subDomain
	public function subDomainQuestions(){
		return $this->hasMany('App\Models\Question','subDomain_id');
	}

	//Retourne les groupes liés au domain
	public function groups()
	{
		return $this->belongsToMany('App\Models\Group','domain_group','domain_id','group_id')->withTimestamps();
	}
}