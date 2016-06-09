@extends('view_master')

@section('title', 'Discussion')

@section('content')

<div class="container article">
        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$topic->domain}} <span class="interBread">></span> Discussion</p>
    </div>
        </div>

      <div class="col-md-7 designBox">
         <h2>Discussion</h2>
                    <h3>{{$topic->name}}</h3>
                <div class="forum">
                <div class="divContainerQuestion">
                        <label class="labelMessage">{{$topic->creatorUser}}</label>

                        <label class="date">{{$topic->creatorAt}}</label>

                    <p class="ContainerAnswerQuestion firstPost">{{$topic->firstPost}}</p>
                </div>

                @foreach($topic->posts as $post)
                <div class="divContainerAnswer rep">
                    <label data-nickname="{{$post->writterUser}}" class="labelMessage">{{$post->writterUser}}</label>

                    <label class="date">{{$post->created_at}}</label>
                    <p class="ContainerAnswerQuestion">
                      {{$post->content}}
                    </p>
                    <button type="button" class="btn btn-xs" id="answerThis">répondre</button>
                </div>


            </div>

            <div>
        <input class="form-control" id="messageForum" placeholder="Écrire un message">

                <div class="col-md-3 btnForum">
            <button type="button" class="btn btn-xs">Envoyer</button>
                </div>
      </div>

      </div>


        <div class="col-md-offset-1 col-md-4">

                <div class="row">

                  <div class="col-md-12 designBox sideBox">

            <h3>{{$domain->name}}</h3>

            <p>{{$domain->description}}</p>


                  </div>


                    <div class="col-md-12 designBox sideBox">

        <h3 class="titreBox">Je ne trouve pas de réponse :</h3>
                    <button type="submit" class="btn btn-m" name="question" >Poser ma question!</button>
                    <button type="submit" class="btn btn-m" name="question">Urgences et adresses</button>
                  </div>


      <div class="col-md-12 designBox sideBox">
        <h3 class="titreBox">Discussion sur ce sujet:</h3>
                <ul class="lienArticle">
          <li><a href="#">Je m’automutile à cause de mes parents</a></li>
          <li><a href="#">J'ai si peur et je ne sers à rien</a></li>
          <li><a href="#">Je vais mal et j’ai besoin d’aide</a></li>
                    <a><div class="col-mlg-3 boxPlusMenu">
            <h4>Afficher toutes les discussions...</h4>
          </div></a>
        </ul>
                    <button type="submit" class="btn btn-m" name="question" >Proposer une discussion!</button>

      </div>

      <div class="col-md-12 designBox sideBox">
        <h3 class="titreBox">Sur le thème de la santé :</h3>
                <button class="btn btn-xs" name="questionsReponses">Questions / Réponses</button>
                <button class="btn btn-xs" name="questionsReponses">Discussions entre jeunes</button>
                <button class="btn btn-xs" name="questionsReponses">Témoignages</button>
                <button class="btn btn-xs" name="questionsReponses">Plus d'outils</button>

      </div>



                </div>
    </div>

    </div>

    @stop
