<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">


	    <title>Ciao.ch | @yield('title') </title> <!-- CHANGE THE TITLE HERE -->

	    <!-- CSS -->
          
            <link href=" {{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
            <link href=" {{ asset('assets/css/comem.css') }}" rel="stylesheet">
            <link href=" {{ asset('assets/css/megaMenu.css') }}" rel="stylesheet">
            <link href=" {{ asset('assets/formvalidation/dist/css/formValidation.min.css') }}" rel="stylesheet">


      <!-- jQuery  -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      <!-- FormValidation -->
     <script src="{{ asset('assets/formvalidation/dist/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('assets/formvalidation/dist/js/framework/bootstrap.js') }}"></script>


      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/megaMenu.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>

	  </head>

	  <body>
	  	<div class="container">

	  		<header>
				<div class="row">

					<div class="col-md-2">
						<img src="{{ asset('assets/img/logo.png') }}" alt="logo" id="logo">
					</div>
				<div class="col-lg-offset-4 col-md-6 icon">
					<div >
						<img src="{{ asset('assets/img/ambulance-xxl.png') }}" alt="urgence" class="imgHeader">
                        <button class="btn btn-xs large" name="question">Poser ma question!</button>

                    </div>
                    </div>
					</div>
				</div>
			</header>

        <div class="container">

      @yield('megamenu')

        </div>

		<div class="container">

      @yield('content')

    </div>

       <footer>

			<div class="fondFooter">

				<div class="container">
					<div class="row">
						<ul>
							<div class="col-md-2">
								<li><a href="https://www.facebook.com/ciao.ch"><img src="{{ asset('assets/img/facebook.png') }}" alt="Facebook" id="facebook"></a></li>
							</div>
							<div class="col-md-2">
								<li><a href="#">Ton avis</a></li>
							</div>
							<div class="col-md-2">
								<li><a href="#">Toutes les questions</a></li>
							</div>
							<div class="col-md-2">
								<li><a href="#">À propos de Ciao</a></li>
							</div>
							<div class="col-md-2">
								<li><a href="#">Dictionnaire</a></li>
							</div>
						</ul>

					</div>
				</div>
			</div>

				<div class="container designBoxFooter">

					<div class="row">

						<div class="col-md-4 footerCenter">
							<div class="row">
								<div class="col-md-12">
									<h3>Avec le soutien de :</h3>
								</div>
								<div class="col-md-6">
									<a href="http://oakfnd.org/"><img src="{{ asset('assets/img/oak.png') }}" class="logoFooter" alt="Oak Foundation"></a>
								</div>
								<div class="col-md-6">
									<a href="https://www.loro.ch/fr"><img src="{{ asset('assets/img/romande.jpg') }}" class="logoFooter" alt="Loterie Romande"></a>
								</div>	
								<div class="col-md-12 iban">

									<h4>Soutenez nous :</h4>
									<h5>CCP 10-5261-6</h5>
								</div>								
							</div>
					  	</div>

					  	<div class="col-md-4">

							  		<h3 class="footerCenter">Numéros d'urgence :</h3>

							  		<p class="footerCenter"><img src="{{ asset('assets/img/medecin.png') }}" alt="medecin" class="footerIcons"> Médical - <span class="footerNum">144</span></p>
							  		<p class="footerCenter"><img src="{{ asset('assets/img/pompier.png') }}" alt="pompier" class="footerIcons"> Pompiers - <span class="footerNum">118</span></p>
							  		<p class="footerCenter"><img src="{{ asset('assets/img/police.png') }}" alt="police" class="footerIcons"> Police - <span class="footerNum">117</span></p>
							  		<p class="footerCenter"><img src="{{ asset('assets/img/general.png') }}" alt="general" class="footerIcons"> Général - <span class="footerNum">112</span></p>
							
						</div>

					  	<div class="col-md-4">

					  		<h3 class="footerCenter">Ciao c'est :</h3>
					  		<ul>
						  		<li>Une association</li>
						  		<li>Un site internet créé en 1997, certifié accessible et HON</li>
						  		<li>Une collaboration avec 15 institutions partenaires</li>
						  		<li>Des sites partenaires : feelok.ch et tschau.ch</li>
						  		<li>En 2015 plus de 13 000 visiteurs par semaine en moyenne, 2'000'000 de pages vues et 2848 questions posées</li>
					  		</ul>
							
						</div>

					</div>

				</div>

			</div>

		</footer>





	  </body>
	</html>
