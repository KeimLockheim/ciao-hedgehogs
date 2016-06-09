<div class="container article">
        <div class="row" id="contenu">

    <div class="col-md-12" id="breadcrums">
      <p>Accueil <span class="interBread">></span> {{$domain->name}} <span class="interBread">></span> Disucssions</p>
    </div>
        </div>

      <div class="col-md-7 designBox">
         <h2>{{$topic->domain}}</h2>

         <h3>Liste des discussions :</h3>

         <ul class="designForum">

           @if($domain->isSubdomain)
         @foreach($domain->subDomainTopics as $topic)
            <li><a href="domain/{{$domain->id}}/discussion/{{$domain->subDomainTopics->id}}">{{$domain->subDomainTopics->name}}</a>
              <p>{{$topic->creatorAt}}</p>
            </li>
        @endforeach
        @else
        @foreach($domain->topics as $topic)
            <li><a href="domain/{{$domain->id}}/discussion/{{$domain->topics->id}}">{{$domain->topics->name}}</a>
              <p>{{$topic->creatorAt}}</p>
            </li>
        @endforeach
        @endif
        </ul>
              <button type="submit" class="btn btn-m" name="question">Proposer une discussion!</button>
      </div>


      <div class="col-md-offset-1 col-md-4">

        <div class="row">

                    <div class="col-md-12 designBox sideBox">
                      <!--Vérifier distinction SubDomain vs Domain -->
                      @if($domain->isSubdomain)
                      <h3>{{$domain->name}}</h3>

                      <p>{{$domain->description}}</p>
                      @else
                      <h3>{{$domain->name}}</h3>

                      <p>{{$domain->description}}</p>
                      @endif

                    </div>

          <div class="col-md-12 designBox sideBox">

          include('partials._moreInfos')

          </div>


        </div>

      </div>


    </div>
