@extends('view_master')

@section('title', 'Question')

@section('content')

<div class="container article">
		<div class="row" id="contenu">

  <div class="col-md-12" id="breadcrums">

      <p>Accueil <span class="interBread"></span> {{$domain->name}} <span class="interBread"></span>
          on met l'id de la question mais ça devrait être le name. ID: {{$question->id}}{{$question->name}}
      </p>
  </div>

    </div>

      <div class="col-md-7 designBox" itemscope itemtype="https://schema.org/Question">
         <h2>Question / Réponse</h2>
            <h3 itemprop="about">@if($domain->parentDomain !== null) {{$domain->parentDomain->name}} @endif  {{$domain->name}}</h3>
                <div class="divContainerQuestion">
                        <label class="labelMessage">quesiton posée par: <span itemprop="creator">{{$question->questionUser->nickname}}</span></label>

                        <label class="date"><time itemprop="dateCreated">{{$question->created_at}}</time></label>

                    <p class="ContainerAnswerQuestion" itemprop="text">{{$question->content}}</p>
                </div>

                <div class="divContainerAnswer rep">
                        <label class="labelMessage"><span itemprop="creator">{{$question->answer->answered_by}}</span></label>

                        <label class="date"><time itemprop="dateCreated">{{$question->answer->created_at}}</time></label>

                    <p class="ContainerAnswerQuestion" itemprop="text">
                  {{$question->answer->content}}
                    </p>
                </div>
          <div class="form-group">
			    <div >
			      <input type="submit" class="btn btn-primary publier" value="Rendre public"/>
			    </div>
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
