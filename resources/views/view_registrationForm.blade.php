@extends('view_master')

@section('title', 'Création de compte')

@section('content')
<div class="module-container" id="registration">

  <h2>S'inscrire</h2>

  <form id="registrationForm" action="/user" method="post">
    <div class="form-group">
      <label for="pseudo" class="control-label">Pseudo </label> <a href="#" class="iconInfo" data-toggle="tooltip" data-placement="top" title="Un pseudo qui garantisse vraiment ton anonymat : ni nom, ni prénom, ni surnom, ni nom de compte de chat, Facebook... ">&#xea08</a>
      <div>
        <input  class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="control-label">Mot de passe <a href="#" class="iconInfo" data-toggle="tooltip" data-placement="top" title="Un mot de passe contenant des chiffres, des symboles et une combinaison de lettres majuscules et minuscules est bien plus difficile à deviner. Entre au minimum 4 caractères.">&#xea08</a>
        </label>
      <div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        <div class="progress password-progress">
            <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="control-label">Confirmation Mot de passe</label>
      <div>
        <input type="password" class="form-control" id="passwordconf" name="confirmPassword" placeholder="Confirme ton mot de passe">
      </div>
    </div>
    <div class="form-group">
      <label for="birth" class="control-label">Année de naissance</label>
      <div>
        <input type="number" size="4" class="form-control" id="birth" name="birth" placeholder="Par exemple: 1995">
      </div>
    </div>

    <div class="form-group">
      <label for="place" class="control-label">Canton/Pays</label>
      <div>
        <select name="country" class="form-control" id="place">
          <optgroup label="Suisse">
               <option value="7" >Berne</option>
                <option value="2" >Fribourg</option>
                <option value="5" >Genève</option>
                <option value="6" >Jura</option>
                <option value="4" >Neuchâtel</option>
                <option value="8" >Tessin</option>
                <option value="3" >Valais</option>
                <option value="1" >Vaud</option>
                <option value="11" >Autres cantons suisses</option>
           </optgroup>
    <optgroup label="Autres pays">
                       <option value="af" >Afghanistan</option>
                        <option value="za" >Afrique du sud</option>
                        <option value="al" >Albanie</option>
                        <option value="dz" >Algérie</option>
                        <option value="de" >Allemagne</option>
                        <option value="ad" >Andorre</option>
                        <option value="ao" >Angola</option>
                        <option value="ai" >Anguilla</option>
                        <option value="aq" >Antarctique</option>
                        <option value="ag" >Antigua-et-Barbuda</option>
                        <option value="an" >Antilles</option>
                        <option value="sa" >Arabie Saoudite</option>
                        <option value="ar" >Argentine</option>
                        <option value="am" >Arménie</option>
                        <option value="aw" >Aruba</option>
                        <option value="au" >Australie</option>
                        <option value="at" >Autriche</option>
                        <option value="az" >Azerbaïdjan</option>
                        <option value="bs" >Bahamas</option>
                        <option value="bh" >Bahreïn</option>
                        <option value="bd" >Bangladesh</option>
                        <option value="bb" >Barbade</option>
                        <option value="be" >Belgique</option>
                        <option value="bz" >Belize</option>
                        <option value="bm" >Bermudes</option>
                        <option value="bt" >Bhoutan</option>
                        <option value="by" >Biélorussie</option>
                        <option value="bo" >Bolivie</option>
                        <option value="ba" >Bosnie-Herzégovine</option>
                        <option value="bw" >Botswana</option>
                        <option value="bn" >Brunei Darussalam</option>
                        <option value="br" >Brésil</option>
                        <option value="bg" >Bulgarie</option>
                        <option value="bf" >Burkina faso</option>
                        <option value="bi" >Burundi</option>
                        <option value="bj" >Bénin </option>
                        <option value="kh" >Cambodge</option>
                        <option value="cm" >Cameroun</option>
                        <option value="ca" >Canada</option>
                        <option value="cv" >Cap-vert</option>
                        <option value="cl" >Chili</option>
                        <option value="cn" >Chine</option>
                        <option value="cy" >Chypre</option>
                        <option value="co" >Colombie</option>
                        <option value="cg" >Congo</option>
                        <option value="kp" >Corée du nord</option>
                        <option value="kr" >Corée du sud</option>
                        <option value="cr" >Costa rica</option>
                        <option value="hr" >Croatie</option>
                        <option value="cu" >Cuba</option>
                        <option value="ci" >Côte d'Ivoire</option>
                        <option value="dk" >Danemark</option>
                        <option value="dj" >Djibouti</option>
                        <option value="dm" >Dominique</option>
                        <option value="eg" >Egypte</option>
                        <option value="ae" >Emirats arabes unis</option>
                        <option value="ec" >Equateur</option>
                        <option value="er" >Erythrée</option>
                        <option value="es" >Espagne</option>
                        <option value="ee" >Estonie</option>
                        <option value="us" >Etats-Unis d'Amérique</option>
                        <option value="et" >Ethiopie</option>
                        <option value="fj" >Fidji</option>
                        <option value="fi" >Finlande</option>
                        <option value="fr" >France</option>
                        <option value="ga" >Gabon</option>
                        <option value="gm" >Gambie</option>
                        <option value="gh" >Ghana</option>
                        <option value="gi" >Gibraltar</option>
                        <option value="gd" >Grenade</option>
                        <option value="gl" >Groënland</option>
                        <option value="gr" >Grèce</option>
                        <option value="gp" >Guadeloupe</option>
                        <option value="gu" >Guam</option>
                        <option value="gt" >Guatemala</option>
                        <option value="gn" >Guinée</option>
                        <option value="gq" >Guinée équatoriale</option>
                        <option value="gw" >Guinée-Bissao</option>
                        <option value="gy" >Guyane</option>
                        <option value="gf" >Guyane française</option>
                        <option value="ge" >Géorgie</option>
                        <option value="ht" >Haïti</option>
                        <option value="hn" >Honduras</option>
                        <option value="hk" >Hong kong</option>
                        <option value="hu" >Hongrie</option>
                        <option value="mp" >Ile Mariana du nord</option>
                        <option value="cx" >Ile christmas</option>
                        <option value="nf" >Ile de Norfolk</option>
                        <option value="fo" >Ile feroe</option>
                        <option value="ck" >Iles Cook</option>
                        <option value="fk" >Iles Falklands</option>
                        <option value="sb" >Iles Salomon</option>
                        <option value="tk" >Iles Tokelau</option>
                        <option value="ky" >Iles caïmans</option>
                        <option value="cc" >Iles cocos</option>
                        <option value="vg" >Iles vierges américaines</option>
                        <option value="vi" >Iles vierges britanniques </option>
                        <option value="in" >Inde</option>
                        <option value="id" >Indonésie</option>
                        <option value="ir" >Iran</option>
                        <option value="iq" >Iraq</option>
                        <option value="ie" >Irlande</option>
                        <option value="is" >Islande</option>
                        <option value="il" >Israël</option>
                        <option value="it" >Italie</option>
                        <option value="jm" >Jamaïque</option>
                        <option value="jp" >Japon</option>
                        <option value="jo" >Jordanie</option>
                        <option value="kz" >Kazakhstan</option>
                        <option value="ke" >Kenya</option>
                        <option value="kg" >Kirghistan</option>
                        <option value="ki" >Kiribati</option>
                        <option value="kw" >Koweït</option>
                        <option value="la" >Laos</option>
                        <option value="ls" >Lesotho</option>
                        <option value="lv" >Lettonie</option>
                        <option value="lb" >Liban</option>
                        <option value="ly" >Libye</option>
                        <option value="lr" >Libéria</option>
                        <option value="li" >Liechtenstein</option>
                        <option value="lt" >Lituanie</option>
                        <option value="lu" >Luxembourg</option>
                        <option value="mk" >Macédoine</option>
                        <option value="mg" >Madagascar</option>
                        <option value="mo" >Makau</option>
                        <option value="my" >Malaisie</option>
                        <option value="mw" >Malawi</option>
                        <option value="mv" >Maldives</option>
                        <option value="ml" >Mali</option>
                        <option value="mt" >Malte</option>
                        <option value="ma" >Maroc</option>
                        <option value="mh" >Marshall</option>
                        <option value="mq" >Martinique</option>
                        <option value="mu" >Maurice</option>
                        <option value="mr" >Mauritanie</option>
                        <option value="yt" >Mayotte</option>
                        <option value="mx" >Mexique</option>
                        <option value="fm" >Micronésie</option>
                        <option value="md" >Moldavie</option>
                        <option value="mc" >Monaco</option>
                        <option value="mn" >Mongolie</option>
                        <option value="ms" >Monteserrat</option>
                        <option value="mz" >Mozambique</option>
                        <option value="mm" >Myanmar</option>
                        <option value="na" >Namibie</option>
                        <option value="nr" >Nauru</option>
                        <option value="ni" >Nicaragua</option>
                        <option value="ne" >Niger</option>
                        <option value="ng" >Nigeria</option>
                        <option value="nu" >Niue</option>
                        <option value="no" >Norvège</option>
                        <option value="nc" >Nouvelle-Calédonie</option>
                        <option value="nz" >Nouvelle-Zélande</option>
                        <option value="np" >Népal</option>
                        <option value="om" >Oman</option>
                        <option value="ug" >Ouganda</option>
                        <option value="uz" >Ousbékistan</option>
                        <option value="pk" >Pakistan</option>
                        <option value="pw" >Palau</option>
                        <option value="ps" >Palestine</option>
                        <option value="pa" >Panama</option>
                        <option value="pg" >Papouasie - Nouvelle Guinée</option>
                        <option value="py" >Paraguay</option>
                        <option value="nl" >Pays-bas</option>
                        <option value="ph" >Philippines</option>
                        <option value="pn" >Pitcairn</option>
                        <option value="pl" >Pologne</option>
                        <option value="pf" >Polynésie française</option>
                        <option value="pr" >Porto Rico</option>
                        <option value="pt" >Portugal</option>
                        <option value="pe" >Pérou</option>
                        <option value="qa" >Qatar</option>
                        <option value="ro" >Roumanie</option>
                        <option value="gb" >Royaume-Uni</option>
                        <option value="ru" >Russie (Fédération de)</option>
                        <option value="rw" >Rwanda</option>
                        <option value="km" >République Comorienne</option>
                        <option value="cf" >République centrafricaine</option>
                        <option value="do" >République dominicaine</option>
                        <option value="cd" >République démocratique du congo</option>
                        <option value="cz" >République tchèque</option>
                        <option value="re" >Réunion</option>
                        <option value="eh" >Sahara occidental</option>
                        <option value="sh" >Saint Hélène</option>
                        <option value="kn" >Saint-Christophe-et-Niévès</option>
                        <option value="sm" >Saint-Marin</option>
                        <option value="vc" >Saint-vincent-et-les grenadines</option>
                        <option value="lc" >Sainte-Lucie</option>
                        <option value="sv" >Salvador</option>
                        <option value="as" >Samoa américaines</option>
                        <option value="ws" >Samoa occidentales</option>
                        <option value="st" >Sao Tomé-et-Principe</option>
                        <option value="sc" >Seychelles</option>
                        <option value="sl" >Sierra Leone</option>
                        <option value="sg" >Singapour</option>
                        <option value="sk" >Slovaquie</option>
                        <option value="si" >Slovénie</option>
                        <option value="so" >Somalie</option>
                        <option value="sd" >Soudan</option>
                        <option value="lk" >Sri Lanka</option>
                        <option value="pm" >St. Pierre and Miquelon</option>
                        <option value="sr" >Suriname</option>
                        <option value="se" >Suède</option>
                        <option value="sz" >Swaziland</option>
                        <option value="sy" >Syrie</option>
                        <option value="sn" >Sénégal</option>
                        <option value="tw" >Taiwan</option>
                        <option value="tz" >Tanzanie</option>
                        <option value="td" >Tchad (république du)</option>
                        <option value="tj" >Tchétchénie</option>
                        <option value="th" >Thaïlande</option>
                        <option value="tp" >Timor-oriental</option>
                        <option value="tg" >Togo</option>
                        <option value="to" >Tonga</option>
                        <option value="tt" >Trinité-et-Tobago</option>
                        <option value="tn" >Tunisie</option>
                        <option value="tm" >Turkménistan</option>
                        <option value="tc" >Turks et Caicos</option>
                        <option value="tr" >Turquie</option>
                        <option value="tv" >Tuvalu</option>
                        <option value="ua" >Ukraine</option>
                        <option value="uy" >Uruguay</option>
                        <option value="vu" >Vanuatu</option>
                        <option value="va" >Vatican</option>
                        <option value="vn" >Viêt-nam</option>
                        <option value="ve" >Vénézuela</option>
                        <option value="wf" >Wallis et futuna</option>
                        <option value="yu" >Yougoslavie</option>
                        <option value="ye" >Yémen</option>
                        <option value="zm" >Zambie</option>
                        <option value="zw" >Zimbabwe</option>
                   </optgroup>
      </select>
      </div>
    </div>
    <div class="form-group">
            
            <div>
                <label class="control-label">Je suis:</label>
                <div class="col-md-12 radio">
                    <div class="col-md-3">
                    <label>
                        <input type="radio" name="sex" value="masculin" id="h" /> Un garçon
                    </label>
                    </div>
                    <div class="col-md-3">
                    <label>
                        <input type="radio" name="sex" value="féminin" id="f" /> Une fille
                    </label>
                    </div>
                </div>
            </div>
        </div>
    <div class="form-group">
          <label for="secret" > Choisir ma question secrète: </label>
          <div>
            <select class="form-control" name="secretQuestion" id="secret">
            @foreach($secretQuestion as $sq)
                <option value="{{$sq->id}}">{{$sq->name}}</option>
            @endforeach
        </select>
      </div>
     </div>
      <div class="form-group">
          <label for="answer" >Ma réponse secrète: </label>
      <div>
            <textarea name="answerQuestion" class="form-control" placeholder="Si tu perds ton mot de passe tu pourras le récupérer en répondant à la question que tu as choisie" class="form-control" rows="2" id="answer"></textarea>
          </div>
      </div>

      <div class="form-group">
          <div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#termsModal">J'accepte les conditions d'utilisation</button>
            <input type="hidden" name="agree" value="no" />
          </div>
      </div>

    <div class="form-group">
      <div >
        <button type="submit" class="btn btn-primary">Je m'inscris</button>
      </div>
    </div>
  </form>
