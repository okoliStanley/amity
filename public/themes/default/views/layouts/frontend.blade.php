<! doctype html>


<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') &mdash; Amity</title>
	<link rel="stylesheet" href=" {{ theme('css/frontend.css')}}" type="text/css">
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header"><a href="/" class="navbar-brand">
					<span>A<span class="mity">MITY</span></span>
				</a></div>
		
			<ul class="nav navbar-nav">
				@include('partials.navigation')
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">@yield('content')</div>
		</div>
	</div>
</body>
</html>