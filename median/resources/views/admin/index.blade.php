@extends('template')

@section('content')
<div class="container" id="wrapper">

	<br>
	<section id="admin_users">
		<h5 class="header-title text-primary">
			<span class="border-custom">&nbsp;Users</span>
			<a href="#admin_articles" role="button" class="btn text-white" style="background-color: DarkSalmon">Articles</a>
		</h5>
		
		<table class="table table-hover table-responsive-sm text-center ">
			<thead>
				<tr>
					<th scope="col">Role</th>
					<th scope="col">Fullname</th>
					<th scope="col">Email</th>
					<th scope="col" colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<th>{{$user->role_id}}</th>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a href='/profile/{{$user->id}}' role=button class="btn btn-sm btn-outline-info" style="font-size: 0.6rem">
							View
						</a>
					</td>
					<td>

						<form method="POST" class="form-horizontal" action='{{url("admin/user/$user->id")}}'>
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							{{-- fa-unlock --}}
							<input type="hidden" name="userID" value='{{$user->id}}'>
							@if (App\User::where('id', $user->id)->value('status') == 1)
							<button style="width: 50px; color: LimeGreen ; background-color: inherit; cursor: pointer;" type="submit" class="btn btn-sm btn-block" style="font-size: 0.6rem;">
								<i class='fa fa-unlock fa-1x' aria-hidden='true'></i>
							</button>
							@else
							<button style="width: 50px; color: DarkRed; background-color: inherit; cursor: pointer;" type="submit" class="btn btn-sm btn-block" style="font-size: 0.6rem;">
								<i class='fa fa-lock fa-1x' aria-hidden='true'></i>
							</button>
							@endif
						</form>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</section>
	<hr style="border-color: #999; width: 70%" class="my-5">
	<h5 class="header-title text-danger">
		<span class="border-custom" style="color: DarkSalmon">&nbsp;Articles</span>
		<a href="#admin_users" role="button" class="btn bg-primary text-white">Users</a>
	</h5>

	<section id="admin_articles">

			@foreach ($articles as $article)
			<div class="row">
				<div id="accordion" role="tablist" class="col-7 col-sm-9">
					<div class="card mb-1" id='article_card_{{$article->id}}' style="border-color: lightblue">
						<div class="card-header" role="tab" id='heading_{{$article->id}}' style="background-color: inherit; border-bottom: none;">
							<h5 class="mb-0">
								<div class="container">
									<div class="row">
										<div class="col-1">
											<a data-toggle="collapse" href='#collapse_{{$article->id}}' aria-expanded="true" aria-controls='collapse_{{$article->id}}'>
												<i class="fa fa-caret-down" aria-hidden="true"></i>
											</a>
										</div>
										<div class="col-11 text-truncate d-block">
											<a href='/articles/{{$article->id}}'>
												{{$article->title}}
											</a>
										</div> 
									</div>
								</div>
							</h5>
						</div>

						<div id='collapse_{{$article->id}}' class="collapse" role="tabpanel" aria-labelledby='heading_{{$article->id}}' data-parent="#accordion">
							<div class="card-body text-truncate">
								{{$article->content}}
							</div>
						</div>
					</div>
				</div>

				<div class="col-5 col-sm-3">

					<form method="POST" class="form-horizontal" action='{{url("admin/$article->id")}}' id="admin_delete_article">
					<input title="Delet this article" type="submit" class="btn btn-danger btn-block" value="Delete" onclick="myFunction()">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
					</form>
				</div>

			</div>
			@endforeach

	</section>

</div>
<script>
	function myFunction() {
		if (confirm("Deleting this article cannot be undone. Are you certain?") == true) {
			$('form#admin_delete_article').submit();
		} else {
        // do nothing
    }
}
</script>
@stop
