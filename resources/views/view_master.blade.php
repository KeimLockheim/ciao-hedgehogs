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


        </div>

		<div class="container">

      @yield('content')

    </div>
          <a href="#" id="back-to-top" title="Back to top">&uarr;</a>


       


 @include('partials._footer')


	  </body>
	</html>
