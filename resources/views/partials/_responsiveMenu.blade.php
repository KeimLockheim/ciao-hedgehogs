<div id="wrapper">

  <input type="checkbox" id="menu" name="menu" class="menu-checkbox">
  <div class="menu">
    <label class="menu-toggle" for="menu"><span>&#xe9bd</span></label>
    <ul>
            <li>
              <label for="menu-3-2">Santé</label>
              <input type="checkbox" id="menu-3-2" name="menu-3-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-3-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-3-2-3">Santé</label>
                    <input type="checkbox" id="menu-3-2-3" name="menu-3-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-3-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domSante as $sub)
                            <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                    <label for="menu-3-2-3">Stress</label>
                    <input type="checkbox" id="menu-3-2-3" name="menu-3-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-3-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domStress as $sub)
                          <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                    <label for="menu-3-2-3">Boire, fumer, se droguer</label>
                    <input type="checkbox" id="menu-3-2-3" name="menu-3-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-3-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domBoire as $sub)
                          <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                    <label for="menu-3-2-3">Manger-bouger</label>
                    <input type="checkbox" id="menu-3-2-3" name="menu-3-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-3-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domManger as $sub)
                          <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                  </li>
                </ul>
              </div>
            </li>

            <li>
              <label for="menu-4-2">Moi, toi,..</label>
              <input type="checkbox" id="menu-4-2" name="menu-4-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-4-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-4-2-3">Estime de soi</label>
                    <input type="checkbox" id="menu-4-2-3" name="menu-4-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-4-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domEstime as $sub)
                            <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                    <label for="menu-4-2-3">Moi, toi et les autres</label>
                    <input type="checkbox" id="menu-4-2-3" name="menu-4-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-4-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domMoi as $sub)
                            <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <label for="menu-5-2">Sexualité</label>
              <input type="checkbox" id="menu-5-2" name="menu-5-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-5-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-5-2-3">Sexualité</label>
                    <input type="checkbox" id="menu-5-2-3" name="menu-5-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-5-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domSex as $sub)
                           <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <label for="menu-6-2">Violences</label>
              <input type="checkbox" id="menu-6-2" name="menu-6-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-6-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-5-2-3">Violences</label>
                    <input type="checkbox" id="menu-6-2-3" name="menu-6-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-6-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domViolences as $sub)
                          <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <label for="menu-6-2-3">Discrimination et racismes</label>
                    <input type="checkbox" id="menu-6-2-3" name="menu-6-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-6-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domDiscrim as $sub)
                            <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <label for="menu-3-2">Religion</label>
              <input type="checkbox" id="menu-7-2" name="menu-7-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-7-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-3-2-3">Religions</label>
                    <input type="checkbox" id="menu-7-2-3" name="menu-7-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-7-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domReligions as $sub)
                       <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                         @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <label for="menu-8-2">Avenir</label>
              <input type="checkbox" id="menu-8-2" name="menu-8-2" class="menu-checkbox">
              <div class="menu">
                <label class="menu-toggle" for="menu-8-2"><span>Toggle</span></label>
                <ul>
                  <li>
                    <label for="menu-8-2-3">Argent</label>
                    <input type="checkbox" id="menu-8-2-3" name="menu-8-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-8-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domArgent as $sub)
                            <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <label for="menu-8-2-3">Formation et travail</label>
                    <input type="checkbox" id="menu-8-2-3" name="menu-8-2-3" class="menu-checkbox">
                    <div class="menu">
                      <label class="menu-toggle" for="menu-8-2-3"><span>Toggle</span></label>
                      <ul>
                        @foreach($domFormations as $sub)
                          <li><a href="{{url('/domain/'.$sub->id)}}">{{$sub->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
