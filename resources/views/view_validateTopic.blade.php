@extends('view_master')

@section('title', 'Dashboard - Valider une discussion')

@section('content')

		<div class="container">
            
            <div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Accueil <span class="interBread">></span> Admin <span class="interBread">></span> Valider une discussion</p>
			  </div>
  </div>

		<div class="col-md-7 designBox">
            <div class="row">

			<h2>Valider un sujet de discussion entre jeunes</h2>
			<form id="validateTopic">

					<div class="form-group">
							<label for="question">Le sujet proposé: (non modifiable)</label>
								<textarea class="form-control" rows="3" id="question" disabled>{{$topic->name}}</textarea>
					</div>
					<div class="form-group">
							<label for="post">La proposition de disucussion:</label>
							<textarea class="form-control" rows="4" name="topicPost" id="topicPost" disabled>{{$post->content}}</textarea>
					</div>

				 <div class="form-group">
								 <label class="control-label">Valider la publication de la discussion:</label>
								 <div>
										 <div class="radio">
												 <label>
														 <input type="radio" name="validateStatus" value="oui" id="oui" /> Oui
												 </label>
										 </div>
										 <div class="radio">
												 <label>
														 <input type="radio" name="validateStatus" value="non" id="non" /> Non
												 </label>
										 </div>
								 </div>
						 </div>

						 <div class="form-group reason">
								 <label for="question">Raison du refus</label>
									 <textarea class="form-control" rows="3" name="reason" id="reason"></textarea>
						 </div>


					<div class="form-group">
							<div>
									<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Appliquer</button>
							</div>
					</div>




			</form>
		</div>
</div>
		</div>

@stop
