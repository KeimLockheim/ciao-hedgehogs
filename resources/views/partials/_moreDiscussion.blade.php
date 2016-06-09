<div class="col-md-12 designBox sideBox">
  <h3 class="titreBox">Discussions sur ce sujet:</h3>
  <ul class="lienArticle">



      @foreach($domain->topics->slice(0, 4) as $topic)
        <li><a href="#">{{$topic->name}}</a></li>
      @endforeach

    </ul>

<a href="/domain/{{$domain->id}}/discussions"><div class="col-mlg-3 boxPlusMenu">
  <h4>Afficher toutes les discussions...</h4>
</div></a>

<button type="submit" class="btn btn-m" name="question" >Proposer une discussion!</button>

</div>
