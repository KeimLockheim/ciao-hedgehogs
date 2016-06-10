<div class="container">

  <div class="row" id="contenu">
    <div class="col-md-1">

    </div>

    <div class="col-md-11" id="breadcrums">
      <p>Accueil <span class="interBread">></span> Profil expert nom: {{$user->nickname}} <span class="interBread">></span> Répondre à une question</p>
    </div>

    <div class="col-md-7 designBox">

      <h2>Répondre à la question</h2>



      <h3>La question posée</h3>
          <p>
            {{$question->answer->content}}
          </p>

      <h3>Catégorie</h3>
          <p>
            {{$question->domain->name}}
          </p>

<<<<<<< Updated upstream
        <form id="answerQuestion"> <!-- Du coup changement du form ici.. il faut gérer en JS le thème précis-->
=======
<<<<<<< HEAD
        <form> <!-- Du coup changement du form ici.. il faut gérer en JS le thème précis avec un foreach-->
=======
        <form id="answerQuestion"> <!-- Du coup changement du form ici.. il faut gérer en JS le thème précis-->
>>>>>>> origin/master
>>>>>>> Stashed changes
        <div class="form-group">
            <label for="theme"> Thème précis: </label>
            <select class="form-control" name="theme" id="theme">
          <option value="{{$question->domain->subDomains}}">{{$question->domain->subDomains}}</option>


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
