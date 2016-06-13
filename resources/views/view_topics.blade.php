@extends('view_master')

@section('title', 'Liste des discussion')

@section('content')
<div class="container article">
        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Liste des discussions</p>
    </div>
        </div>
    
    
    <div class="col-md-7 designBox">
        <div class="row">

         <h2>{{$domain->name}}</h2>

          <p>
         Ci-dessous, tu peux voir toute les discussions en rapport avec cette thématique. N’hésite pas à participer et partages tes expériences et connaissances.
</p>


          </p>
    </div>
        </div>

      <div class="col-md-7 designBox">
          <div class="row">

         <h3>Liste des discussions :</h3>

         <ul class="designForum">

           @if($domain->isSubdomain())
         @foreach($domain->subDomainTopics as $topic)
            <li><a href="domain/{{$domain->id}}/discussion/{{$topic->id}}">{{$topic->name}}</a>
              <p>{{$topic->created_at}}</p>
            </li>
        @endforeach
        @else
        @foreach($domain->topics as $topic)
            <li><a href="domain/{{$domain->id}}/discussion/{{$topic->id}}">{{$topic->name}}</a>
              <p>{{$topic->created_at}}</p>
            </li>
        @endforeach
        @endif
        </ul>
              <button type="submit" class="btn btn-m" name="question">Proposer une discussion!</button>
      </div>
                </div>



      <div class="col-md-offset-1 col-md-4">

        <div class="row">

                    <div class="col-md-12 designBox sideBox">
                      <!--Vérifier distinction SubDomain vs Domain -->
                      @if($domain->isSubdomain())
                      <h3>{{$domain->name}}</h3>

                      <p>{{$domain->description}}</p>
                      @else
                      <h3>{{$domain->name}}</h3>

                      <p>{{$domain->description}}</p>
                      @endif

                    </div>


          @include('partials._moreInfos')



        </div>

      </div>


    </div>
@stop