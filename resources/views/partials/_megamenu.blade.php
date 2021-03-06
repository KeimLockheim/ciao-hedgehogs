  <nav class="navbar navbar-inverse">
            <div class="container-fluid">

                <ul class="nav navbar-nav">

                    <li><a href="{{url('/home')}}"><img src="{{ asset('assets/img/home.png') }}" alt="home" class="imgNav"><p>Accueil</p></a></li>
                    <!------------------------>

                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/sante.png') }}" alt="sante" class="imgNav"><p>Santé<b class="caret"></b></p> </a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="{{url('/domain/1')}}">Santé</a></li>
                                    <li class="divider"></li>
                                    @foreach($domSante as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="{{url('/domain/14')}}">Stress</a></li>
                                    <li class="divider"></li>
                                    @foreach($domStress as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="{{url('/domain/27')}}">Boire, fumer, se droguer</a></li>
                                    <li class="divider"></li>
                                    @foreach($domBoire as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="{{url('/domain/35')}}">Manger-bouger</a></li>
                                    <li class="divider"></li>
                                    @foreach($domManger as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>


                        </ul>

                    </li>


                    <!------------------------>
                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/moi.png') }}" alt="moi, les autres" class="imgNav"><p>Moi, toi,...<b class="caret"></b></p></a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="{{url('/domain/50')}}">Estime de soi</a></li>
                                    <li class="divider"></li>
                                    @foreach($domEstime as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Moi, toi et les autres</a></li>
                                    <li class="divider"></li>
                                    @foreach($domMoi as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/sexualite.png') }}" alt="Sexualité" class="imgNav"><p>Sexualité <b class="caret"></b></p></a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Sexualité</a></li>
                                    <li class="divider"></li>
                                    @foreach($domSex as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/violence.png') }}" alt="Violences" class="imgNav"><p>Violences <b class="caret"></b></p></a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Violence</a></li>
                                    <li class="divider"></li>
                                    @foreach($domViolences as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Discrimination et racismes</a></li>
                                    <li class="divider"></li>
                                    @foreach($domDiscrim as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/religion.png') }}" alt="Religions" class="imgNav"><p>Religions <b class="caret"></b></p></a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Religions</a></li>
                                    <li class="divider"></li>
                                    @foreach($domReligions as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown menu-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('assets/img/work.png') }}" alt="Avenir" class="imgNav"><p>Avenir<b class="caret"></b></p></a>
                        <ul class="dropdown-menu megamenu row">
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Argent</a></li>
                                    <li class="divider"></li>
                                    @foreach($domArgent as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach


                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul>
                                    <li class="dropdown-header titreMegaMenu"><a href="#">Formation et travail</a></li>
                                    <li class="divider"></li>
                                    @foreach($domFormations as $sub)
                                    <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>

                    </li>
                </ul>
                @if($userConnected)
                <ul class="nav navbar-nav navbar-right" id="deconnecter">
                    <li><a href="{{url('logout')}}"><img src="{{ asset('assets/img/deco.png') }}" alt="deco" class="imgNav">Déconnexion</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" id="compte">
                    <li><a href="{{url('/dashboard')}}"><img src="{{ asset('assets/img/compte.png') }}" alt="mon compte" class="imgNav">Compte</a></li>
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right" id="connecter">
                    <li><a class="login" data-toggle="modal" data-target="#login"><img src="{{ asset('assets/img/sign_in.png') }}" alt="login" class="imgNav">Connexion</a></li>
                </ul>
                @endif
            </div>
        </nav>
