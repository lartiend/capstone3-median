
@extends('template')

@section('content')
<div class="container" id="wrapper">

	@if(session()->has('newsletter_message.level'))
	<div class="mx-auto alert alert-{{ session('newsletter_message.level') }}" style="width:300px;"> 
		<small>{!! session('newsletter_message.content') !!}</small>
	</div>
	@endif

	<div id="userArticleList" class="mb-3">
		<p class="font-weight-light" style="font-size: 2.2em; margin-bottom: 0">
			Your Recent Publications
			<small>
				<a href='{{url("profile/user_id")}}' class="text-secondary">
					<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;More
				</a>
			</small>
		</p>
		
		<div class="card-deck" style="margin: 1em 0 3em 0;">

			@if ($user_articles->count() < 1)
			<div class="card">
				<div class="card-body mx-auto">
					You have not published any post yet.
					<a href="articles/create" class="card-link text-info">Post an Article</a>
				</div>
			</div>
			@else 
			@foreach ($user_articles as $user_article)
			@include('partials.card', array('data'=>$user_article))
			@endforeach
			@endif

		</div>

		<hr width="50%">
	</div>

	<div id="TopRatedArticleList" class="mb-3">
		<p class="font-weight-light" style="font-size: 2.2em; margin-bottom: 0">
			Top Rated Articles
		</p>
		
		<div class="card-deck" style="margin: 1em 0 3em 0;">

			@if ($TopRatedArticleList->count() < 1)
			<div class="card">
				<div class="card-body mx-auto">
					You have not published any post yet.
					<a href="articles/create" class="card-link text-info">Post an Article</a>
				</div>
			</div>
			@else 
				@foreach ($TopRatedArticleList as $rated_article)
					@include('partials.card', array('data'=>$rated_article))
				@endforeach
			@endif

		</div>
		<hr width="50%">
	</div>

	<div id="interest" class="mb-3">
		<p class="font-weight-light" style="font-size: 2.2em; margin-bottom: 0">
			Interests
			<small>
				<a href='{{url("interests/".Auth::id())}}' class="text-secondary">
					<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;More
				</a>
			</small>
		</p>
		@include('partials.interests', array(
			'data'=>$bookmarks,
			'data2' => $follows
		))
	</div>

</div> {{-- #wrapper --}}
@endsection
