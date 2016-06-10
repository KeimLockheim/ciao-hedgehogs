@extends('view_master')

@section('title', 'Proposer une discussion')

@section('content')
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
    <form  id="proposeTopic">
        <div class="form-group">
            <input type="hidden" name="domain_id" value="{{$domain->id}}">
        </div>
        <div class="form-group">
            <label for="sujet">Ma proposition de sujet </label>
            <input class="form-control" id="sujet" name="topicName">
        </div>

        <div class="form-group">
            <label for="post">Mon premier message</label>
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
