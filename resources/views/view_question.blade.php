@extends('view_master')

@section('title', 'Question')

@section('content')

<div class="container article">
	<div class="row" id="contenu">

		<div class="col-md-12" id="breadcrums">

			<p><a href="{{url('/home')}}">Accueil</a> > <a href="{{url('/domain/'.$domain->id)}}">{{$domain->name}}</a> > <a href="{{url('/domain/'.$domain->id.'/question/'.$question->id)}}">{{$question->name}}</a></p>
		</div>

	</div>

	<div class="col-md-7 designBox" itemscope itemtype="https://schema.org/Question">
        <div class="row">
		<h2>Question / Réponse</h2>
		<h3 itemprop="about">@if($domain->parentDomain !== null) {{$domain->parentDomain->name}} @endif  {{$domain->name}}</h3>
		<div class="col-md-12 divContainerQuestion">
                        <div class="row">

			<label class="labelMessage">Quesiton posée par: <span itemprop="creator">{{$question->questionUser->nickname}}</span></label>

			<label class="date"><time itemprop="dateCreated">{{$question->created_at}}</time></label>

			<p class="ContainerAnswerQuestion" itemprop="text">{{$question->content}}</p>
		</div>
            </div>

		@if($question->answer != null)
		<div class="col-md-12 divContainerAnswer rep">
            <div class="row">
			<label class="labelMessage">Répondu par: <span itemprop="creator">{{$question->answer->answererUser->nickname}}</span></label>

			<label class="date"><time itemprop="dateCreated">{{$question->answer->created_at}}</time></label>

			<p class="ContainerAnswerQuestion" itemprop="text">
				{{$question->answer->content}}
			</p>
		</div>
            	</div>
		@endif
		{{--@if($question->public != true)
			<form action="#" method="post">
				<input type="hidden" name="question_id" value="{{$question->id}}">
				<div class="form-group">
					<div >
						<input type="submit" class="btn btn-primary publier"/>
					</div>
				</div>
			</form>
		@endif--}}

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
