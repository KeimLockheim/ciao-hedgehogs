<div class="col-md-12 designBox sideBox">
  <h3 class="titreBox">Discussions sur ce sujet:</h3>
  <ul class="lienArticle">



      @foreach($domainParent->topics->slice(0, 4) as $topic)
        <li><a href="{{url('/domain/'.$domainParent->id.'/discussion/'.$topic->id)}}">{{$topic->name}}</a></li>
      @endforeach

    </ul>


     <a href="{{url('/propose/'.$domainParent->id)}}"><button type="submit" class="btn btn-m"><img src="{{ asset('assets/img/forum.png') }}" alt="question" class="iconButton">Proposer une discussion!</button></a>

    
</div>
