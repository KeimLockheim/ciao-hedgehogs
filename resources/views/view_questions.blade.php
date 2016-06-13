@extends('view_master')

@section('title', 'Liste des questions')

@section('content')

<div class="container article">
    

        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Liste des questions</p>
    </div>
        </div>
    
    
    <div class="col-md-7 designBox">
                            <div class="row">

         <h2>{{$domain->name}}</h2>

          <p>
        Ci-dessous sont listées toutes les questions en rapport avec cette thématique.

          </p>
    </div>
        </div>
    
      <div class="col-md-7 designBox">
            <div class="row">
         <h3>Liste des questions :</h3>

         <ul class="designForum">
             @if($domain->isSubdomain())
           @foreach($domain->subDomainQuestions as $question)
              <li><a href="domain/{{$domain->id}}/question/{{$question->id}}">{{$question->name}}</a>
                <p>{{$question->created_at}}</p>
              </li>
          @endforeach
          @else
          @foreach($domain->domainQuestions as $question)
              <li><a href="domain/{{$domain->id}}/question/{{$question->id}}">{{$question->name}}</a>
                <p>{{$question->created_at}}</p>
              </li>
          @endforeach
          @endif

        </ul>
      </div>

      </div>


      <div class="col-md-offset-1 col-md-4">

        <div class="row">


         

            @include('partials._moreInfos')


            @include('partials._moreDiscussion')

        </div>

      </div>


    </div>
    @stop
