<?php

namespace App\Models;

use App\Lib\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class User extends Model {

	//Règles pour les inputs
	public static $rules = [
		'pseudo' => 'required|regex:/^[a-zA-Z0-9_]+$/', //nickname
		'password' => 'required|String',
		'password2' => 'required|String|same:password',
		'birth' => 'required|integer|min:1920|max:2017', //birthyear
		'country' => 'required|String', //localisation
		'sex' => 'required|in:"féminin","masculin"', //sex
		'secretQuestion' => 'required|integer|min:0', //secretQuestion_id
		'answerQuestion' => 'required|String', //secretAnswerQuestion

	];

	protected $table = 'users';
	public $timestamps = true;
	protected $softDelete = false;

	/**
	 * Valide les $input reçus pour la création d'un nouveau User
	 * @param Request $request
	 * @return void|$this
	 */
	public static function getValidation(Request $request)
	{
		// Récupération des inputs pertinents
		$input = $request->only('pseudo', 'password','password2', 'birth', 'country','genre','secreteQuestion','answerQuestion');
		// Création du validateur
		$validator = Validator::make($input, self::$rules);
		// Ajout des contraintes supplémentaires
		$validator->after(function ($validator) use($input) {
			// Vérification de la non existence de l'utilisateur
			if (self::exists($input['pseudo'])) {

				$validator->errors()->add('exists', Message::get('exists'));
			}
			// Vérification de l'existence de la question secrète
			if (!self::exists($input['secreteQuestion'])) {

				$validator->errors()->add('exists', Message::get('exists'));
			}

		});
		// Renvoi du validateur
		return $validator;
	}





	//=======================================================================
	//								Relations
	//
	//=======================================================================

	//Retourne les réponses que l'utilisateur a écrites
	public function answers(){
		return $this->hasMany('App\Models\Answer', 'answered_by');
	}

	//Retourne les domains que l'utilisateur a créé
	public function domains(){
		return $this->hasMany('App\Models\Domain','created_by');
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

	//Retourne le userProfile relatif à ce user
	public function userProfile(){
		return $this->belongsTo('App\Models\UserProfile', 'user_id');
	}

	//Retourne les groupes dont le user fait parti
	public function groups()
	{
		return $this->belongsToMany('App\Models\Group','group_user','user_id','group_id')->withTimestamps();
	}



	//=======================================================================
	//								Methods
	//
	//=======================================================================


	//Retourne vrai si le user fait parti du groupe passé en paramètre
	public function hasGroup($role)
	{
		$groups = $this->groups;
		foreach($groups as $group){
			if($group->name == $role){
				return true;
			}
		}
		return false;
	}



	/**
	 * Vérifie s'il n'y a pas déjà une entrée dans la BD.
	 * @param $pseudo le pseudo à vérifier
	 * @return bool
	 */
	public static function exists($pseudo)
	{
		return self::where('nickname', $pseudo) !== null;
	}



	/**
	 * Enregistre un nouvel User selon les $values reçues
	 * @param array $values An array containing the values to insert
	 */
	public static function createOne(array $values)
	{
		// Nouvelle instance de User
		$obj = new ArticlePublicitaire();
		// Définition des propriétés
		$obj->nickname = $values['pseudo'];
		$obj->password = bcrypt($values['password']);
		$obj->birthyear = $values['birth'];
		$obj->localisation = $values['country'];
		$obj->sex = $values['genre'];
		$obj->secretQuestion_id = $values['secreteQuestion'];
		$obj->secretAnswerQuestion = $values['answerQuestion'];
		$obj->secretAnswer = $values['answerQuestion'];
		// Enregistrement du User
		$obj->save();
	}

}