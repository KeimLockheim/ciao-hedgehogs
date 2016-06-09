<div class="container">

  <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Proposer une discussion</p>
    </div>
        </div>
      </div>
<div class="container article">

        <div class="col-md-7 designBox">
<h2>Proposer un sujet de discussion entre jeunes</h2>
    <form>
        <div class="form-group">
            <label for="categorie"> Catégorie (obligatoire):</label>
            <select class="form-control" name="category" id="categorie">
      <!--afficher dynamiquement sous catégories en fonction catégorie choisie-->
              @foreach ($parentDomains as $domain)
          <option data-id="{{$domain->id}}">{{$domain->name}}</option>
              @endforeach
        </select>
        </div>
        <div class="form-group">
            <label for="theme"> Thème précis: </label>
            <select class="form-control" id="theme">
          <option disabled selected value> -- Tu peux préciser un thème précis -- </option>
        </select>
        </div>

        <div class="form-group">
            <label for="sujet">Ma proposition de sujet: </label>
            <input class="form-control" id="sujet" name="topicName">
        </div>

        <div class="form-group">
            <label for="post">Ma proposition de discussion</label>
            <textarea class="form-control" rows="4" name="topicPost" id="topicPost"></textarea>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Proposer mon sujet de discussion!</button>
            </div>
        </div>

    </form>

              </div>

    </div>
