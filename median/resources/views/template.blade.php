<!-- Template inspired by: https://blackrockdigital.github.io/startbootstrap-clean-blog/ -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Medium Community Blog Laravel">
    <meta name="author" content="Lester Jan Kim Artienda">

    <title>{{ config('app.name', 'Median') }}</title>
    @include('partials.styles')
</head>
<body>

@include('partials.nav')
<div id="content">
	@yield('content')
</div>
@include('partials.footer')
@include('partials.scripts')
</body>
</html>
