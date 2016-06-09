@extends('view_master')

@section('title', $domain->name)

@section('content')

		<div class="container article">

			  	<div class="col-md-7 designBox">

            {{$domain->content}}

			  	</div>


			  	<div class="col-md-offset-1 col-md-4 designBox sideBox">
			  	@include('partials._moreInfos')
			  	</div>

			  	@include('partials._moreDiscussion')

			  	<div class="col-md-offset-1 col-md-4 designBox sideBox">
			  	@include('partials._moreOnTheme')

			  	</div>

        </div>

        @stop
