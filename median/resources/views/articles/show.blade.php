@extends('template')

@section('content')
<div class="container" id="wrapper">
	<section class="container" id="update_info">
		@if(session()->has('flash_message.level'))
			<div class="text-center alert alert-{{ session('flash_message.level') }}" style="width:auto;">
				<small>{!! session('flash_message.content') !!}</small>
			</div>
		@endif

		@if ($errors->any())
			<div class="alert alert-danger text-center">
				@foreach ($errors->all() as $error)<small>{{ $error }}</small>@endforeach
			</div>
		@endif
		
		@if(!is_null(Auth::user()) && $article->user_id == Auth::user()->id)
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-4 text-center">
						<form method="POST" action='{{url("articles/$article->id")}}' class="d-inline-block">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" class="btn btn-danger" value="Delete">
						</form>
						<a href='{{url("articles/$article->id/edit")}}' class="btn btn-primary">Update</a>
					</div>
					<div class="col-12 col-sm-8">
						<table class="table table-striped text-center">
							<thead>
								<tr>
									<th scope="col">Rate</th>
									<th scope="col">Date created</th>
									<th scope="col">Date updated</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$article->rate}}</td>
									<td>{{$article->created_at->format('Y.m.d')}}</td>
									<td>{{$article->updated_at->format('Y.m.d')}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@endif
	</section>
	<section class="container" id="article">
		<h1 class="text-center">{{$article->title}}</h1>
		<p>
			<img src='{{ asset($article->image) }}' class="rounded mx-auto d-block img-fluid" alt="article_img">
		</p>
		<div class="content text-justify">
			{!! nl2br($article->content) !!}
		</div><br>
		<div class="tags">
			@foreach($article->getTags as $tag)
				<a href='{{ url("/tags/$tag->id")}}' style="text-decoration: none; margin-bottom: 2.5em; display: inline-block;">
					<small id="tags">{{ $tag->name}}</small>
				</a>
			@endforeach
			@if(!is_null(Auth::user()) && $article->user_id == Auth::user()->id)
				<form method="POST" class="form-horizontal" action='{{url("articles/$article->id/tags")}}'>
					{{csrf_field()}}
					<div class="form-group"><br>
						<label class="control-label" for="comment">Add tags:
							<small id="tagsHelp" class="form-text text-muted font-weight-light font-italic">
								Separate each tag with a comma and without spaces.
							</small>
						</label>
						<div>
							<textarea type="text" class="form-control" name="tag_names" id="tag_names" style="width: 60%"></textarea>
						</div>
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
				</form>
			@endif
		</div>
		<br>
		<div class="text-center">
			<form id="rate" class="form-inline d-inline" method="POST" action='{{url("/articles/$article->id/rate")}}'>
				{{csrf_field()}}
				<input type="hidden" name="articleID" value='{{$article->id}}'>
				<button type="submit" style="border: none; background-color: inherit;cursor:pointer;">
					<i class="fa-2x fa fa-fw fa-star text-warning" aria-hidden="true"></i>
				</button>
			</form>
			<form class="form-inline d-inline" method="post" action='{{url("bookmarks")}}'>
				{{csrf_field()}}
				<input type="hidden" name="articleID" value='{{$article->id}}'>
				<button type="submit" style="border: none; background-color: inherit;cursor:pointer;">
					@if(
						App\Bookmark::where('article_id', $article->id)
						->where('user_id', Auth::user()->id)->exists() == true 
						)
						<i class="fa-2x fa fa-fw fa-bookmark text-success" aria-hidden="true"></i>
						@else
						<i class="fa-2x fa fa-fw fa-bookmark-o text-success" aria-hidden="true"></i>
						@endif
					</button>
				</form>
			</div>
		<hr width="65%">
		<br>
		<div class="row">
			<div class="author col-12 col-sm-6 text-center">
				<p>
					<a href='/profile/{{$article->getUser->id}}' role="button" class="btn btn-outline-info">
						{{$article->getUser->name}}
					</a>
				</p>
				<p>
					{{$article->getUser->email}}
				</p>
				<p>
					<form class="form-inline d-inline" method="post" action='{{url("/follows")}}'>
						{{csrf_field()}}
						<input type="hidden" name="userID" value='{{$article->user_id}}'>
						<input type="hidden" name="articleID" value='{{$article->id}}'>
						<button type="submit" class="btn btn-outline-success" style="cursor:pointer;"
							@if(!is_null(Auth::user()) && $article->user_id == Auth::user()->id)
								{{'disabled'}}
							@endif
						>
							@if (App\Follow::where('author_id', $article->user_id)
								->where('user_id', Auth::user()
								->id)->exists() == true )
								Following
							@else Follow
							@endif
						</button>
					</form>
				</p>
			</div>
			<div id="related-articles" class="col-12 col-sm-6 p-3">
				@if( App\Article::where('user_id', $article->user_id)->count() > 1 )
						<h5 class="text-center">See more related articles</h5>
						@include('partials.show_all', array('data'=>$article))
				@else
					<h4>{{$article->getUser->name}} has no other post...</h4>
				@endif
			</div>
		</div>
	</section>
</div> {{-- #wrapper --}}
<section class="comments-container p-2" style="background-color: #EFEFFF;min-height: 200px;">
	<div id="comments" class="container">
		<div class="mx-auto">
			<form method="POST" class="form-horizontal" action='{{url("articles/$article->id/comments")}}'>
				{{csrf_field()}}
				<div class="form-group"><br>
					<label class="control-label" for="comment">Share your thoughts
					</label>
					<div>
						<textarea type="text" class="form-control" name="comment" id="comment" style="background-color: #fff; border-radius: 0.1rem">{{ old('comment') }}</textarea>
					</div>
					<button type="submit" class="btn btn-outline-info" style="padding: 0.5em;border-radius: 0.1rem">Share</button>
				</div>
			</form>
			<button id="seeResponsesBtn" type="button" class="btn btn-outline-primary font-weight-light" style="width: 100%; font-size: 0.84em">
				<span class="badge badge-light badge-pill" style="color: blue">{{$article->descComments->count()}}</span>
				- See responses
				<i class="fa fa-commenting-o" aria-hidden="true"></i>
			</button>
			<div id="seeResponses" style="display:none; margin-top: 5px;">
				@foreach($article->descComments as $comment)
					<div class="row">
						<div class="col-1">
							<i class="fa-3x fa fa-quote-left" aria-hidden="true"></i>
						</div>
						<div class="col-11">
							<div class="card mb-1" style="background-color: inherit; border: none;">
								<div class="card-body">
									{!! nl2br($comment->description) !!}<br>
									<small class="text-muted font-italic">
										{{ $comment->getUser->name }} -- {{$comment->updated_at->diffForHumans()}}
									</small>
									<br>
									@if(!is_null(Auth::user()) && $comment->getUser->id == Auth::user()->id)
										<form method="POST" action='{{url("articles/$article->id/comments/$comment->id")}}' class="d-inline-block">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<input type="submit" class="btn btn-danger" value="Delete">
										</form>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endsection
