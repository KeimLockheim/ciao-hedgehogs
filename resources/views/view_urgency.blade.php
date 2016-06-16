@extends('view_master')

@section('title', 'Urgences et adresses')

@section('content')
<div class="container article">


	<div class="row" id="contenu">

		<div class="col-md-12" id="breadcrums">
			<p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/domain/{{$domain->id}}">{{$domain->name}}</a> > Urgences et adresses</p>
		</div>
	</div>

	<div class="col-md-12 designBox">


		<h1>Liste des adresses d'urgences {{$domain->name}}</h1>

		<div class="row">
			@foreach($domain->urgencies as $urgency)
				<div class="col-md-offset-1 col-md-5 boxUrgences">
				<div class="row carteVisite">
					<h3>{{$urgency->name}}</h3>
					<div class="containCarte">
						<p><img src="{{ asset('assets/img/phone.png') }}" alt="phone" class="imgUrgency"><label>{{$urgency->telephoneNumber}}</label></p>

						<p><img src="{{ asset('assets/img/mail.png') }}" alt="mail" class="imgUrgency"><label>{{$urgency->email}}</label></p>

						<p><img src="{{ asset('assets/img/web.png') }}" alt="web" class="imgUrgency"><label><a href="/hedgehogs/{{$urgency->webSite}}">{{$urgency->webSite}}</a></label></p>
					</div>

				</div>
			</div>
			@endforeach
		</div>


	</div>

</div>
@stop
