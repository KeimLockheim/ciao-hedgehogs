@extends('view_master')

@section('title', 'Urgences')

@section('content')
<div class="container article">


			<div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Accueil <span class="interBread">></span> Urgences</p>
			  </div>
      </div>

			  	<div class="col-md-12 designBox">

			  		<h1>Liste des adresses d'urgences</h1>

			  		<div class="row">
              @foreach($urgencies as $urgency) <!-- $urgencies retourne liste de toutes les urgences -->
			  			<div class="col-md-offset-1 col-md-5 boxUrgences">
			  				<div class="row carteVisite">
					  				<h2>{{$urgency->title}}</h2>
					  				<h4>{{$urgency->name}}</h4>
                                <div class="containCarte">
					                             <p><img src="{{ asset('assets/img/phone.png') }}" alt="phone" class="imgUrgency"><label>{{$urgency->telephoneNumber}}</label></p>

					  				                   <p><img src="{{ asset('assets/img/mail.png') }}" alt="mail" class="imgUrgency"><label>{{$urgency->email}}</label></p>

					  				                   <p><img src="{{ asset('assets/img/web.png') }}" alt="web" class="imgUrgency"><label><a href="{{$urgency->webSite}}">{{$urgency->webSite}}</a></label></p>
                                </div>

					  		</div>
			  			</div>
              @endforeach
			  		</div>


			  	</div>

  </div>
	@stop
