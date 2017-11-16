@extends('template')

@section('content')
<div class="container" id="wrapper" style="width: 50%">
	<section style="padding-top: 1%;">
		<form method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="checkbox" value="name">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">Name</span>
				</label>
				<label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" name="checkbox" value="tag">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">Tag</span>
				</label>
			</div>
			<div class="form-group row">
				<div class="my-1" style="width: 100%">
					<input type="text" class="form-control" id="search" name="search" placeholder="Search keywords...">
				</div>
				<button type="submit" class="btn btn-info">Lookup</button>
			</div>
		</form>
	</section>

	@yield('itemResults')
</div>
@stop