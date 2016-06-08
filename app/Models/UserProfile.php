<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //Retourne l'utilisateur relatif au userProfile
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
