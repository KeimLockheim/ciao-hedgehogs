<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Session;

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


	/**
	 * Valide les $input reçus pour la création d'un nouveau Domain
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('isDomain','parentDomains', 'newDomain','description', 'content');

		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {

			// Vérification de la non existence du nouveau domain
			if (self::exists($input['newDomain'])) {
				$validator->errors()->add('exists', ('exists'));
			}

			// Vérification de l'existence du domain parent si spécifié
			if($input['isDomain'] == "non"){
				if (!self::existsWithId($input['parentDomains'])) {
					$validator->errors()->add('exists',('exists'));
				}
			}

		});
		// Renvoi du validateur
		return $validator;
	}




	//=======================================================================
	//								Relations
	//
	//=======================================================================

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

	//Retourne les users liés au domain
	public function users()
	{
		return $this->belongsToMany('App\Models\User', 'domain_user', 'domain_id', 'user_id')->withTimestamps();
	}

	//Retourne les urgencies en rapport avec le domaine
	public function urgencies(){
		return $this->hasMany('App\Models\Urgency', 'domain_id');
	}



	//=======================================================================
	//								Methods
	//
	//=======================================================================

	/** Vérifie que le domaine est un subdomain
	 * @return bool qui est true si le domain est un sous domaine, sinon, retourne false
	 */
	public function isSubdomain(){
		$parentDomains = $this->parentDomain;
		if (!empty($parentDomains)){
			return true;
		}

		return false;
	}

	/** Récupère tous les domains qui n'ont pas de parent
	 * @return $parentDomains un tableau contenant tous les domaines n'ayant pas de parent
	 */
	public static function parentDomains()
	{
		$parentDomains = self::where('parentDomain_id', null)->get();
		return $parentDomains;
	}


	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $name nom à vérifier
	 * @return bool
	 */
	public static function exists($name)
	{
		return self::where('name', $name)->first() !== null;
	}

	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $id id à vérifier
	 * @return bool
	 */
	public static function existsWithId($id)
	{
		return self::find($id)->first() !== null;
	}

	/**
	 * Enregistre un nouveau Domain selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de Domain
		$obj = new Domain();
		// Définition des propriétés
		$obj->name = $values['newDomain'];
		if($values['isDomain'] == 'non'){
			$obj->parentDomain_id = $values['parentDomains'];
		}

		$obj->description = $values['description'];
		$obj->content = $values['content'];
		$obj->created_by = Session::get('id');
		// Enregistrement du Domain
		$obj->save();
	}
}