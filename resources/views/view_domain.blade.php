@extends('view_master')

@section('title', 'Domaine')

@section('content')

		<div class="container article">

			  	<div class="col-md-7 designBox">

            {!!$domain->content!!}
                    
			  	</div>


            <div class="col-md-offset-1 col-md-4">
                    
            <div class="row">
                      
                        
			  	@include('partials._moreInfos')
    
                @include('partials._moreDiscussion')
            
                @include('partials._moreOnTheme')
                        
            </div>
        </div>
     </div>
   

        @stop
