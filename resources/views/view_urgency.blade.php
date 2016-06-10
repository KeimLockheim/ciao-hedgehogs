<div class="container article">


			<div class="row" id="contenu">

			  <div class="col-md-12" id="breadcrums">
			  	<p>Accueil <span class="interBread">></span> Urgences <span class="interBread">></span> Urgences sur {{$domain->name}}/p>
			  </div>
            </div>

			  	<div class="col-md-12 designBox">


			  		<h1>Urgences sur {{$domain->name}}</h1>

			  		<div class="row">
              @foreach($domain->urgency as $dom)
			  			<div class="col-md-5 boxUrgences">
			  				<div class="row carteVisite">
					  				<h2>{{$dom->title}}</h2>
					  				<h4>{{$dom->name}}</h4>
                                <div class="containCarte">
					  				<p><img src="img/phone.png" alt="phone" class="imgUrgency"><label>{{$dom->telephoneNumber}}</label></p>

					  				<p><img src="img/mail.png" alt="mail" class="imgUrgency"><label>{{$dom->email}}</label></p>

					  				<p><img src="img/web.png" alt="web" class="imgUrgency"><label><a href="{{$urgency->webSite}}">{{$dom->webSite}}</a></label></p>
                                </div>

					  		</div>
			  			</div>
              @endforeach
			  		</div>


			  	</div>

  </div>
