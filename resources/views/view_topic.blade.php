@extends('view_master')

@section('title', 'Discussion')

@section('content')

<div class="container article" itemscope itemtype="https://schema.org/DiscussionForumPosting">

  <div class="row" id="contenu">
    <div class="col-md-12" id="breadcrums">
      <p><a href="/hedgehogs/home">Accueil</a> > <a href="/hedgehogs/domain/{{$domain->id}}">{{$domain->name}}</a> > Discussion</p>
    </div>
  </div>

  <div class="col-md-7 designBox">
    <h2>Discussion</h2>
    <h3 itemprop="about">{{$topic->name}}</h3>
    <div class="forum">
      <div class="divContainerQuestion">
        <label class="labelMessage" itemprop="creator">{{$topic->creatorUser->nickname}}</label>

        <label class="date"><time itemprop="dateCreated">{{$topic->created_at}}</time></label>

        <p class="ContainerAnswerQuestion firstPost">{{$posts->first()->content}}</p>
      </div>

      @foreach($posts->splice(1) as $post)
      <div class="divContainerAnswer rep">
        <label class="labelMessage" itemprop="creator">{{$post->writterUser->nickname}}</label>

        <label class="date"><time itemprop="dateCreated">{{$post->created_at}}</time></label>
        <p class="ContainerAnswerQuestion" itemprop="comment">
          {{$post->content}}
        </p>
        <div class="btnForum">
          <a href="#"><button type="button" data-nickname="{{$post->writterUser->nickname}}" class="btn btn-xs large answerTo">Répondre</button></a>
        </div>
      </div>
      @endforeach

    </div>

    <form id="answerTopic" action="/hedgehogs/post" method="post">

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
          <button type="submit" class="btn btn-xs">Envoyer</button>
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

      @include('partials._moreInfos')

      @include('partials._moreDiscussion')

      @include('partials._moreOnTheme')

    </div>
  </div>

</div>

@stop
