
@extends('template')

@section('content')
<div class="container" id="wrapper">

	
<section class="my-3 pt-3">
	<a href={{ url()->previous() }} role="button" class="btn btn-default">Go back</a>
	<br>
	<h5 class="header-title text-primary pt-3">
		<span class="border-custom">&nbsp;Tags - <span style="color:black">{{strtoupper(App\Tag::where('id', $tag)->first()->name)}}</span></span>
	</h5>
	<div class="card-columns">
		@foreach ($articles as $raw_article)
			@php
				$article = App\Article::where('id', $raw_article->article_id)->get();
				$article = $article->first();
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

</div>
@endsection