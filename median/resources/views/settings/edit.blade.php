@extends('template')

@section('content')
<div class="container user-info" id="wrapper" style="padding-top: 7%">

	<section class="container" id="profileUpdate">
		@if ($errors->any())
		<div class="alert alert-danger text-center">
			@foreach ($errors->all() as $error)
			<small>{{ $error }}</small><br>
			@endforeach
		</div>
		@endif

		@if(session()->has('flash_message.level'))
		<div class="text-center alert alert-{{ session('flash_message.level') }}" style="width:auto;">
			<small>{!! session('flash_message.content') !!}</small>
		</div>
		@endif

		<form method="POST" class="form-horizontal" action='{{url("settings/$id")}}'>
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="fullname">Name</label>

				<input type="text" class="form-control" name="name" id="fullname" placeholder="Fullname" value='{{ Auth::user()->name }}'>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" placeholder="Username" value='{{ Auth::user()->username }}'>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" value='{{ Auth::user()->email }}'>
			</div>
			<div class="form-group">
				<label for="pass1">Password</label>
				<input type="password" class="form-control" name="password" id="pass1" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="pass2">Confirm Password</label>
				<input type="password" class="form-control" name="password2" id="pass2" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-info btn-block">Save</button>
		</form>

	</section>

	<section class="container">
		<input title="Temporarily disable account" type="submit" class="btn btn-danger btn-block" value="Deactivate" onclick="myFunction()">
		
		<form method="POST" class="form-horizontal" action='{{url("settings/$id")}}' id="deactivate_form">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
		</form>
	</section>

</div>

<script>
function myFunction() {
    if (confirm("Are you sure you want to deactivate your account?") == true) {
        $('form#deactivate_form').submit();
    } else {
        // do nothing
    }
}
</script>

@endsection
