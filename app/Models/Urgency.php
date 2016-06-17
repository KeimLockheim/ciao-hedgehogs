<?php

namespace App\Models;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Urgency extends Model
{
    //Règles pour les inputs
    public static $rules = [
        'domain_id' => 'Integer', //domain_id
        'name' => 'required|String', //name
        'email' => 'String', //email
        'webSite' => 'String', //webSite
        'telephoneNumber' => 'Integer', //webSite
    ];

    protected $table = 'urgencies';
    public $timestamps = false;
    protected $softDelete = false;


    /**
     * Valide les $input reçus pour la création d'une nouvelle urgency
     * @param Request $request
     * @return void|$this
     */
    public static function getValidation(Request $request)
    {
        // Récupération des inputs pertinents
        $input = $request->only('domain_id', 'name','email', 'website','telephoneNumber');
        // Création du validateur
        $validator = Validator::make($input, self::$rules);
        // Ajout des contraintes supplémentaires
        $validator->after(function ($validator) use($input) {

            // Vérification de l'existence du domain
            if (!self::exists($input['domain_id'])) {
                $validator->errors()->add('exists', 'exists');
            }

        });
        // Renvoi du validateur
        return $validator;
    }
    //=======================================================================
    //								Relations
    //
    //=======================================================================

    //Retourne le domaine relatif à l'urgency
    public function domain(){
        return $this->belongsTo('App\Models\Domain', 'domain_id');
    }
    //=======================================================================
    //								Methods
    //
    //=======================================================================

    /**
     * Vérifie s'il n'y a pas déjà une entrée dans la BD.
     * @param $name nom à vérifier
     * @return bool
     */
    public static function exists($name)
    {
        return self::where('name', $name) !== null;
    }

    /**
     * Enregistre une nouvelle Urgency selon les $values reçues
     * @param array $values An array containing the values to insert
     */
    public static function createOne(array $values)
    {
        // Nouvelle instance de Domain
        $obj = new Urgency();
        // Définition des propriétés
        $obj->name = $values['name'];
        if(!empty($values['email'])){
            $obj->email = $values['email'];
        }
        if(!empty($values['webSite'])){
            $obj->email = $values['webSite'];
        }
        if(!empty($values['telephoneNumber'])){
            $obj->email = $values['telephoneNumber'];
        }
        $obj->domain_id = $values['domain_id'];
        // Enregistrement du Domain
        $obj->save();
    }
}
