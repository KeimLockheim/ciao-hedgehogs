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
	<link href=" {{ asset('assets/css/responsiveMenu.css') }}" rel="stylesheet">
	<link href=" {{ asset('assets/formvalidation/dist/css/formValidation.min.css') }}" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto:700,500,400|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="{{{ asset('assets/img/favicon.png') }}}">

	<!-- jQuery  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- FormValidation -->
	<script src="{{ asset('assets/formvalidation/dist/js/formValidation.min.js') }}"></script>
	<script src="{{ asset('assets/formvalidation/dist/js/framework/bootstrap.js') }}"></script>

	<!-- FormValidation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.3.0/zxcvbn.js"></script>

	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/megaMenu.js') }}"></script>
	<script src="{{ asset('assets/js/validation.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>

	<script src="{{ asset('assets/js/modernizr.js') }}"></script>

</head>

<body>



	<div class="container">

		<div class="monContenu">
			<header itemscope itemtype="https://schema.org/Organization">

				<div class="headerResp">
					@if($userConnected)
                    <a href="/dashboard"><img src="{{ asset('assets/img/user.png') }}" class="iconResp" alt="compte" ></a>
					<a href="/logout"><img src="{{ asset('assets/img/signinGris.png') }}" class="iconResp" alt="se deconnecter"></a>
					@else
					<a class="login" data-toggle="modal" data-target="#login"><img src="{{ asset('assets/img/decoGris.png') }}" class="iconResp" alt="se connecter"></a>
					@endif
				</div>

				<div class="row">
					<div class="col-md-2 logoHeader">
						<a href="/home"><img src="{{ asset('assets/img/logo.png') }}"  alt="logo" id="logo" itemprop="logo"></a>
					</div>

					<div class="col-lg-offset-7 col-md-3 icon">

						<div>
							<a href="/urgences"><img src="{{ asset('assets/img/ambulance-xxl.png') }}" alt="urgence" class="imgHeader"></a>

							<a href="/ask/1"><button type="submit" class="btn btn-xs large">Poser ma question!</button></a>
						</div>
					</div>
				</div>
			</header>

			<div class="container">
				@include('partials._responsiveMenu')

				@include('partials._megamenu')



			</div>

			<div class="container">

				@yield('content')

			</div>
		</div>

	</div>
	<a href="#" id="back-to-top" title="Back to top">&uarr;</a>


	@include('partials._footer')

	@include('partials._signIn')


</body>
</html>
