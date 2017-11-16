@extends('template')

@section('content')
<div class="container" id="wrapper">
	@if ($errors->any())
	<div class="alert alert-danger text-center">
		@foreach ($errors->all() as $error)<small>{{ $error }}</small>@endforeach
	</div>
		<form method="POST" action='{{url("articles")}}' enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="coverPhoto">Cover photo</label>
				<input type="file" class="form-control-file" id="coverPhoto" name="coverPhoto">
			</div>
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" value='{{ old('title') }}'>
			</div>
			<div class="form-group">
				<label for="content">Content:</label>
				<textarea class="form-control" id="article_content" name="content" rows="3" style="min-height: 500px;">{{ old('content') }}</textarea>
			</div>
			<button type="submit" class="btn btn-outline-primary">Publish</button>
			<a class="btn btn-warning text-dark" role="button" href='{{url("articles")}}' style="text-decoration: none; border-style: none;"><small>Cancel</small></a>
		</form>
	@else
		<form method="POST" action='{{url("articles")}}' enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<label for="coverPhoto">Cover photo</label>
				<input type="file" class="form-control-file" id="coverPhoto" name="coverPhoto">
			</div>
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="form-group">
				<label for="content">Content:</label>
				<textarea class="form-control" id="article_content" name="content" rows="3" style="min-height: 500px;"></textarea>
			</div>
			<button type="submit" class="btn btn-outline-primary">Publish</button>
			<a class="btn btn-warning text-dark" role="button" href='{{url("articles")}}' style="text-decoration: none; border-style: none;"><small>Cancel</small></a>
		</form>
	@endif
</div>
@endsection
