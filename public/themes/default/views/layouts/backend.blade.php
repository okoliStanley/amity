<! doctype html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="{{ theme('css/backend.css') }}" type="text/css" rel="stylesheet"/>
			<script src="{{ theme('js/all.js')}}" type="text/javascript"></script>
			<title> @yield('title') &mdash; Amity</title>	
		</head>

		<body>
			<nav class="navbar navbar-static-top navbar-inverse">
				<div class="container">
					<div class="navbar-header"><a href="/" class="navbar-brand">Amity</a></div>
					<ul class="nav navbar-nav">
						<li><a href="{{ route('backend.dashboard')}}"> Dashboard </a></li>
						<li><a href="{{ route('users.index')}}"> Users </a></li>
						<li><a href="{{route('pages.index')}}"> Pages </a></li>
						<li><a href="{{route('blog.index')}}">Blogs</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><span class="navbar-text">Hello, {{ Auth::guest() ? 'Guest' :  $admin->name }}</span></li>
						<li> <a href="{{Route('auth.logout')}}">Logout</a> </li>
					</ul>
				</div>
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>@yield('title')</h3>
						
						@if($errors->any())
							<div class="alert alert-danger">
								<strong> We found Some Errors!!!</strong>
								<ul>
									@foreach($errors->all() as $error)
									<li> {{ $error }} </li>
									@endforeach
								</ul>
							</div>

						@endif
						@if($status) 
						<div class="alert alert-info">
							{{  $status }}
						</div>
					
						@endif
						
						@yield('content')
					</div>
				</div>
			</div>
		</body>
	</html>