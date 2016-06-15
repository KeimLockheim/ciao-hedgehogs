@extends('view_master')

@section('title', 'Dashboard des discussions')

@section('content')

<div class="row" id="contenu">

  <div class="col-md-12" id="breadcrums">
    <p><a href="/dashboard">Dashboard</a> > Admin > Liste des discussions admin</p>
  </div>
</div>

<div class="col-md-7 designBox">
  <div class="row"></div>
  <h2>Discussions</h2>
  <h3>Topics à valider: </h3>

  <ul class="lienArticle">
    @foreach ($topicsToValidate as $topicToValidate)
    <li><a href="/dashboard/topics/validate/{{ $topicToValidate->id }}">{{ $topicToValidate->name }}</a></li>
    @endforeach
  </ul>

  <h3>Topics modérés: </h3>

  <ul class="lienArticle">
    @foreach ($topicsValidated as $topicValidated)
    <li><a href="/dashboard/topics/validate/{{$topicValidated->id}}">{{ $topicValidated->name }}</a></li>
    @endforeach
  </ul>
</div>



@stop
