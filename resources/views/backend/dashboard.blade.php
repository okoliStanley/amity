@extends('layouts.backend')


@section('title', 'Dashboard')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<ul class="list-group">
				@foreach($posts as $post)
					<li class="list-group-item">
						<h4>
							<a href="#">{{ $post->title }}</a>
							<a href="{{ route('blog.edit', $post->id)}}" class="pull-right">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</h4>
					{!! $post->present()->excerptHtml !!}

					</li>
				@endforeach
			</ul>
		</div>
		<div class="col-md-6">
			<ul class="list-group">
				@foreach($users as $user)
					<li class="list-group-item">
						<h4> {{ $user->name }} </h4>
					 Last Login {{ $user->present()->LastLoginDiff }}

					</li>
				@endforeach
			</ul>

		</div>
	</div>
@endsection