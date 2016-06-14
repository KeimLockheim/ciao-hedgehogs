
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
					</div>

					<script>
					$(function() {
						$('#dl-menu').dlmenu();
					});
					</script>
