@php
	$articles = DB::table('articles')->where('user_id', $article->user_id)->limit(3)->get();
@endphp

<div class="list-group">
	@foreach ($articles as $user_article)
		@if ($article->id != $user_article->id)
			<a href='{{"$user_article->id"}}' class="list-group-item list-group-item-action">{{$user_article->title}}</a>
		@endif
	@endforeach
</div>
