@extends('view_master')

@section('title', 'Domaine')

@section('content')

<div class="container article">

	<div class="row" id="contenu">

		<div class="col-md-12" id="breadcrums">
			<p><a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/domain/'.$domain->id)}}">{{$domain->name}}</a></p>
		</div>
	</div>

	<div class="col-md-7 designBox">
		<div class="row">
			{!!$domain->content!!}

		</div>
	</div>


	<div class="col-md-offset-1 col-md-4">

		<div class="row">


			@include('partials._moreInfos')

			@include('partials._moreDiscussion')

			@include('partials._moreOnTheme')

		</div>
	</div>
</div>



@stop
