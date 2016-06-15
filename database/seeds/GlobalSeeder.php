<?php

use Illuminate\Database\Seeder;
use \App\Models\SecretQuestion;
use \App\Models\Group;
use \App\Models\Domain;
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Topic;
use \App\Models\Question;
use \App\Models\Answer;
use App\Models\UserProfile;

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
         * Domains
         */

        DB::table('domains')->delete();

        $domSante = new Domain([
            'name' => 'Santé',
            'description' => 'Description',
        ]);
        
        $domQuestce = new Domain([
            'name' => "Qu'est-ce que le stress?",
            'description' => 'Description',
        ]);
        
         $domMecanismes = new Domain([
            'name' => "Mécanismes du stress",
            'description' => 'Description',
        ]);
        
         $domReponses = new Domain([
            'name' => "Réponses au stress",
            'description' => 'Description',
        ]);
        
        $domSymptomes = new Domain([
            'name' => "Symptômes du stress",
            'description' => 'Description',
        ]);
        
        $domSources = new Domain([
            'name' => "Sources du stress",
            'description' => 'Description',
        ]);
        
        $domFaireFace = new Domain([
            'name' => "Faire face au stress",
            'description' => 'Description',
        ]);
        
        $domSommeil = new Domain([
            'name' => "Stress et sommeil",
            'description' => 'Description',
        ]);
        
        $domExamens = new Domain([
            'name' => "Stress et examens",
            'description' => 'Description',
        ]);
        
        $domPuberte = new Domain([
            'name' => "Stress et puberté",
            'description' => 'Description',
        ]);
        
        $domQuotidien = new Domain([
            'name' => "Stress et quotidien",
            'description' => 'Description',
        ]);
        
        $domScolaire = new Domain([
            'name' => "Stress et vie scolaire",
            'description' => 'Description',
        ]);
        
        $domRessources = new Domain([
            'name' => "Ressources contre le stress",
            'description' => 'Description',
        ]);
        
        $domSexualite = new Domain([
            'name' => 'Sexualité',
            'description' => 'Description',
        ]);
        $domViolence = new Domain([
            'name' => 'Violences',
            'description' => 'Description',
        ]);
        $domReligion = new Domain([
            'name' => 'Religions',
            'description' => 'Description',
        ]);

        $domStress = new Domain([
            'name' => 'Stress',
            'description' => 'Description',
        ]);
        $domBoire = new Domain([
            'name' => 'Boire, fumer, se droguer',
            'description' => 'Description',
        ]);
        $domManger = new Domain([
            'name' => 'Manger-bouger',
            'description' => 'Description',
        ]);
        $domEstime = new Domain([
            'name' => 'Estime de soi',
            'description' => 'Description',
        ]);
        $domMoi = new Domain([
            'name' => 'Moi, toi et les autres',
            'description' => 'Description',
        ]);
        $domRapports = new Domain([
            'name' => 'Rapports',
            'description' => 'Description',
        ]);
        $domDiscrim = new Domain([
            'name' => 'Discrimination et racismes',
            'description' => 'Description',
        ]);
        $domArgent = new Domain([
            'name' => 'Argent',
            'description' => 'Description',
        ]);
        $domFormations = new Domain([
            'name' => 'Formation et travail',
            'description' => 'Description',
        ]);








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
            'secretQuestionAnswer' => bcrypt('lala'),
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
            'secretQuestionAnswer' => bcrypt('hihi'),
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

        /*
         * Posts
         */
        DB::table('posts')->delete();
        $p1 = new Post([
            'content' => 'lbsblsblsblsb',
        ]);
        $p2 = new Post([
            'content' =>'khjgxdfdfzghujihuigzutfzdrtrfguzhio' ,
        ]);
        $p3 = new Post([
            'content' => "arwtsezrdfugiuhogizfutzdsetarwtszdufgzuhijphougizufztsawrq3AWTSEZDRUFTGIZUHOIJPOHUIGUFZDW35ERZUIOUPIJOJPIOUZIT6R75E",
        ]);



        /*
         * Topics
         */
        DB::table('topics')->delete();
        $t1 = new Topic([
            'name' => 'Comment prier ?',
        ]);
        $t2 = new Topic([
            'name' => 'Pourquoi je dois joindre les mains pour prier ?',
        ]);
        $t3 = new Topic([
            'name' => "Je veux changer de religion, c'est grave ?",
        ]);

        $domSante->creatorUser()->associate($admin);
        $domQuestce->creatorUser()->associate($admin);
        $domMecanismes->creatorUser()->associate($admin);
        $domReponses->creatorUser()->associate($admin);
        $domSymptomes->creatorUser()->associate($admin);
        $domSources->creatorUser()->associate($admin);
        $domFaireFace->creatorUser()->associate($admin);
        $domSommeil->creatorUser()->associate($admin);
        $domExamens->creatorUser()->associate($admin);
        $domPuberte->creatorUser()->associate($admin);
        $domQuotidien->creatorUser()->associate($admin);
        $domScolaire->creatorUser()->associate($admin);
        $domRessources->creatorUser()->associate($admin);
        
        $domSexualite->creatorUser()->associate($admin);
        $domReligion->creatorUser()->associate($admin);
        $domViolence->creatorUser()->associate($admin);
        $domRapports->creatorUser()->associate($admin);

        $domStress->creatorUser()->associate($admin);
        $domBoire->creatorUser()->associate($admin);
        $domManger->creatorUser()->associate($admin);
        $domEstime->creatorUser()->associate($admin);
        $domMoi->creatorUser()->associate($admin);
        $domDiscrim->creatorUser()->associate($admin);
        $domArgent->creatorUser()->associate($admin);
        $domFormations->creatorUser()->associate($admin);

        $domSante->save();
        $domQuestce->save();
        $domMecanismes->save();
        $domReponses->save();
        $domSymptomes->save();
        $domSources->save();
        $domFaireFace->save();
        $domSommeil->save();
        $domExamens->save();
        $domPuberte->save();
        $domQuotidien->save();
        $domScolaire->save();
        $domRessources->save();
        
        $domSexualite->save();
        $domReligion->save();
        $domViolence->save();

        $domStress->save();
        $domBoire->save();
        $domManger->save();
        $domEstime->save();
        $domMoi->save();
        $domDiscrim->save();
        $domArgent->save();
        $domFormations->save();

        $domRapports->parentDomain()->associate($domSexualite);
        $domRapports->save();
        $domQuestce->parentDomain()->associate($domSante);
        $domQuestce->save();
        $domMecanismes->parentDomain()->associate($domSante);
        $domMecanismes->save();
        $domReponses->parentDomain()->associate($domSante);
        $domReponses->save();
        $domSymptomes->parentDomain()->associate($domSante);
        $domSymptomes->save();
        $domSources->parentDomain()->associate($domSante);
        $domSources->save();
        $domFaireFace->parentDomain()->associate($domSante);
        $domFaireFace->save();
        $domSommeil->parentDomain()->associate($domSante);
        $domSommeil->save();
        $domExamens->parentDomain()->associate($domSante);
        $domExamens->save();
        $domPuberte->parentDomain()->associate($domSante);
        $domPuberte->save();
        $domQuotidien->parentDomain()->associate($domSante);
        $domQuotidien->save();
        $domScolaire->parentDomain()->associate($domSante);
        $domScolaire->save();
        $domRessources->parentDomain()->associate($domSante);
        $domRessources->save();
        
        $t1->creatorUser()->associate($admin);
        $t1->domain()->associate($domReligion);
        $t2->creatorUser()->associate($admin);
        $t2->domain()->associate($domReligion);
        $t3->creatorUser()->associate($admin);
        $t3->domain()->associate($domReligion);

        $t1->save();
        $t2->save();
        $t3->save();

        $p1->writterUser()->associate($admin);
        $p1->topic()->associate($t1);
        $p2->writterUser()->associate($admin);
        $p2->topic()->associate($t2);
        $p3->writterUser()->associate($admin);
        $p3->topic()->associate($t3);

        $p1->save();
        $p2->save();
        $p3->save();


        /*
         * Question
         */
        DB::table('questions')->delete();

        $q1 = new Question([
            'content' => "asfasdfoifdsodfoéfdsdsfasdffshoésadfhdsfodflhwfweoew sadfdsaf fdsasdf dfasf fd dfs s ssfsfsf sfsf sfsfs ",
        ]);
        $q2 = new Question([
            'content' => "fsfdsdfs dfsf fds dafsfdsddsadsf dfsfsdsfs fsadsfadfdsdf fdaiojfdaspijndfsa ",
        ]);
        $q3 = new Question([
            'content' => "fsfdsdfs dfsf fds ds fsadliuikkukuikikiiuikikikiiupijndfsa",
        ]);


        $q1->questionUser()->associate($admin);
        $q1->domain()->associate($domSante);

        $q3->questionUser()->associate($admin);
        $q3->domain()->associate($domSante);

        $q2->questionUser()->associate($expert);
        $q2->domain()->associate($domSexualite);
        $q2->subDomain()->associate($domRapports);


        $q1->save();
        $q2->save();
        $q3->save();

        /*
         * Answer
         */
        DB::table('answers')->delete();
        $a1 = new Answer([
            'content' => " BLoubloubloub ",
        ]);
        $a2 = new Answer([
            'content' => "bluelulebuleuelueblubelueblueblu ",
        ]);

        $a1->answererUser()->associate($expert);
        $a1->question()->associate($q1);

        $a2->answererUser()->associate($expert);
        $a2->question()->associate($q2);

        $a1->save();
        $a2->save();

        /*
         * User Profile
         */
        DB::table('userProfiles')->delete();
        $up1 = new UserProfile([
            'firstName' => "Jean",
            'lastName' => "Peuplu",
            'email' => "jean.peuplu@example.com",
        ]);
        $up2 = new UserProfile([
            'firstName' => "Jeanette",
            'lastName' => "Lapine",
            'email' => "jeannette.lapine@example.com",
        ]);

        $up1->user()->associate($expert);
        $up2->user()->associate($admin);

        $up1->save();
        $up2->save();



    }
}