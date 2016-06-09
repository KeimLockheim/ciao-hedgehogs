@extends('view_master')

@section('title', 'Question')

@section('content')

<div class="container article">
        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">

      <p>Accueil <span class="interBread"></span> {{$domain->name}} <span class="interBread"></span> {{@question->name}}</p>
    </div>

    </div>

      <div class="col-md-7 designBox">
         <h2>Question / Réponse</h2>
                    <h3>{{$domain->parentDomain}}, {{$domain->name}}</h3>
                <div class="divContainerQuestion">
                        <label class="labelMessage">{{$question->askedBy}}</label>

                        <label class="date">{{$question->createdAt}}</label>

                    <p class="ContainerAnswerQuestion">{{$question->content}}</p>
                </div>

                <div class="divContainerAnswer rep">
                        <label class="labelMessage">{{$answer->answererUser}}</label>

                        <label class="date">{{$question->answererAt}}</label>

                    <p class="ContainerAnswerQuestion">
                  {{$answer->content}}
                    </p>
                </div>
      </div>


        <div class="col-md-offset-1 col-md-4">

                <div class="row">
                    <div class="col-md-12 designBox sideBox">

        <h3 class="titreBox">Je ne trouve pas de réponse :</h3>
        <a href="/ask/{{$domain->name}}"><button type="button" class="btn btn-xs">Poser ma question</button></a>
        <a href="/domain/{{$domain->name}}/urgences"><button type="button" class="btn btn-xs">Urgences et adresses</button></a>
            </div>


      <div class="col-md-12 designBox sideBox">
        <h3 class="titreBox">Discussion sur ce sujet:</h3>
        <ul class="lienArticle">
          @for ($i = 0; $i < 4; $i++)
          <li><a href="#">{{$domain->topics[$i]->name}}</a></li>
          @endfor
        </ul>
      </div>

      <div class="col-md-12 designBox sideBox">
        <h3 class="titreBox">Sur le thème {{$domain->name}} :</h3>

          <a href="/domain/{{$domain->name}}/questions"><button type="button" class="btn btn-xs">Questions / Réponses</button></a>
          <a href="/domain/{{$domain->name}}/discussions"><button type="button" class="btn btn-xs">Discussion entre jeunes</button></a>
          <a href="/domain/{{$domain->name}}/temoignages"><button type="button" class="btn btn-xs">Témoignages</button></a>
          <a href="/domain/{{$domain->name}}/more"><button type="button" class="btn btn-xs">Plus d'outils</button></a>

      </div>



      </div>
    </div>


    </div>
