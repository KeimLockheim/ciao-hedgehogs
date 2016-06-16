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
            'name' => 'Le nom de jeune fille de ta maman',
        ]);
        $q3 = SecretQuestion::create([
            'name' => 'Le nom de ton animal de compagnie',
        ]);
        $q3 = SecretQuestion::create([
            'name' => 'Le nom de ta soeur',
        ]);
        $q3 = SecretQuestion::create([
            'name' => 'Le nom de ton frère',
        ]);
        $q3 = SecretQuestion::create([
            'name' => 'Le nom de ton film préféré',
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
            'content'=>"<h2>Consulter sans les parents</h2>

			<p>Les adolescents, dès l'âge de 14 -15 ans, ont le droit de consulter un médecin sans en parler à un de leurs  parents. Malgré tout, il est en général préférable de parler à tes parents ou à quelqu'un de ton entourage de ton besoin de consulter. L'entourage (notamment tes parents) représente un soutien très utile dans des situations difficiles.</p>

			<p>Les consultations ne sont pas anonymes mais confidentielles. Tout médecin est soumis au <a>secret médical</a>. Il ne doit pas transmettre de renseignements concernant les personnes qui le consultent, sauf cas très spécifiques comme les abus sexuels, les risques suicidaires, par exemple.</p>

			<p>Si tes parents t'accompagnent à une consultation, ils peuvent t'attendre à l'extérieur si tu le préfères. Tu peux aussi discuter avec le médecin de l'information qui sera donnée ensuite à tes parents.</p>

			<p><a href>Un exemple de consultation en video</a></p>

			<p>9 avril 2015</p>
			<p>© CIAO - CSJ</p>",
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
            'content'=>"<h2>Le stress, c'est quoi?</h2>

			<p>Selon Hans Selye, le stress c’est la vie  et puisqu'il fait partie de la vie, il faut apprendre à l’apprivoiser.</p>

			<p>Le stress est un phénomène naturel et utile. C’est l'ensemble des réponses d'un organisme soumis à des pressions ou des contraintes de la part de son environnement. Cela mobilise une certaine énergie qu’il est nécessaire de libérer pour retrouver un équilibre satisfaisant.</p>

			<p>L’état de stress provient du sentiment d’être débordé-e ou de manquer de contrôle face à une situation. <strong>Il traduit une difficulté d’adaptation.</strong></p>


			<p>schéma explicatif du stress: une balance en équilibre flèche stress entraine déséquilibre de la balnce flèche adaptation qui entraine rééquilibre de la balance</p>

			<p>Et il survient lorsqu’il y a un déséquilibre entre la perception qu’une personne a :</p>

			<ul>

				<li>des contraintes que l’environnement lui impose</li>
				<li>de ses propres moyens pour y faire face.</li>

			</ul>

			<p>21 octobre 2014</p>
			<p>© CIAO, Traquetontrac</p>",
        ]);
        
         $domMecanismes = new Domain([
            'name' => "Mécanismes du stress",
            'description' => 'Description',
             'content'=>"<h2>Comprendre le stress</h2>

			<p>Comprendre les mécanismes du stress permet de le reconnaitre et de pourvoir agir pour le faire diminuer.</p>

			<p>Le stress est dû au déséquilibre entre :</p>

			<ul>

				<li>d’une part les exigences de certaines situations et/ou tes propres attentes face à celles-ci,</li>
				<li>et d’autre part tes capacités à faire face à ces situations et/ou le fait que celles-ci te mettent sous pression.</li>

			</ul>


			<p>Pour diminuer le stress, il est nécessaire de ré-équilibrer la balance:</p>

			<ul>

				<li>tu peux essayer de diminuer les pressions (exigences extérieures, attentes)</li>
				<li>et/ou augmenter les ressources (capacités, possibilités d’agir sur la situation)</li>

			</ul>

			<p>21 octobre 2014</p>
			<p>© CIAO, Traquetontrac</p>"
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
        
        $domAnatomie = new Domain([
            'name' => 'Anatomie et reproduction',
            'description' => 'Description',
            'content' =>"<h2>Sexualité et reproduction</h2>

			<p>Ce qui caractérise les organismes vivants, c'est qu'ils sont capables de se reproduire.</p>

			<p>La sexualité fait partie du système reproducteur qui assure la survie de notre espèce. C'est pourquoi se reproduire est quelque chose de concrètement facile à réaliser, tout en étant d'une fascinante complexité.</p>

			<p>On peut faire un enfant avec ou sans amour, avec ou sans plaisir, ou le plus distraitement du monde: ça fonctionne...</p>

			<p>26 janvier 2015 </p>
			<p>© CIAO-PROFA</p>

			<hr>

		  		<h4>Tu veux en savoir plus?</h4>

		  		<ul class='lienArticle'>
		  			<li><a>Quelle chance avais-tu de naître?</a></li>
		  		</ul>
",
        ]);
        $domFilles = new Domain([
            'name' => 'Filles: corps et puberté',
            'description' => 'Description',
        ]);
        $domContraception = new Domain([
            'name' => 'Contraception',
            'description' => 'Description',
        ]);
        $domRelation = new Domain([
            'name' => 'Relations sexuelles',
            'description' => 'Description',
        ]);
    
        /*VIOLENCE*/
        $domViolence = new Domain([
            'name' => 'Violences',
            'description' => "Qu'est-ce que la violence?
            C'est faire preuve de force et de brutalité en pensée ou en action. La violence est souvent liée à des problèmes de communication. Que faire face à la violence? La violence sous toutes ses formes doit être dénoncée car chacun a le droit de vivre en sécurité. Les actes de violence doivent être pris au sérieux : ils sont inacceptables et ne débouchent sur rien de constructif. Il faut lutter contre eux.",
        ]);
        $domQuoi = new Domain([
            'name' => "La violence, c'est quoi?",
            'description' => 'Description',
        ]);
        $domContreMoi = new Domain([
            'name' => 'Violences contre moi',
            'description' => 'Description',
            'content'=>"<h2>Pourquoi se faire du mal?</h2>

			<p>Lorsqu'on se sent agressé ou frustré, on développe à son tour de l'agressivité, on attaque pour se défendre. L'attaque se dirige contre l'extérieur, mais pas toujours : il arrive aussi que l'agressivité se retourne contre soi.</p>

			<p>C'est parfois difficile de bien saisir ce qui fait souffrir, c'est confus. On n'arrive pas à mettre le doigt sur une seule cause, mais on se sent mal, avec un sentiment d'être nul ou de ne compter pour personne. On peut en vouloir à ses parents, à ses frères et sœurs, à son copain ou sa copine, au monde entier. On en veut parfois à son corps que l'on n'aime pas.</p>

			<p>Lorsqu'on a un conflit avec quelqu'un, on peut souvent le régler par une bonne explication. Par contre, lorsqu'on a le sentiment de ne pas compter pour l'autre, de ne pas arriver à s'aimer, il y a beaucoup d'émotions négatives qui s'accumulent à l'intérieur de soi. Si on n'arrive pas à dire ce que l'on ressent, il arrive qu'on le transforme en agressivité contre soi.</p>

			<p>Cette agressivité peut prendre plusieurs formes :</p>

			<ul>

				<li><a>L'automutilation</a></li>
				<li><a>Les troubles alimentaires</a></li>
				<li><a>Les consommations abusives</a></li>
				<li><a>Les tentatives de suicide et le suicide.</a></li>

			</ul>


			<p>8 septembre 2014</p>
			<p>© CIAO</p>

			<hr>

		  		<h4>Tu veux en savoir plus?</h4>

		  		<ul class='lienArticle'>
		  			<li><a>Le psy c'est qui?</a></li>
		  		</ul>
",
        ]);
        $domEnMoi = new Domain([
            'name' => 'Violence en moi',
            'description' => 'Description',
        ]);
        $domRue = new Domain([
            'name' => 'Violence dans la rue',
            'description' => 'Description',
        ]);
        
        /*RELIGION*/
        $domReligion = new Domain([
            'name' => 'Religions',
            'description' => "Cette rubrique traite des principales religions: le bouddhisme, le christianisme, le judaïsme, l'Islam.Que tu sois un peu croyant, très religieux, pas pratiquant ou sans croyance aucune, tu y trouveras différentes informations sur les traditions et les croyances des principales religions, ainsi que  les textes de référence propres à chaque religion.",
        ]);
        $domQQ = new Domain([
            'name' => 'Quelques clarifications',
            'description' => "<h2>Religions, spiritualité, sectes ?</h2>

			<p>Les définitions de ce que l'on peut entendre sur les mots comme religion, spiritualité ou secte sont multiples. Vous trouverez dans les pages suivantes des propositions de clarifications.</p>

			<p>Pour que le 21e siècle, annoncé comme 'spirituel', ne soit pas avant tout conflictuel, il importe qu'en tous lieux (écoles, familles, médias, communautés religieuses, etc.) une connaissance sereine et non naïve des religions, spiritualités et sectes soit transmise. Et cela sans dédaigner (refuser, rejeter) les traditions chrétiennes qui nous ont portées jusqu'à ce jour, ni les autres traditions philosophiques et religieuses qui, de manière respectueuse, se sont établies parmi nous.</p>



			<p>13 mai 2015 </p>
			<p>© Association J'y crois moi non plus - Extrait de Panorama des religions, Éditions Agora, Lausanne</p>
",
        ]);
        $domBou = new Domain([
            'name' => 'Bouddhistes',
            'description' => 'Description',
        ]);
        $domCh = new Domain([
            'name' => 'Chrétiens',
            'description' => 'Description',
        ]);
        $domHin = new Domain([
            'name' => 'Hindous',
            'description' => 'Description',
        ]);
        $domJu = new Domain([
            'name' => 'Juifs',
            'description' => 'Description',
        ]);
        $domMu = new Domain([
            'name' => 'Musulmans',
            'description' => 'Description',
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
            'content'=>"<h2>Les lois</h2>

			<p><strong>Chaque pays édicte des lois concernant la consommation de drogues</strong> : lois sur le tabac, sur l'alcool et sur les drogues illégales. Ces lois permettent de déterminer les taxes auxquels les produits sont soumis, de restreindre ou d'interdire l'usage de certains produits, d'en limiter l'usage à certains endroits ou pour un groupe déterminé, de fixer les critères concernant la publicité pour les produits, etc.</p>

			<p><strong>Certaines substances sont interdites</strong> parce qu'elles sont dangereuses pour la santé. Et puis les lois sont le reflet de la société à une époque donnée, car certains produits, bien que dangereux, ne sont pas interdits parce qu'ils sont intégrés à sa culture.</p>


			<p>13 mai 2015</p>
			<p>© CIAO - Addiction Suisse</p>
",
        ]);
        $domBFEstime = new Domain([
            'name' => "Boire, fumer...et estime de soi",
            'description' => 'Description',
        ]);
        $domTropInt = new Domain([
            'name' => "Trop d'Internet",
            'description' => 'Description',
        ]);
        
        /*MANGER BOUGER*/
        $domManger = new Domain([
            'name' => 'Manger-bouger',
            'description' => "Manger? Avoir faim, avoir envie de manger ou avoir de l'appétit, quelles différences? Bouger? Bon pour la tête, bon pour le corps? Les bienfaits du sport et du mouvement sont en effet multiples et encore davantage quand tu le fais avec plaisir! Se sentir trop gros? Vouloir être plus maigre? Se trouver pas assez musclée? Comment arriver à être content de son corps?",
        ]);
        $domPoids = new Domain([
            'name' => "Poids adolescence",
            'description' => 'Description',
            'content'=>"
			<h2>Je grandis tout d'un coup: c'est la croissance!</h2>

			<p>Entre 5 et 10 ans, les enfants grandissent en moyenne de 5 cm par an. Brusquement, au début de la puberté (en moyenne 11 ans chez les filles et 13 ans chez les garçons), la croissance en taille s'accélère, et cela pendant 2 à 3 ans: c'est ce que l'on appelle le <strong>pic de croissance</strong>, période durant laquelle on prend facilement plus de 5 cm par an.</p>

			<p>Après ce pic de croissance, la taille ne se modifie plus beaucoup et la croissance s'arrête entre 2 et 5 ans après les premiers signes pubertaires.</p>

			<p><strong>Le pic de croissance a lieu plus tôt chez les filles et est moins important chez elles que chez les garçons.</strong></p>

			<p>L'augmentation de taille n'est pas la même pour toutes les parties du corps.</p>


			<ul>

				<li>La tête, par exemple, ne grandit pas. Les bras et les jambes s'allongent avant le torse.</li>
				<li>La largeur des épaules et du bassin augmente vite mais de manière différente chez les filles et les garçons.</li>
				<li>Les hanches, c'est-à-dire les os du bassin et les muscles qui les entourent, s'élargissent plus chez les filles et les épaules plus chez les garçons.</li>

			</ul>

			<p>La croissance en taille se fait en même temps que le développement des organes sexuels et la sexualisation du corps (les poils, les seins chez les filles, la voix chez les garçons).</p>

			<p>Cette croissance correspond à une modification des os qui changent aussi de structure et des muscles qui les accompagnent.</p>

			<p><strong>C'est une période durant laquelle les os peuvent être plus fragiles, il faut donc faire attention lorsque l'on pratique un sport.</strong></p>

			<p>La peau avec la couche graisseuse (on dit aussi adipeuse) qui lui donne sa souplesse enveloppe les parties du corps et suit donc le processus de développement. En même temps, la morphologie corporelle se modifie: <strong>on quitte progressivement son 'côté enfant' pour prendre sa silhouette et son visage d'adulte</strong>. Les traits du visage, par exemple, s'accusent avec le développement du nez.</p>

			<p>13 mai 2015 </p>
			<p>© CIAO - SSEJ - CSJ</p>
",
        ]);
        $domMangerComment = new Domain([
            'name' => "Manger: comment?",
            'description' => 'Description',
        ]);
        $domMaigrir = new Domain([
            'name' => "Maigrir, grossir",
            'description' => 'Description',
        ]);
        $domAno = new Domain([
            'name' => "Anorexie-boulimie",
            'description' => 'Description',
        ]);
        $domCommentBouger = new Domain([
            'name' => "Comment bouger?",
            'description' => 'Description',
        ]);
        $domBouger = new Domain([
            'name' => "Bouger pour sa santé",
            'description' => 'Description',
        ]);
        $domBougerNul = new Domain([
            'name' => "Bouger, c'est nul...",
            'description' => 'Description',
        ]);
        $domBougerPl = new Domain([
            'name' => "Bouger par plaisir",
            'description' => 'Description',
        ]);
        $domBougerRisque = new Domain([
            'name' => "Bouger sans risque",
            'description' => 'Description',
        ]);
        
        /*ESTIME DE SOI*/
        $domEstime = new Domain([
            'name' => 'Estime de soi',
            'description' => "L'estime de soi varie comme la température de ton corps sur le thermomètre. Elle est changeante et il est possible qu'elle soit très haute ou très basse selon les périodes de la vie. Mais par tes choix et tes actes, tu as le pouvoir de l'améliorer! Teste-toi, fais les jeux, lis les infos, enregistre ton niveau d'estime quotidien, surfe sur ces pages... et tu verras qu'avoir une bonne estime de soi n'est pas insurmontable!",
            
        ]);
        $domEstimeDeSoi = new Domain([
            'name' => "L'estime de soi exactement",
            'description' => 'Description',
            'content' => "<p>L’estime de soi globale est un sentiment de valeur en tant que personne et non pas dans un domaine particulier. <strong>En effet l’estime de soi est composée de différentes dimensions</strong> qui n’ont pas toutes la même importance d’une personne à l’autre, ni d’une période de sa vie à une autre. Ainsi par exemple, tu peux accorder aujourd’hui une importance particulière à ton apparence, ce que tu ne faisais pas lorsque tu étais enfant.</p>

			<p>La personne qui a une bonne image d’elle-même dans la plupart des différents domaines  - ou dans les domaines qui sont particulièrement importants pour elle - a une bonne estime de soi globale.</p>

			<p>29 avril 2015 </p>
			<p>© CIAO, Lausanne Région, Addiction Suisse</p>

			<hr>

		  		<h4>Liens vers des jeux et test :</h4>

		  		<ul class='lienArticle'>
		  			<li><a>Je suis une star</a></li>
		  			<li><a>S'aimer soi-même</a></li>
		  		</ul>
",
        ]);
        $domUne = new Domain([
            'name' => "Une ou des estimes de soi?",
            'description' => 'Description',
        ]);
        $domAuto = new Domain([
            'name' => "S'auto-évaluer",
            'description' => 'Description',
        ]);
        $domConstruit = new Domain([
            'name' => "L'estime de soi se construit",
            'description' => 'Description',
        ]);
        
        /*MOI*/
        $domMoi = new Domain([
            'name' => 'Moi, toi et les autres',
            'description' => "Les relations avec la famille, les amis, les copines, les liens entre les uns et les autres apportent de nombreuses joies. Elles posent aussi de multiples questions dans la vie de tous les jours. Comment arriver à se faire entendre, comment faire passer un message correctement, comment comprendre l'autre? Tu trouveras dans ce thème des informations pour mieux comprendre comment fonctionnent les relations entre les personnes en général et les liens avec ton entourage. Bienvenue dans le monde gigantesque des relations!",
        ]);
        $domFam = new Domain([
            'name' => "Famille",
            'description' => 'Description',
        ]);
        $domAm = new Domain([
            'name' => "Amour",
            'description' => "
			<h2>C'est quoi l'amour ?</h2>

			<p><strong>L'amour, c'est ce petit quelque chose en plus qui se produit quand tu es avec une certaine personne et qui n'arrive pas quand tu es avec les autres</strong>. Mais définir l'amour précisément est délicat parce que c'est un sentiment unique et particulier entre deux personnes. L'amour se nourrit de la différence et du respect de l'un pour l'autre. </p>

			<p>Pourtant, connaître l'amour pour la première fois peut être déstabilisant: tu as l'impression de ne plus rien contrôler, de perdre la tête. Cela peut en même temps te faire ressentir toute une gamme de sentiments intenses (joie, bonheur, mélancolie, peur, tristesse, etc). Tu te découvres de la fantaisie, tu vois de la poésie là où tu n'en voyais pas avant, tu te sens des ailes pour réaliser des projets... Ensemble, vous êtes bien et vous vous faites du bien.</p>

			

			<p>7 septembre 2015</p>
			<p>© CIAO - TELME</p>

",
        ]);
        $domAmi = new Domain([
            'name' => "Amitié",
            'description' => 'Description',
        ]);
        $domAdo = new Domain([
            'name' => "Adolescence",
            'description' => 'Description',
        ]);
        
        /*DISCRIMINATION RACISME*/
        $domDiscrim = new Domain([
            'name' => 'Discrimination et racismes',
            'description' => "Dans ce thème, CIAO essaie de répondre aux interrogations des jeunes sur des phénomènes qui les interpellent beaucoup et les divisent : le racisme et les discriminations. Pourquoi ça existe? Est-ce justifié? Est-ce inévitable? Et d'abord, ça commence où le racisme? Comment lutter contre? Comment argumenter? Comment se défendre quand on est attaqué? Tu trouveras donc des informations pour comprendre ce qu'est le racisme et ce que sont les discriminations. Nous essayons d'expliquer leurs mécanismes. Nous expliquons aussi en détail le cadre légal dans lequel nous vivons qui définit les droits et les devoirs de chacun sur le territoire de la Suisse.",
        ]);
        $domRac = new Domain([
            'name' => "Racismes",
            'description' => 'Description',
        ]);
        $domPrin = new Domain([
            'name' => "Principales formes racisme",
            'description' => 'Description',
        ]);
        $domLoisR = new Domain([
            'name' => "Lois contre le racisme",
            'description' => 'Description',
            'content' => "<h2>Qui décide des lois?</h2>

			<p><em>Lois: « Une règle ou un ensemble de règles obligatoires décidées par l'autorité souveraine d'une société et sanctionnée par la force publique ». (Dictionnaire Petit Robert 2010).</em></p>

			<p><strong>Mais encore:</strong></p>

			<p>Dans le système démocratique que nous connaissons en Suisse les lois sont votées par le <a>parlement</a>, qui est lui-même élu démocratiquement par le peuple. Dans un système démocratique, c'est donc le peuple qui est le souverain: il élit ses représentants au <a>gouvernement</a> et au parlement et vote les modifications de la constitution ainsi que certaines lois, par voie de <a>référendum</a></p>

			<p>En effet, en Suisse, certaines lois, peuvent même être soumises au vote populaire (droit de vote) si un certain nombre de citoyens le demandent. On appelle cette demande un référendum. Cette manière de faire est un des mécanismes de la démocratie directe.</p>

			<p>Les lois d'un pays sont obligatoires, ce qui veut dire que les citoyens d'un pays et l'ensemble des personnes qui se trouvent sur le territoire de la Suisse doivent respecter les lois suisses. Si elle ne le font pas elles peuvent être sanctionnées par la force publique, soit principalement la police et les tribunaux.</p>

			<p>Pour aller plus loin: qui a le droit de vote en Suisse? En principe les citoyens d'un pays, mais de plus en plus, en tout cas ou niveau local, le étrangers résidents légalement depuis une certaine durée ont également ce droit.</p>



			<p>8 septembre 2014 </p>
			<p>© CIAO - FED - COSM-NE</p>",
        ]);
        $domLoisJ = new Domain([
            'name' => "Lois et jugements",
            'description' => 'Description',
        ]);
        $domDis = new Domain([
            'name' => "Discrimintation",
            'description' => 'Description',
        ]);
        $domPourquoi = new Domain([
            'name' => "Pourquoi? comment?",
            'description' => 'Description',
        ]);
        
        /*ARGENT*/
        $domArgent = new Domain([
            'name' => 'Argent',
            'description' => "Comment gérer ton argent? Comment élaborer ton budget? Comment mieux consommer? Ca n'est pas toujours facile de bien gérer son argent. Mais c'est très important, surtout si on en a peu, pour pouvoir en profiter le mieux possible. Tu verras à travers ce thème que certains pièges peuvent être facilement évités, comme les désagréments qui vont avec.",
        ]);
        
        $domAr = new Domain([
            'name' => "L'argent",
            'description' => "Description",
            'content'=>"<h2>À quoi sert l'argent?</h2>

			<p>L'argent est présent partout dans nos sociétés. Sur le plan économique, l'argent constitue un moyen d'échange. Il permet d'établir les prix des marchandises. On peut le conserver, l'économiser pour le dépenser plus tard.</p>

			<p>L'argent a plusieurs fonctions, dont les principales sont:</p>

			<ul>

				<li><strong>Assurer la sécurité en permettant de répondre à des besoins de base</strong>: se nourrir, se loger, mais aussi se former, se cultiver.</li>
				<li><strong>Permettre la liberté et l'indépendance</strong>: faire des choix, réaliser des objectifs ou des projets, se faire plaisir, faire plaisir.</li>
				<li><strong>Donner du pouvoir</strong>: montrer le statut social, l'appartenance à un groupe, etc. Ce qui peut aussi créer des inégalités, des conflits.</li>

			</ul>

			<p>Le manque d'argent peut être source d'insécurité, ne permet plus de faire des projets, peut conduire à une exclusion sociale (honte, etc.).</p>

			<p>L'argent: un bien, un mal? C'est toi qui décideras comment te situer par rapport à cela et à tous les biens proposés dans nos sociétés de consommation.</p>


			<p>28 août 2014 </p>
			<p>© CIAO - Jet Service - Service social polyvalent du CSP Vaud</p>
",
        ]);
      
        $domBu = new Domain([
            'name' => "Budget",
            'description' => 'Description',
        ]);
        $domCo = new Domain([
            'name' => "Consommation",
            'description' => 'Description',
        ]);
        $domDet = new Domain([
            'name' => "Dettes",
            'description' => 'Description',
        ]);
        $domPou = new Domain([
            'name' => "Poursuites",
            'description' => 'Description',
        ]);
        $domJeux = new Domain([
            'name' => "Jeux de hasard",
            'description' => 'Description',
        ]);
        
        /*FORMATION*/
        $domFormations = new Domain([
            'name' => 'Formation et travail',
            'description' => "Choisir une formation n'est pas toujours facile. Quelle filière choisir? Qu'est-ce qu'un apprentissage? Qui va financer ta formation? Entrer dans le monde du travail n'est pas toujours simple non plus. Pour rendre cela plus confortable, tu peux par exemple te renseigner sur les droits ou obligations de l'employé ou de l'employeur ou encore sur les différents types de contrat de travail. Etre bien renseigné, c'est déjà un atout pour bien commencer ta formation ou ta vie professionnelle!",
        ]);
        $domFor = new Domain([
            'name' => "Formation-professions",
            'description' => 'Description',
        ]);
        $domChoix = new Domain([
            'name' => "Choix d'un métier",
            'description' => 'Description',
        ]);
        $domFin = new Domain([
            'name' => "Le financement de la formation",
            'description' => 'Description',
        ]);
        $domRe = new Domain([
            'name' => "Recherche d'emploi",
            'description' => 'Description',
            'content'=>"<h2>Trouver du travail</h2>

			<p>Si tu cherches un emploi, parles-en autour de toi, contacte les entreprises de la branche qui t'intéresse, réponds aux annonces des journaux ou des panneaux d'affichage des magasins et consulte Internet. Tu peux aussi mettre des annonces dans les immeubles de ton quartier, les centres de loisirs etc...</p>

			<p>Fais savoir autour de toi que tu cherches un petit travail. Comme il n'est pas facile de trouver un emploi, surtout lorsqu'on est jeune et sans expérience, le bouche à oreille peut faire la différence.</p>

			<p>Il est possible de s'inscrire dans des agences de placement temporaire, mais il faut savoir que celles-ci ne sont en général pas intéressées par les personnes de moins de 18 ans.</p>

			<p>Lorsque tu obtiens un entretien d'embauche, soigne ta présentation, mets en avant tes qualités personnelles et professionnelles et non... tes défauts. Cela peut faire toute la différence! </p>


			<p>7 septembre 2015</p>
			<p>© CIAO - Jet service - CSP</p>
",
        ]);
        $domCV = new Domain([
            'name' => "Curriculum Vitae",
            'description' => 'Description',
        ]);
        $domCD = new Domain([
            'name' => "Conditions de travail",
            'description' => 'Description',
        ]);
   



        /*
         * Users
         */
        DB::table('users')->delete();

        $admin = new User([
            'nickname' => 'admin',
            'birthyear' => 1978,
            'sex' => 'féminin',
            'localisation' => 'Vaud',
            'password' => bcrypt('admin'),
            'secretQuestionAnswer' => bcrypt('Gurtner'),
        ]);
        $admin->secretQuestion()->associate($q2);
        $gAdministrator->users()->save($admin);
        $admin->save();

        $expert = new User([
            'nickname' => 'expert',
            'birthyear' => 1970,
            'sex' => 'masculin',
            'localisation' => 'Neuchâtel',
            'password' => bcrypt('expert'),
            'secretQuestionAnswer' => bcrypt('Lilou'),
        ]);

        $expert->secretQuestion()->associate($q1);
        $gExpert->users()->save($expert);

        $expert->save();

        $default = new User([
            'nickname' => 'jojo2016',
            'birthyear' => 1999,
            'sex' => 'masculin',
            'localisation' => 'Fribourg',
            'password' => bcrypt('default'),
            'secretQuestionAnswer' => bcrypt('Titi'),
        ]);

        $default->secretQuestion()->associate($q1);
        $gDefault->users()->save($default);

        $default->save();
        

        /*
         * Posts
         */
        DB::table('posts')->delete();
        $p1 = new Post([
            'content' => "Bonjour, 
            comme il est dit dans le titre je voudrais savoir si je suis anorexique. 
            Je suis en dépression depuis 4 ans mais l'en dernier j'ai été hospitalisé pendants 4 moi pour tentative de suicide, et depuis que je suis sortir j'ai des problème d'alimentation et j'ai perdu 11 kg en 5 mois. je compte tout les calories et je jeune presque tout le temps. mon imc est de 17,6.
            répondez moi au plus vite merci :D",
        ]);
        $p2 = new Post([
            'content' =>"Salut
            Arides a tres bien expliqué ce qu'il fait faire mais sache que chaque personne as une morphologie différente. Ci certains deviennent 'gros' a vue d'oeil pour d'autres (dont moi) c'est l'inverse et il n'y a pas d'aventages... Le plus important est l'alimentation et s'hydrater correctement apres tu px ajouter un sport (par expérience je suis en sport études avk 3.30h par jour et la base est l'alimentation) ... et le plus important de tout c'est d'aimer comme tu est." ,
        ]);
        $p3 = new Post([
            'content' => "Hello,
            Je ne vais pas dire que je suis en surpoids, mais...
            J'aime manger, surtout les sucrerie. J'ai du ventre et j'aimerai m'en débarrasser. Sauf que j'ai la flemme de faire du sport. Pourtant je sais que pour perdre du poids c'est le seul moyen.(je ne veux pas faire de régime)
            De plus si j'ai trop de sucre je risque d'avoir du diabète ou d'autre maladie. pleure 
            Ce qui ne me motive pas non plus c'est que je n'ai pas de physique. 
            Donnez-moi de vos conseille j'en serai reconnaissante sourire 
            Merci",
        ]);



        /*
         * Topics
         */
        DB::table('topics')->delete();
        $t1 = new Topic([
            'name' => 'Suis-je anorexique ?',
        ]);
        $t2 = new Topic([
            'name' => 'Comment perdre du poid?',
        ]);
        $t3 = new Topic([
            'name' => "Pas envie de faire du sport",
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
        $domDrogue->creatorUser()->associate($admin);
        $domProduits->creatorUser()->associate($admin);
        $domConso->creatorUser()->associate($admin);
        $domEntourage->creatorUser()->associate($admin);
        $domSociete->creatorUser()->associate($admin);
        $domBFEstime->creatorUser()->associate($admin);
        $domTropInt->creatorUser()->associate($admin);

        /*MANGER BOUGER*/
        $domManger->creatorUser()->associate($admin);
        $domPoids->creatorUser()->associate($admin);
        $domMangerComment->creatorUser()->associate($admin);
        $domMaigrir->creatorUser()->associate($admin);
        $domAno->creatorUser()->associate($admin);
        $domCommentBouger->creatorUser()->associate($admin);
        $domBouger->creatorUser()->associate($admin);
        $domBougerNul->creatorUser()->associate($admin);
        $domBougerPl->creatorUser()->associate($admin);
        $domBougerRisque->creatorUser()->associate($admin);
        
        /*SEXUALITE*/
        $domSexualite->creatorUser()->associate($admin);
        $domAnatomie->creatorUser()->associate($admin);
        $domFilles->creatorUser()->associate($admin);
        $domContraception->creatorUser()->associate($admin);
        $domRelation->creatorUser()->associate($admin);
        
        /*ESTIME DE SOI*/
        $domEstime->creatorUser()->associate($admin);
        $domEstimeDeSoi->creatorUser()->associate($admin);
        $domUne->creatorUser()->associate($admin);
        $domAuto->creatorUser()->associate($admin);
        $domConstruit->creatorUser()->associate($admin);
        
        /*MOI*/
        $domMoi->creatorUser()->associate($admin);
        $domFam->creatorUser()->associate($admin);
        $domAm->creatorUser()->associate($admin);
        $domAmi->creatorUser()->associate($admin);
        $domAdo->creatorUser()->associate($admin);

        /*VIOLENCE*/
        $domViolence->creatorUser()->associate($admin);
        $domQuoi->creatorUser()->associate($admin);
        $domContreMoi->creatorUser()->associate($admin);
        $domEnMoi->creatorUser()->associate($admin);
        $domRue->creatorUser()->associate($admin);

        /*DISCRIMINATION ET RACISME*/
        $domDiscrim->creatorUser()->associate($admin);
        $domRac->creatorUser()->associate($admin);
        $domPrin->creatorUser()->associate($admin);
        $domLoisR->creatorUser()->associate($admin);
        $domLoisJ->creatorUser()->associate($admin);
        $domDis->creatorUser()->associate($admin);
        $domPourquoi->creatorUser()->associate($admin);
       
        /*RELIGION*/
        $domReligion->creatorUser()->associate($admin);
        $domQQ->creatorUser()->associate($admin);
        $domBou->creatorUser()->associate($admin);
        $domCh->creatorUser()->associate($admin);
        $domHin->creatorUser()->associate($admin);
        $domJu->creatorUser()->associate($admin);
        $domMu->creatorUser()->associate($admin);

        /*ARGENT*/
        $domArgent->creatorUser()->associate($admin);
        $domAr->creatorUser()->associate($admin);
        $domBu->creatorUser()->associate($admin);
        $domCo->creatorUser()->associate($admin);
        $domDet->creatorUser()->associate($admin);
        $domPou->creatorUser()->associate($admin);
        $domJeux->creatorUser()->associate($admin);

        /*FORMATION*/
        $domFormations->creatorUser()->associate($admin);
        $domFor->creatorUser()->associate($admin);
        $domChoix->creatorUser()->associate($admin);
        $domFin->creatorUser()->associate($admin);
        $domRe->creatorUser()->associate($admin);
        $domCV->creatorUser()->associate($admin);
        $domCD->creatorUser()->associate($admin);


    
        
        
        /*SANTE*/
        $domSante->save();
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
        $domStress->save();
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
        
        /*BOIRE FUMER DROGUER*/
        $domBoire->save();
        $domDrogue->parentDomain()->associate($domBoire);
        $domDrogue->save();
        $domProduits->parentDomain()->associate($domBoire);
        $domProduits->save();
        $domConso->parentDomain()->associate($domBoire);    
        $domConso->save();
        $domEntourage->parentDomain()->associate($domBoire);    
        $domEntourage->save();
        $domSociete->parentDomain()->associate($domBoire);    
        $domSociete->save();
        $domBFEstime->parentDomain()->associate($domBoire);
        $domBFEstime->save();
        $domTropInt->parentDomain()->associate($domBoire);
        $domTropInt->save();
        
        /*MANGER BOUGER*/
        $domManger->save();
        $domPoids->parentDomain()->associate($domManger);
        $domPoids->save();
        $domMangerComment->parentDomain()->associate($domManger);
        $domMangerComment->save();
        $domMaigrir->parentDomain()->associate($domManger);
        $domMaigrir->save();
        $domAno->parentDomain()->associate($domManger);
        $domAno->save();
        $domCommentBouger->parentDomain()->associate($domManger);
        $domCommentBouger->save();
        $domBouger->parentDomain()->associate($domManger);
        $domBouger->save();
        $domBougerNul->parentDomain()->associate($domManger);
        $domBougerNul->save();
        $domBougerPl->parentDomain()->associate($domManger);
        $domBougerPl->save();
        $domBougerRisque->parentDomain()->associate($domManger);
        $domBougerRisque->save();
        
        /*SEXUALITE*/
        $domSexualite->save();
        $domAnatomie->parentDomain()->associate($domSexualite);
        $domAnatomie->save();
        $domFilles->parentDomain()->associate($domSexualite);
        $domFilles->save();
        $domContraception->parentDomain()->associate($domSexualite);
        $domContraception->save();
        $domRelation->parentDomain()->associate($domSexualite);
        $domRelation->save();
        //add par maic:
        $domSexualite->users()->save($expert);
        
        /*ESTIME DE SOI*/
        $domEstime->save();
        $domEstimeDeSoi->parentDomain()->associate($domEstime);
        $domEstimeDeSoi->save();
        $domUne->parentDomain()->associate($domEstime);
        $domUne->save();
        $domAuto->parentDomain()->associate($domEstime);
        $domAuto->save();
        $domConstruit->parentDomain()->associate($domEstime);
        $domConstruit->save();
        
        /*MOI*/
        $domMoi->save();
        $domFam->parentDomain()->associate($domMoi);
        $domFam->save();
        $domAm->parentDomain()->associate($domMoi);
        $domAm->save();
        $domAmi->parentDomain()->associate($domMoi);
        $domAmi->save();
        $domAdo->parentDomain()->associate($domMoi);
        $domAdo->save();
        
        /*VIOLENCE*/
        $domViolence->save();
        $domQuoi->parentDomain()->associate($domViolence);
        $domQuoi->save();
        $domContreMoi->parentDomain()->associate($domViolence);
        $domContreMoi->save();
        $domEnMoi->parentDomain()->associate($domViolence);
        $domEnMoi->save();
        $domRue->parentDomain()->associate($domViolence);
        $domRue->save();
        
        /*DISCRIMINATION ET RACISME*/
        $domDiscrim->save();
        $domRac->parentDomain()->associate($domDiscrim);
        $domRac->save();
        $domPrin->parentDomain()->associate($domDiscrim);
        $domPrin->save();
        $domLoisR->parentDomain()->associate($domDiscrim);
        $domLoisR->save();
        $domLoisJ->parentDomain()->associate($domDiscrim);
        $domLoisJ->save();
        $domDis->parentDomain()->associate($domDiscrim);
        $domDis->save();
        $domPourquoi->parentDomain()->associate($domDiscrim);
        $domPourquoi->save();

        /*RELIGION*/
        $domReligion->save();
        $domCh->parentDomain()->associate($domReligion);
        $domCh->save();
        $domHin->parentDomain()->associate($domReligion);
        $domHin->save();
        $domJu->parentDomain()->associate($domReligion);
        $domJu->save();
        $domMu->parentDomain()->associate($domReligion);
        $domMu->save();
            
        /*ARGENT*/
        $domArgent->save();
        $domAr->parentDomain()->associate($domArgent);
        $domAr->save();
        $domBu->parentDomain()->associate($domArgent);
        $domBu->save();
        $domCo->parentDomain()->associate($domArgent);
        $domCo->save();
        $domDet->parentDomain()->associate($domArgent);
        $domDet->save();
        $domPou->parentDomain()->associate($domArgent);
        $domPou->save();
        $domJeux->parentDomain()->associate($domArgent);
        $domJeux->save();
        
        /*FORMATION*/
        $domFormations->save();
        $domFor->parentDomain()->associate($domFormations);
        $domFor->save();
        $domChoix->parentDomain()->associate($domFormations);
        $domChoix->save();
        $domFin->parentDomain()->associate($domFormations);
        $domFin->save();
        $domRe->parentDomain()->associate($domFormations);
        $domRe->save();
        $domCV->parentDomain()->associate($domFormations);
        $domCV->save();
        $domCD->parentDomain()->associate($domFormations);
        $domCD->save();
        
        $t1->creatorUser()->associate($admin);
        $t1->domain()->associate($domManger);
        $t2->creatorUser()->associate($admin);
        $t2->domain()->associate($domManger);
        $t3->creatorUser()->associate($admin);
        $t3->domain()->associate($domManger);

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
            'content' => "Comment faire pour avoir une barbe et une moustache à 14 ans ?",
        ]);
        $q2 = new Question([
            'content' => "Je vomis et j'ai des vertiges. Suis-je enceinte ?",
        ]);
        $q3 = new Question([
            'content' => "Comment faire pour vite perdre du poids ?",
        ]);


        $q1->questionUser()->associate($default);
        $q1->domain()->associate($domPuberteG);

        $q3->questionUser()->associate($default);
        $q3->domain()->associate($domPoids);

        $q2->questionUser()->associate($default);
        $q2->domain()->associate($domSexualite);
        $q2->subDomain()->associate($domRelation);


        $q1->save();
        $q2->save();
        $q3->save();

        /*
         * Answer
         */
        DB::table('answers')->delete();
        $a1 = new Answer([
            'content' => "Bonjour,
            L'apparition de la pilosité varie d'une personne à une autre et survient lorsque la puberté est en place. Dans votre famille, il semble que ce phénomène soit précoce.
            Il n'est pas possible de la précipiter, aussi nous vous conseillons de laisser au temps le temps de faire son travail de maturité et bientôt votre souhait sera votre réalité. Sourire
            Nous vous souhaitons une belle semaine.",
        ]);
        $a2 = new Answer([
            'content' => "Bonjour,
            Les symptômes que tu décris peuvent être dûs à une gastro, ce qui est de saison ! Mais tu as raison, il peut aussi s'agir de signes d'une grossesse.

            Même si le préservatif a été bien mis et ne s'est pas déchiré, il peut y avoir des accidents. Notamment lorsqu'il y a des contacts très rapprochés entre les parties intimes avant la pose du préservatif. Des spermatozoïdes présents dans le pré-sperme peuvent suffire à la fécondation.

            Pour en avoir le coeur net, nous te conseillons de faire un test de grossesse, si tes règles ont du retard. Tu peux en acheter dans les grandes surfaces ou en pharmacies. Si tu préfères, tu peux également prendre rendez-vous au planning familial afin de ne pas être seule (voir dans Près de chez toi).

            Bonne chance !",
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
            'firstName' => "Patricia",
            'lastName' => "Meyer",
            'email' => "pat.meyer@gmail.com",
        ]);
        $up2 = new UserProfile([
            'firstName' => "Lucien",
            'lastName' => "Demierre",
            'email' => "luciendemierre@gmail.com",
        ]);

        $up1->user()->associate($expert);
        $up2->user()->associate($admin);

        $up1->save();
        $up2->save();



    }
}