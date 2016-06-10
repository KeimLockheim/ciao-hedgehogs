<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Domain extends Model
{

	//Règles pour les inputs
	public static $rules = [
		'parentDomains' => 'Integer', //parentDomain_id
		'newDomain' => 'required|String', //name
		'description' => 'required|String', //description
		'content' => 'String', //content
	];

	protected $table = 'domains';
	public $timestamps = true;
	protected $softDelete = false;


	//Retourne le domain parent à ce domain
	public function parentDomain()
	{
		return $this->belongsTo('App\Models\Domain', 'parentDomain_id');
	}

	//Retourne les domains enfants à ce domain
	public function subDomains()
	{
		return $this->hasMany('App\Models\Domain', 'parentDomain_id');
	}

	//Retourne l'utilisateur qui a créé le domain
	public function creatorUser()
	{
		return $this->belongsTo('App\Models\User', 'created_by');
	}

	//Retourne les topics liés au domain
	public function topics()
	{
		return $this->hasMany('App\Models\Topic', 'domain_id');
	}

	//Retourne les topics liés au subDomain //à vérifier
	public function subDomainTopics()
	{
		return $this->hasMany('App\Models\Topic', 'subDomain_id');
	}

		//Retourne les questions liés au domain
		public function domainQuestions()
	{
		return $this->hasMany('App\Models\Question', 'domain_id');
	}

		//Retourne les questions liés au subDomain
		public function subDomainQuestions()
	{
		return $this->hasMany('App\Models\Question', 'subDomain_id');
	}

		//Retourne les groupes liés au domain
		public function groups()
	{
		return $this->belongsToMany('App\Models\Group', 'domain_group', 'domain_id', 'group_id')->withTimestamps();
	}


	//isSubdomain()
	public function isSubdomain(){
		$parentDomains = $this->parentDomain;
		if (!empty($parentDomains)){
			return true;
		}

		return false;
	}

	public static function parentDomains()
	{
		$parentDomains = self::where('parentDomain_id', null);
		return $parentDomains;
	}

			//childrenDomains(domainID)
}