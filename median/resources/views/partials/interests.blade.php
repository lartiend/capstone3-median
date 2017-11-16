<div class="container">
	<div class="row">
		<div class="col-12 col-sm-6 text-center">
			<p class="text-primary">Following</p>
			<div class="list-group">
				@foreach ($data2 as $follow)
						<a href='{{url("profile/$follow->author_id")}}' class="list-group-item list-group-item-action bg-primary text-white">
							{{App\User::where('id', $follow->author_id)->value('name')}}
						</a>
				@endforeach
			</div>
		</div>
		<div class="col-12 col-sm-6 text-center">
			<p class="text-success">Bookmarks</p>
			<div class="list-group">
				@foreach ($data as $bookmark)
						<a href='{{url("articles/$bookmark->article_id")}}' class="list-group-item list-group-item-action bg-success text-white">
							{{App\Article::where('id', $bookmark->article_id)->value('title')}}
						</a>
				@endforeach
			</div>
		</div>
	</div>
</div>