<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Responsive Multi-Level Menu - Demo 1</title>
		<meta name="description" content="Responsive Multi-Level Menu: Space-saving drop-down menu with subtle effects" />
		<meta name="keywords" content="multi-level menu, mobile menu, responsive, space-saving, drop-down menu, css, jquery" />
		<meta name="author" content="Codrops" />
		
	</head>
	<body>
			
		
            

<div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger icon-menu">&#xe9bd</button>
						<ul class="dl-menu">
                            
                            <li>
								<a href="/home">Accueil</a>
							</li>
							<li>
								<a href="#">Santé</a>
								<ul class="dl-submenu">
									<li>
										<a href="#">Santé</a>
										<ul class="dl-submenu">   
                                            @foreach($domSante as $sub)
                                            <li><a href="/domain/{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
									<li>
										<a href="#">Stress</a>
										<ul class="dl-submenu">
                                             @foreach($domStress as $sub)
                                            <li><a href="/domain/{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
									<li>
										<a href="#">Boire, fumer, se droguer</a>
										<ul class="dl-submenu">
											@foreach($domBoire as $sub)
                                            <li><a href="domain/{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
                                    <li>
										<a href="#">Manger-bouger</a>
										<ul class="dl-submenu">
								            @foreach($domManger as $sub)
                                            <li><a href="/domain/{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach	
										</ul>
									</li>
								</ul>
							</li>
                            <li>
								<a href="#">Moi, toi,...</a>
								<ul class="dl-submenu">
									<li>
										<a href="#">Estime de soi</a>
										<ul class="dl-submenu">   
                                            @foreach($domEstime as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
									<li>
										<a href="#">Moi, toi et les autres</a>
										<ul class="dl-submenu">
                                             @foreach($domMoi as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
								</ul>
							</li>
                            
                            <li>
								<a href="#">Sexualité</a>
								<ul class="dl-submenu">
                                          @foreach($domSex as $sub)
                                            <li><a href="/domain/{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
									
								</ul>
							</li>
						
							<li>
								<a href="#">Violences</a>
								<ul class="dl-submenu">
									<li>
										<a href="#">Violence</a>
										<ul class="dl-submenu">   
                                          @foreach($domViolences as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
                                    <li>
										<a href="#">Discrimination et racismes</a>
										<ul class="dl-submenu">   
                                          @foreach($domDiscrim as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
									
								</ul>
							</li>
                           <li>
								<a href="#">Religion</a>
								<ul class="dl-submenu">
										 @foreach($domReligions as $sub)
                                        <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                        @endforeach
								</ul>
							</li>
                           <li>
								<a href="#">Avenir</a>
								<ul class="dl-submenu">
									<li>
										<a href="#">Argent</a>
										<ul class="dl-submenu">   
                                           @foreach($domArgent as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
                                    <li>
										<a href="#">Formation et travail</a>
										<ul class="dl-submenu">   
                                          @foreach($domFormations as $sub)
                                            <li><a href="{{$sub->id}}">{{$sub->name}}</a></li>
                                            @endforeach
										</ul>
									</li>
									
								</ul>
							</li>
						</ul>
					</div><!-- /dl-menuwrapper -->
				
		
		<script>
			$(function() {
				$('#dl-menu').dlmenu();
			});
		</script>
        
    </body>
</html>