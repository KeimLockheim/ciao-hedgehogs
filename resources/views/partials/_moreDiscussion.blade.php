<div class="col-md-12 designBox sideBox">
  <h3 class="titreBox">Discussions sur ce sujet:</h3>
  <ul class="lienArticle">
    @for ($i = 0; $i < 4; $i++)
    <li><a href="#">{{$domain->topics[$i]->name}}</a></li>
    @endfor

<a href="/domain/{{$domain->name}}/discussions"><div class="col-mlg-3 boxPlusMenu">
  <h4>Afficher toutes les discussions...</h4>
</div></a>

<button type="submit" class="btn btn-m" name="question" >Proposer une discussion!</button>

</div>