</div>
<!-- Terms and conditions modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="Conditions d'utilisations" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Conditions d'utilisations</h3>
        </div>

        <div class="modal-body">
          <p>
            <strong>1. CIAO garantit l'anonymat</strong> des jeunes qui s'expriment sur le site, grâce au pseudo. Le pseudo permet de créer un espace perso pour pouvoir poser des questions et participer aux forums. Le pseudo n’est pas publié dans les questions-réponses, mais les répondants y ont accès. Le pseudo et l'espace perso ne peuvent pas être supprimés.
            L'utilisation d'un pseudo comporte plusieurs avantages :
            <ul>
              <li>Il garantit ton anonymat.</li>
              <li>Il permet aux répondants de te « reconnaître » et donc d'assurer un certain suivi entre tes différentes questions sans que tu sois obligé de tout réexpliquer à chaque fois.</li>
              <li>Il te permet d'accéder à toutes tes questions-réponses et à tes interventions dans les forums via l’espace perso.</li>
              <li>Il permet aux autres participants du forum de te répondre.</li>
            </ul>
            <strong>Il est important que tu ne "prêtes" pas ton pseudo à quelqu'un d'autre.</strong> Si tu as des amis ou des membres de ta famille qui veulent poser des questions sur CIAO, conseille-leur de créer leur propre pseudo. Si plusieurs personnes nous posent des questions avec le même pseudo,  nous ne pourrons y répondre de manière adéquate.
            ciao.ch ne demande aucune donnée privée telles qu'adresse e-mail, nom, téléphone...afin de préserver l'anonymat des jeunes utilisant le site. CIAO utilise Google Analytics Lien externe, nouvelle fenêtre pour analyser l'audience de son site et améliorer son contenu. Via cet outil, le site utilise des cookies que tu peux refuser ou supprimer en configurant ton navigateur.
          </p>

          <p>
            <strong>2.</strong>Les questions-réponses publiées et les interventions dans le forum et les témoignages appartiennent à CIAO. Elles ne peuvent pas être copiées sans son accord explicite.
          </p>

          <p>
            <strong>3. CIAO répond aux questions via le module « poser une question ».</strong> Les forums sont des espaces de discussion entre jeunes. Les témoignages te permettent de faire part de tes expériences et des solutions que tu as trouvées, qui peuvent aider d'autres internautes. Attention de ne pas confondre ces différents espaces.
          </p>

          <p>
            <strong>4. CIAO attend du respect de ses interlocuteurs.</strong>Tu dois donc respecter les participations et les avis de chaque internaute quel que soit son âge, sa culture, son sexe, son ethnie, sa religion, et toute autre préférence et caractéristique personnelle. Les insultes ou propos non respectueux à autrui seront effacés systématiquement aussi bien au niveau des question-réponses que des forums ou des témoignages.
          </p>

          <p>
            <strong>5. Chacun-e peut exprimer son avis:</strong> tant qu’il ne s’agit pas d’appel à la haine, ou la discrimination, de discours visant à créer des adeptes religieux ou politiques (prosélytisme), ou de discours incitateur qui mettrait en danger la santé et la sécurité des internautes (apologie de la drogue, de l’alcool ou d’autres pratiques à risque). De telles interventions ne seront pas validées.
          </p>

          <p>
            <strong>6. Langage clair.</strong> Merci de ne pas rédiger tes questions ou tes interventions en langage SMS, les répondant-e-s pourraient avoir des difficultés à les comprendre.
          </p>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="agreeButton" data-dismiss="modal">J'accepte</button>
            <button type="button" class="btn btn-default" id="disagreeButton" data-dismiss="modal">Je refuse</button>
        </div>
    </div>
</div>
</div>
</div>
@stop
