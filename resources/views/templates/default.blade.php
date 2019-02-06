<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title> @yield('title', env('APP_NAME')) </title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	{{-- favicons --}}
	@include("templates.partials.favicons") 
	@yield("head")

	<script>
		window.AlleyCat = {!! json_encode([
			'url'       	=> url('/'),
		]) !!}
	</script>
</head>

<body>
	
	{{-- Dynamic content --}}
	@hasSection("content")
	<div id="alley-app" class="@yield('page')">
		@yield('content')
	</div>
	@endif

	{{-- Main scripts, vendor dependencies and manifest --}} 
	@yield('scripts')

	<script src="{{ asset('/js/manifest.js') }}" defer></script>
	<script src="{{ asset('/js/vendor.js') }}" defer></script>
	<script type="text/javascript" src="{{ asset('/js/app.js') }}" defer></script>
</body>
</html>