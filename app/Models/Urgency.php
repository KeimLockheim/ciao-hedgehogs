<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelsUrgency extends Model
{
    protected $table = 'urgencies';
    public $timestamps = true;
    protected $softDelete = false;

    //Retourne le domaine relatif à l'urgency
    public function domain(){
        return $this->belongsTo('App\Models\Domain', 'domain_id');
    }
}
