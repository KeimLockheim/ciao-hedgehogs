<?php
/**
 * Created by PhpStorm.
 * User: maicanthoine
 * Date: 13.06.16
 * Time: 15:29
 */

namespace App\Models;

use App\Models\Domain;
use Session;


class Menu
{
    public static function getDomains(){
        $user = null;
        if(Session::get('id') != null){
            $user = User::find(Session::get('id'))->first();
        }
        return ['domSante' => Domain::where('name','Santé')->first()->subDomains,
            'domStress' =>Domain::where('name','Stress')->first()->subDomains,
            'domBoire' => Domain::where('name','Boire, fumer, se droguer')->first()->subDomains,
            'domManger' => Domain::where('name','Manger-bouger')->first()->subDomains,
            'domEstime' => Domain::where('name','Estime de soi')->first()->subDomains,
            'domMoi' => Domain::where('name','Moi, toi et les autres')->first()->subDomains,
            'domSex' => Domain::where('name','Sexualité')->first()->subDomains,
            'domViolences' => Domain::where('name','Violences')->first()->subDomains,
            'domDiscrim' => Domain::where('name','Discrimination et racismes')->first()->subDomains,
            'domArgent' => Domain::where('name','Argent')->first()->subDomains,
            'domReligions' => Domain::where('name','Religions')->first()->subDomains,
            'domFormations' => Domain::where('name','Formation et travail')->first()->subDomains,
            'userConnected' => $user];
    }
}