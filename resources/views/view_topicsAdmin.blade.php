@extends('view_master')

@section('title', 'Dashboard')

@section('content')

<div class="row" id="contenu">

			<div class="col-md-7 designBox">

			<h2>Discussions</h2>
            <h3>Topics à valider: </h3>

                    <ul class="lienArticle">
											@foreach ($topicsToValidate as $topicToValidate)
											<li><a href="/topics/validate/{{ $topicToValidate->id }}"></a>{{ $topicToValidate->name }}</li>
											@endforeach
			  						</ul>

            <h3>Topics validés: </h3>

                      <ul class="lienArticle">
												@foreach ($topicsValidated as $topicValidated)
    										<li><a href="/topics/show/{{$topicValidated->id}}"></a>{{ $topicValidated->name }}</li>
												@endforeach
											</ul>

						</div>


</div>

@stop
