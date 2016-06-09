<div class="container">

  <div class="row" id="contenu">
    <div class="col-md-1">

    </div>

    <div class="col-md-11" id="breadcrums">
      <p>Accueil <span class="interBread">></span> Profil expert {{$user->nickname}} <span class="interBread">></span> Répondre à une question</p>
    </div>

    <div class="col-md-7 designBox">

      <h2>Répondre à la question</h2>


      <div class="form-group">
            <label for="question">La question posée: (non modifiable)</label>
              <textarea class="form-control" rows="3" id="question" disabled>{{$question->answer}}</textarea>
              <!-- Est-ce que l'on affiche le champs question dans un textarea? du form?-->
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie: {{$question->domain}} </label>
            <button type="button" class="btn btn-xs"> Mauvaise catégorie?</button>
            <input class="form-control" id="categorie" disabled placeholder="Sexe">
        </div>

        <form> <!-- Du coup changement du form ici.. il faut gérer en JS le thème précis-->
        <div class="form-group">
            <label for="theme"> Thème précis: </label>
            <select class="form-control" name="theme" id="theme">
          <option>Adolescence</option>
          <option>Règles</option>
          <option>Contraception</option>
        </select>
        </div>
        <div class="form-group">
            <label for="title">Intitulé précis de la question: </label>
            <input class="form-control" id="title" name="titleQuestion" placeholder="Titre de la question (court et clair)">
        </div>

        <div class="form-group">
            <label for="answer">Ma Réponse: </label>
              <textarea class="form-control" rows="6" name="answerQuestion" id="answer"></textarea>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Publier ma réponse</button>
            </div>
        </div>

  </form>
</div>


      </div>

  </div>
