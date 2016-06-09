<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">


	    <title>Ciao.ch | @yield('title') </title> <!-- CHANGE THE TITLE HERE -->

	    <!-- CSS -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/comem.css" rel="stylesheet">
	    <link href="css/ben.css" rel="stylesheet">
      <link href="css/emi.css" rel="stylesheet">
      <link href="css/megaMenu.css" rel="stylesheet">
      <link rel="stylesheet" href="formvalidation/dist/css/formValidation.min.css">

      <!-- jQuery  -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

      <!-- FormValidation -->
      <script src="formvalidation/dist/js/formValidation.min.js"></script>
      <script src="formvalidation/dist/js/framework/bootstrap.js"></script>

      <script src="js/bootstrap.min.js"></script>
      <script src="js/megaMenu.js"></script>
      <script src="js/main.js"></script>

	  </head>

	  <body>
	  	<div class="container">

	  		<header>
				<div class="row">

					<div class="col-md-2">
						<img src="img/logo.png" alt="logo" id="logo">
					</div>
				<div class="col-lg-offset-4 col-md-6 icon">
					<div >
						<img src="img/ambulance-xxl.png" alt="urgence" class="imgHeader">
						<img src="img/address.png" alt="adresses" class="imgHeader">
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
								<li><a href="#">Facebook</a></li>
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

				<div class="container designBoxFooter sideBox ">

					<div class="row">

						<div class="col-md-5">
							<div class="row">
								<div class="col-md-12">
									<h4>Avec le soutien de :</h4>
								</div>
								<div class="col-md-6">
									<a href="http://oakfnd.org/"><img src="img/oak.gif" alt="Oak Foundation"></a>
								</div>
								<div class="col-md-6">
									<a href="https://www.loro.ch/fr"><img src="img/romande.gif" alt="Loterie Romande"></a>
								</div>
								<div class="col-md-12">
									<h4>Soutenez nous :</h4>
									<h4>CCP 10-5261-6</h4>
								</div>
							</div>
					  	</div>

					  	<div class="col-md-offset-2 col-md-5">

					  		<h4>Ciao c'est :</h4>

					  		<p>- Une association</p>
					  		<p>- Un site internet créé en 1997, certifié accessible et HON</p>
					  		<p>- Une collaboration avec 15 institutions partenaires</p>
					  		<p>- Des sites partenaires : feelok.ch et tschau.ch</p>
					  		<p>- En 2015 plus de 13 000 visiteurs par semaine en moyenne, 2'000'000 de pages vues et 2848 questions posées</p>

						</div>

						<div class="col-md-12">
							<hr>
						</div>

						<div class="col-md-2">
							<h4>Ce site respecte :</h4>
						</div>
						<div class="col-md-1">
							<img src="img/honc.gif" alt="HONC">
						</div>
						<div class="col-md-1">
							<img src="img/afa.gif" alt="AFA">
						</div>

					</div>

				</div>

			</div>

		</footer>





	  </body>
	</html>
