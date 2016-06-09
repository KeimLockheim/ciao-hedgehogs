@extends('view_master')

@section('title', 'Liste des questions')

@section('content')

<div class="container article">

        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread"></span> {{$domain->name}} <span class="interBread"></span> Questions </p>
    </div>
        </div>
      <div class="col-md-7 designBox">
         <h2>{{$domain->name}}</h2>

         <h3>Liste des questions :</h3>


         <ul class="designForum">
             @if($domain->isSubdomain())
           @foreach($domain->subDomainQuestions as $question)
              <li><a href="domain/{{$domain->id}}/question/{{$question->id}}">{{$question->name}}</a>
                <p>{{$question->questionerAt}}</p>
              </li>
          @endforeach
          @else
          @foreach($domain->domainQuestions as $question)
              <li><a href="domain/{{$domain->id}}/question/{{$domain->domainQuestions->id}}">{{$domain->domainQuestions->name}}</a>
                <p>{{$question->questionerAt}}</p>
              </li>
          @endforeach
          @endif

        </ul>

      </div>


      <div class="col-md-offset-1 col-md-4">

        <div class="row">


          <div class="col-md-12 designBox sideBox">

            @incluse('partials._moreInfos')

                </div>

                @include('partials._moreDiscussion')

        </div>

      </div>


    </div>
