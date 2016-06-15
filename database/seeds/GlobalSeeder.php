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
        
        /*SANTE*/
        $domSante = new Domain([
            'name' => 'Santé',
            'description' => "la santé est un état de complet bien-être physique, psychologique et social et non une simple absence de maladie. Cela signifie que la santé est avant tout la capacité de construire un équilibre entre l'environnement et soi. Une personne atteinte d'un handicap ou d'une maladie chronique peut elle aussi se sentir en bonne santé.",
        ]);
        
        $domEtat = new Domain([
            'name' => "État de santé",
            'description' => 'Description',
        ]);
        
        $domOuQui = new Domain([
            'name' => "Où, qui consulter?",
            'description' => 'Description',
        ]);
        $domApparence = new Domain([
            'name' => "Apparence, de l'importance?",
            'description' => 'Description',
        ]);
        $domPercer = new Domain([
            'name' => "Percer, tatouer, épiler",
            'description' => 'Description',
        ]);
         $domPuberteG = new Domain([
            'name' => "Puberté chez les garçons",
            'description' => 'Description',
        ]);
        $domPuberteF = new Domain([
            'name' => "Puberté chez les filles",
            'description' => 'Description',
        ]);
       
        $domMusique = new Domain([
            'name' => "Musique et décibels",
            'description' => 'Description',
        ]);
        $domFatigue = new Domain([
            'name' => "Fatigue et sommeil",
            'description' => 'Description',
        ]);
        $domInfections = new Domain([
            'name' => "Infections et maladies",
            'description' => 'Description',
        ]);
        $domDepression = new Domain([
            'name' => "Dépression et suicide",
            'description' => 'Description',
        ]);
        $domSanteMentale = new Domain([
            'name' => "Santé mentale",
            'description' => 'Description',
        ]);
        $domSanteInternet = new Domain([
            'name' => "Santé et Internet",
            'description' => 'Description',
        ]);
        
        
        /*STRESS*/
        $domStress = new Domain([
            'name' => 'Stress',
            'description' => "Le stress est un phénomène naturel et utile. C’est l'ensemble des réponses d'un organisme soumis à des pressions ou des contraintes de la part de son environnement. Cela mobilise une certaine énergie qu’il est nécessaire de libérer pour retrouver un équilibre satisfaisant.",
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
        
        /*SEXUALITE*/
        $domSexualite = new Domain([
            'name' => 'Sexualité',
            'description' => "Ce qui caractérise les organismes vivants, c'est qu'ils sont capables de se reproduire, pour la survie de leur espèce. Se reproduire est quelque chose de concrètement facile à réaliser. On peut faire un enfant avec ou sans amour, avec ou sans plaisir, ou le plus distraitement du monde : ça fonctionne. Mais la sexualité est aussi d'une fascinante complexité : découverte de soi et découverte des autres, envies et craintes, limites personnelles et limites de la société, prises de risques et épanouissement.",
        ]);
        
        $domRapports = new Domain([
            'name' => 'Rapports',
            'description' => 'Description',
        ]);
        
        $domViolence = new Domain([
            'name' => 'Violences',
            'description' => "Qu'est-ce que la violence?
            C'est faire preuve de force et de brutalité en pensée ou en action. La violence est souvent liée à des problèmes de communication. Que faire face à la violence? La violence sous toutes ses formes doit être dénoncée car chacun a le droit de vivre en sécurité. Les actes de violence doivent être pris au sérieux : ils sont inacceptables et ne débouchent sur rien de constructif. Il faut lutter contre eux.",
        ]);
        $domReligion = new Domain([
            'name' => 'Religions',
            'description' => "Cette rubrique traite des principales religions: le bouddhisme, le christianisme, le judaïsme, l'Islam.Que tu sois un peu croyant, très religieux, pas pratiquant ou sans croyance aucune, tu y trouveras différentes informations sur les traditions et les croyances des principales religions, ainsi que  les textes de référence propres à chaque religion.",
        ]);

        /*BOIRE FUMER DROGUER*/
        $domBoire = new Domain([
            'name' => 'Boire, fumer, se droguer',
            'description' => "Un avis sur la chicha, la cigarette, le cannabis... des trucs pour arrêter, envie d'en discuter? Et l'alcool, parlons-en! C'est le bon endroit pour lancer ton débat, poster un commentaire, etc.",
        ]);
         $domDrogue = new Domain([
            'name' => "Les drogues",
            'description' => 'Description',
        ]);
        $domProduits = new Domain([
            'name' => "Les produits",
            'description' => 'Description',
        ]);
        $domConso = new Domain([
            'name' => "La consommation",
            'description' => 'Description',
        ]);
        $domEntourage = new Domain([
            'name' => "L'entourage",
            'description' => 'Description',
        ]);
        $domSociete = new Domain([
            'name' => "La société",
            'description' => 'Description',
        ]);
        $domBFEstime = new Domain([
            'name' => "Boire, fumer...et estime de soi",
            'description' => 'Description',
        ]);
        $domTropInt = new Domain([
            'name' => "Trop d'Internet",
            'description' => 'Description',
        ]);
        
        $domManger = new Domain([
            'name' => 'Manger-bouger',
            'description' => "Manger? Avoir faim, avoir envie de manger ou avoir de l'appétit, quelles différences? Bouger? Bon pour la tête, bon pour le corps? Les bienfaits du sport et du mouvement sont en effet multiples et encore davantage quand tu le fais avec plaisir! Se sentir trop gros? Vouloir être plus maigre? Se trouver pas assez musclée? Comment arriver à être content de son corps?",
        ]);
        $domEstime = new Domain([
            'name' => 'Estime de soi',
            'description' => "L'estime de soi varie comme la température de ton corps sur le thermomètre. Elle est changeante et il est possible qu'elle soit très haute ou très basse selon les périodes de la vie. Mais par tes choix et tes actes, tu as le pouvoir de l'améliorer! Teste-toi, fais les jeux, lis les infos, enregistre ton niveau d'estime quotidien, surfe sur ces pages... et tu verras qu'avoir une bonne estime de soi n'est pas insurmontable!",
        ]);
        $domMoi = new Domain([
            'name' => 'Moi, toi et les autres',
            'description' => "Les relations avec la famille, les amis, les copines, les liens entre les uns et les autres apportent de nombreuses joies. Elles posent aussi de multiples questions dans la vie de tous les jours. Comment arriver à se faire entendre, comment faire passer un message correctement, comment comprendre l'autre? Tu trouveras dans ce thème des informations pour mieux comprendre comment fonctionnent les relations entre les personnes en général et les liens avec ton entourage. Bienvenue dans le monde gigantesque des relations!",
        ]);

        $domDiscrim = new Domain([
            'name' => 'Discrimination et racismes',
            'description' => "Dans ce thème, CIAO essaie de répondre aux interrogations des jeunes sur des phénomènes qui les interpellent beaucoup et les divisent : le racisme et les discriminations. Pourquoi ça existe? Est-ce justifié? Est-ce inévitable? Et d'abord, ça commence où le racisme? Comment lutter contre? Comment argumenter? Comment se défendre quand on est attaqué? Tu trouveras donc des informations pour comprendre ce qu'est le racisme et ce que sont les discriminations. Nous essayons d'expliquer leurs mécanismes. Nous expliquons aussi en détail le cadre légal dans lequel nous vivons qui définit les droits et les devoirs de chacun sur le territoire de la Suisse.",
        ]);
        $domArgent = new Domain([
            'name' => 'Argent',
            'description' => "Comment gérer ton argent? Comment élaborer ton budget? Comment mieux consommer? Ca n'est pas toujours facile de bien gérer son argent. Mais c'est très important, surtout si on en a peu, pour pouvoir en profiter le mieux possible. Tu verras à travers ce thème que certains pièges peuvent être facilement évités, comme les désagréments qui vont avec.",
        ]);
        $domFormations = new Domain([
            'name' => 'Formation et travail',
            'description' => "Choisir une formation n'est pas toujours facile. Quelle filière choisir? Qu'est-ce qu'un apprentissage? Qui va financer ta formation? Entrer dans le monde du travail n'est pas toujours simple non plus. Pour rendre cela plus confortable, tu peux par exemple te renseigner sur les droits ou obligations de l'employé ou de l'employeur ou encore sur les différents types de contrat de travail. Etre bien renseigné, c'est déjà un atout pour bien commencer ta formation ou ta vie professionnelle!",
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

        /*SANTE*/
        $domSante->creatorUser()->associate($admin);
        $domEtat->creatorUser()->associate($admin);
        $domOuQui->creatorUser()->associate($admin);
        $domApparence->creatorUser()->associate($admin);
        $domPercer->creatorUser()->associate($admin);
        $domPuberteG->creatorUser()->associate($admin);
        $domPuberteF->creatorUser()->associate($admin);
        $domMusique->creatorUser()->associate($admin);
        $domFatigue->creatorUser()->associate($admin);
        $domInfections->creatorUser()->associate($admin);
        $domDepression->creatorUser()->associate($admin);
        $domSanteMentale->creatorUser()->associate($admin);
        $domSanteInternet->creatorUser()->associate($admin);
            
            
        /*STRESS*/
        $domStress->creatorUser()->associate($admin);
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
        
        /*BOIRE FUMER DROGUER*/
        $domBoire->creatorUser()->associate($admin);

        
        $domSexualite->creatorUser()->associate($admin);
        $domReligion->creatorUser()->associate($admin);
        $domViolence->creatorUser()->associate($admin);
        $domRapports->creatorUser()->associate($admin);

        $domBoire->creatorUser()->associate($admin);
        $domManger->creatorUser()->associate($admin);
        $domEstime->creatorUser()->associate($admin);
        $domMoi->creatorUser()->associate($admin);
        $domDiscrim->creatorUser()->associate($admin);
        $domArgent->creatorUser()->associate($admin);
        $domFormations->creatorUser()->associate($admin);
        
        $domSante->save();
        $domStress->save();

        $domSexualite->save();
        $domReligion->save();
        $domViolence->save();

        $domBoire->save();
        $domManger->save();
        $domEstime->save();
        $domMoi->save();
        $domDiscrim->save();
        $domArgent->save();
        $domFormations->save();

        $domRapports->parentDomain()->associate($domSexualite);
        $domRapports->save();
        
        /*SANTE*/
        $domEtat->parentDomain()->associate($domSante);
        $domEtat->save();
        $domOuQui->parentDomain()->associate($domSante);
        $domOuQui->save();
        $domApparence->parentDomain()->associate($domSante);
        $domApparence->save();
        $domPercer->parentDomain()->associate($domSante);
        $domPercer->save();
        $domPuberteG->parentDomain()->associate($domSante);
        $domPuberteG->save();
        $domPuberteF->parentDomain()->associate($domSante);
        $domPuberteF->save();
        $domMusique->parentDomain()->associate($domSante);
        $domMusique->save();
        $domFatigue->parentDomain()->associate($domSante);
        $domFatigue->save();
        $domInfections->parentDomain()->associate($domSante);
        $domInfections->save();
        $domDepression->parentDomain()->associate($domSante);
        $domDepression->save();
        $domSanteMentale->parentDomain()->associate($domSante);
        $domSanteMentale->save();
        $domSanteInternet->parentDomain()->associate($domSante);
        $domSanteInternet->save();
        
        /*STRESS*/
        $domQuestce->parentDomain()->associate($domStress);
        $domQuestce->save();
        $domMecanismes->parentDomain()->associate($domStress);
        $domMecanismes->save();
        $domReponses->parentDomain()->associate($domStress);
        $domReponses->save();
        $domSymptomes->parentDomain()->associate($domStress);
        $domSymptomes->save();
        $domSources->parentDomain()->associate($domStress);
        $domSources->save();
        $domFaireFace->parentDomain()->associate($domStress);
        $domFaireFace->save();
        $domSommeil->parentDomain()->associate($domStress);
        $domSommeil->save();
        $domExamens->parentDomain()->associate($domStress);
        $domExamens->save();
        $domPuberte->parentDomain()->associate($domStress);
        $domPuberte->save();
        $domQuotidien->parentDomain()->associate($domStress);
        $domQuotidien->save();
        $domScolaire->parentDomain()->associate($domStress);
        $domScolaire->save();
        $domRessources->parentDomain()->associate($domStress);
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