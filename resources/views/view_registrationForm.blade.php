@extends('view_master')

@section('title', 'Création de compte')

@section('content')
<div class="module-container" id="registration">

  <h2>S'inscrire</h2>

  <form id="registrationForm" method="post">
    <div class="form-group">
      <label for="pseudo" class="control-label">Pseudo</label>
      <div>
        <input  class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="control-label">Mot de passe</label>
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
            <label class="control-label">Ton sexe</label>
            <div>
                <div class="radio">
                    <label>
                        <input type="radio" name="genre" value="h" id="h" /> Homme
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="genre" value="f" id="f" /> Femme
                    </label>
                </div>
            </div>
        </div>
    <div class="form-group">
          <label for="secret" > Choisis ta question secrète: </label>
          <div>
            <select class="form-control" name="secreteQuestion" id="secret">
            @foreach($secretQuestion as $sq)
                <option value="{{$sq->id}}">{{$sq->name}}</option>
            @endforeach
        </select>
      </div>
     </div>
      <div class="form-group">
          <label for="answer" >Ma réponse secrète: </label>
      <div>
            <textarea name="answerQuestion" class="form-control" placeholder="Si tu perds ton mot de passe tu pourras le récupérer en répondant à la question que tu as choisie" class="form-control" rows="3" id="answer"></textarea>
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
@stop
