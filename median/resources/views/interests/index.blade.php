@extends('template')

@section('content')
<div class="container" id="wrapper">

<br>
<section id="bookmarkID">
	<h5 class="header-title text-primary">
		<span class="border-custom">&nbsp;Bookmarks</span>
		<a href="#followID" role="button" class="btn btn-success">Following</a>
	</h5>
	<div class="card-columns" >
		@foreach ($bookmarks as $bookmark)
			@php
				$article = App\Article::where('id', $bookmark->article_id)->first();
			@endphp
			<a href='{{url("articles/$article->id")}}'>
				<div class="card">
					<img class="card-img-top" src='../{{$article->image}}' alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">{{$article->title}}</h4>
						<p class="card-text text-truncate m-0">{{$article->content}}</p>
					</div>
				</div>
			</a>
		@endforeach
	</div>
</section>
<hr style="border-color: blue; width: 70%">
<section id="followID">
	<h5 class="header-title">
		<span class="border-custom">&nbsp;Following</span>
		<a href="#bookmarkID" role="button" class="btn btn-primary">Bookmarks</a>
	</h5>
	<div class="card-columns" >
		@foreach ($follows as $follow)
			@php
				$author = App\User::where('id', $follow->author_id)->first();
			@endphp
			<a href='{{url("profile/$author->id")}}'>
				<div class="card">
					<div class="card-body">
						<p class="card-text text-truncate m-0">{{$author->name}}</p>
					</div>
				</div>
			</a>
		@endforeach
	</div>
</section>
<hr style="border-color: green; width: 70%">
</div>
@stop
