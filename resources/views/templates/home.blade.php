<div class="row">
	<div class="col-md-12" style="background-image: url({{ theme('images/Tulips.jpg') }}); background-size: 100%; background-repeat: no-repeat; height:320px;"></div>
</div>

<div class="row">  
	@foreach($posts as $post)
		<div class="col-md-4">
			<h2><a href="{{ route('blog.post', [$post->id, $post->slug])}}"> {{ $post->title }}</a></h2>

			<p>
			 Posted by {{$post->author->name }} on {{ $post->published_at}}
			</p>
			{!!  $post->present()->excerptHtml or $post->present()->bodyHtml !!}
		</div>
@endforeach
</div>
