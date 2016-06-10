@extends('view_master')

@section('title', 'Discussion')

@section('content')

<div class="container article">
    <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Discussion</p>
    </div>
        </div>

      <div class="col-md-7 designBox">
         <h2>Discussion</h2>
                    <h3>{{$topic->name}}</h3>
                <div class="forum">
                <div class="divContainerQuestion">
                        <label class="labelMessage">{{$topic->creatorUser->nickname}}</label>

                        <label class="date">{{$topic->created_at}}</label>

                    <p class="ContainerAnswerQuestion firstPost">premier post: {{$posts->first()->content}}</p>
                </div>

                @foreach($posts->splice(1) as $post)
                <div class="divContainerAnswer rep">
                    <label data-nickname="{{$post->writterUser->nickname}}" class="labelMessage">{{$post->writterUser->nickname}}</label>

                    <label class="date">{{$post->created_at}}</label>
                    <p class="ContainerAnswerQuestion">
                      réponse: {{$post->content}}
                    </p>
                    <button type="button" class="btn btn-xs" id="answerThis">répondre</button>
                </div>
                @endforeach

            </div>

  <form id="answerTopic">

      <div class="form-group">
        <input type="hidden" id="parentPost" name="parentPost_id" value="">
      </div>
      <div class="form-group">
        <input type="hidden" name="topic_id" value="{{$topic->id}}">
      </div>
      <div class="form-group">
        <input class="form-control" id="messageForum" name="answer" placeholder="Écrire un message">
      </div>
      <div class="form-group">
        <div class="col-md-3 btnForum">
            <button type="button" class="btn btn-xs">Envoyer</button>
        </div>
      </div>

    </form>

      </div>


        <div class="col-md-offset-1 col-md-4">

                <div class="row">

                      <div class="col-md-12 designBox sideBox">

                        <h3>{{$domain->name}}</h3>

                        <p>{{$domain->description}}</p>


                      </div>


                        <div class="col-md-12 designBox sideBox">
                              @include('partials._moreInfos')
                        </div>


                        @include('partials._moreDiscussion')

                      <div class="col-md-12 designBox sideBox">
                                    @include('partials._moreOnTheme')

                      </div>



                </div>
         </div>

    </div>

    @stop