@extends('view_master')

@section('title', 'Liste des discussion')

@section('content')
<div class="container article">
  <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p><a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/domain/'.$domain->id)}}">{{$domain->name}}</a> > <a href="{{url('/domain/'.$domain->id.'/discussions')}}">Liste des discussions</a></p>
    </div>
  </div>

  
  <div class="col-md-7 designBox">
    <div class="row">

      <h2>{{$domain->name}}</h2>

      <p>
        Ci-dessous, tu peux voir toutes les discussions en rapport avec cette thématique. N’hésite pas à participer et partager tes expériences et connaissances.
      </p>
  </div>
</div>

<div class="col-md-7 designBox">
  <div class="row">

    <h3>Liste des discussions :</h3>

    <ul class="designForum">


      @foreach($domain->topics as $topic)
      <li><a href="{{url('/domain/'.$domain->id.'/discussion/'.$topic->id)}}}}">{{$topic->name}}</a>
        <p>{{$topic->created_at}}</p>
      </li>
      @endforeach

    </ul>
    <a href="{{url('/propose/'.$domain->id)}}"><button type="submit" class="btn btn-m"><img src="{{ asset('assets/img/forum.png') }}" alt="question" class="iconButton">Proposer une discussion!</button></a>
  </div>
</div>



<div class="col-md-offset-1 col-md-4">

  <div class="row">

    <div class="col-md-12 designBox sideBox">
      <h3>{{$domain->name}}</h3>

      <p>{{$domain->description}}</p>


    </div>


    @include('partials._moreInfos')



  </div>

</div>


</div>
@stop
