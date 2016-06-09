@extends('view_master')

@section('title', $domain->name)

@section('content')

		<div class="container article">

			  	<div class="col-md-7 designBox">

            {{$domain->content}}

			  	</div>


			  	<div class="col-md-offset-1 col-md-4 designBox sideBox">
			  		<h3 class="titreBox">Je ne trouve pas de réponse :</h3>

            <a href="/ask/{{$domain->id}}"><button type="button" class="btn btn-xs">Poser ma question</button></a>
            <a href="/domain/{{$domain->id}}/urgences"><button type="button" class="btn btn-xs">Urgences et adresses</button></a>
			  	</div>

			  	@include('partials._moreDiscussion')

			  	<div class="col-md-offset-1 col-md-4 designBox sideBox">
			  		<h3 class="titreBox">Sur le thème {{$domain->name}} :</h3>

            <a href="/domain/{{$domain->id}}/questions"><button type="button" class="btn btn-xs">Questions / Réponses</button></a>
            <a href="/domain/{{$domain->id}}/discussions"><button type="button" class="btn btn-xs">Discussion entre jeunes</button></a>
            <a href="/domain/{{$domain->id}}/temoignages"><button type="button" class="btn btn-xs">Témoignages</button></a>
            <a href="/domain/{{$domain->id}}/more"><button type="button" class="btn btn-xs">Plus d'outils</button></a>

            <form action="">
                  <input type="submit" value="Questions / Réponses" class="btn btn-xs">
            </form>
            <form action="/domain/{{$domain->id}}/questions">
                  <input type="submit" value="Discussions entre jeunes" class="btn btn-xs">
            </form>
            <form action="/domain/{{$domain->id}}/temoignages">
                  <input type="submit" value="Témoignages" class="btn btn-xs">
            </form>
            <form action="/{{$domain->id}}/more">
                  <input type="submit" value="Plus d'outils" class="btn btn-xs">
            </form>

			  	</div>

        </div>

        @stop
