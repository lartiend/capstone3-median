@extends('template')

@section('content')
<div class="container" id="wrapper">
	<section style="padding-top: 1%;">
		@if($user->status == 2)
		<div class="card text-white mb-3 text-center mx-auto" style="max-width: 20rem; background-color: #ff6f6f;">
			<div class="card-header">This account is not active</div>
		</div>
		@endif
		<p class="text-center">
			{{$user->username}} |
			{{$user->name}} |
			{{$user->email}}

			@if(!is_null($articles->first()))
			<form class="" method="post" action='{{url("/profile/$user->id/follows")}}' >
				{{csrf_field()}}
				<input type="hidden" name="userID" value='{{$articles->first()->user_id}}'>
				<input type="hidden" name="articleID" value='{{$articles->first()->id}}'>
				<button type="submit" class="btn btn-outline-primary text-center mx-auto d-block" style="cursor:pointer;"
				@if(!is_null(Auth::user()) && $articles->first()->user_id == Auth::user()->id)
				{{'disabled'}}
				@endif
				>
				@if (App\Follow::where('author_id', $articles->first()->user_id)
					->where('user_id', Auth::user()
					->id)->exists() == true )
					Following
					@else Follow
					@endif
				</button>
			</form>
			@endif

			<div>
				<a style="width: 120px;" href='{{url("/interests/$user->id")}}' role="button" class="btn btn-success mx-auto d-block text-center">
					Interests
				</a>
			</div>
		</p>

		<div class="card-columns" >
			@foreach ($articles as $article)
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
@stop
