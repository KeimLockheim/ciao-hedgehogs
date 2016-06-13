@extends('view_master')

@section('title', 'Dashboard des discussions')

@section('content')

<div class="row" id="contenu">
      
    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span>  <span class="interBread">></span> Liste des discussions admin</p>
    </div>
  </div>

			<div class="col-md-7 designBox">
                <div class="row"></div>
			<h2>Discussions</h2>
            <h3>Topics à valider: </h3>

                    <ul class="lienArticle">
											@foreach ($topicsToValidate as $topicToValidate)
											<li><a href="/topics/validate/{{ $topicToValidate->id }}">{{ $topicToValidate->name }}</a></li>
											@endforeach
			  						</ul>

            <h3>Topics validés: </h3>

                      <ul class="lienArticle">
												@foreach ($topicsValidated as $topicValidated)
    										<li><a href="/topics/show/{{$topicValidated->id}}">{{ $topicValidated->name }}</a></li>
												@endforeach
											</ul>
                            
						</div>



@stop
