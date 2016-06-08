<?php

use Illuminate\Database\Seeder;
use \App\Models\SecretQuestion;
use \App\Models\Group;
use \App\Models\Domain;
use \App\Models\User;

class GlobalSeeder extends Seeder
{
    public function run()
    {

        /*
         * Secret questions
         */
        DB::table('secretQuestions')->delete();
        $q1 = SecretQuestion::create([
            'name' => 'Le nom de ton premier doudou',
        ]);
        $q2 = SecretQuestion::create([
            'name' => 'Le nom de jeune fille de ta mère',
        ]);


        /*
         * Groups
         */
        DB::table('groups')->delete();
        $gDefault = Group::create([
            'name' => 'default',
        ]);
        $gExpert = Group::create([
            'name' => 'expert',
        ]);
        $gAdministrator = Group::create([
            'name' => 'administrator',
        ]);


        /*
         * Domain
         */

        DB::table('domains')->delete();

        $domSante = new Domain([
            'name' => 'Santé',
        ]);
        $domSexualite = new Domain([
            'name' => 'Sexualité',
        ]);
        $domViolence = new Domain([
            'name' => 'Violence',
        ]);
        $domReligion = new Domain([
            'name' => 'Religion',
        ]);

        $domRapports = new Domain([
            'name' => 'Rapports',
        ]);

        $domRapports->parentDomain()->associate($domSexualite);




        /*
         * Users
         */
        DB::table('users')->delete();

        $admin = new User([
            'nickname' => 'admin',
            'birthyear' => 1934,
            'sex' => 'féminin',
            'localisation' => 'Vaud',
            'password' => bcrypt('admin'),
            'secretQuestionAnswer' => 'lala'
        ]);
        $admin->secretQuestion()->associate($q2);
        $gAdministrator->users()->save($admin);
        $admin->save();

        $expert = new User([
            'nickname' => 'expert',
            'birthyear' => 1999,
            'sex' => 'masculin',
            'localisation' => 'Neuchâtel',
            'password' => bcrypt('expert'),
            'secretQuestionAnswer' => 'hihi'
        ]);

        $expert->secretQuestion()->associate($q1);
        $gExpert->users()->save($expert);
        $expert->save();

        /*$default = User::create([
            'nickname' => 'default',
            'birthyear' => 1999,
            'sex' => 'féminin',
            'localisation' => 'Neuchâtel',
            'password' => bcrypt('default'),
        ]);*/





        $domSante->creatorUser()->associate($admin);
        $domSexualite->creatorUser()->associate($admin);
        $domReligion->creatorUser()->associate($admin);
        $domViolence->creatorUser()->associate($admin);
        $domRapports->creatorUser()->associate($admin);

        $domSante->save();
        $domSexualite->save();
        $domReligion->save();
        $domViolence->save();

        $domRapports->parentDomain()->associate($domSexualite);
        $domRapports->save();
    }
}