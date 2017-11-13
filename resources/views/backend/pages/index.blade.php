@extends('layouts.backend')

@section('title', 'pages')

@section('content')
<a href="{{ route('pages.create')}}" class="btn btn-primary"> CREATE NEW PAGES</a>
<table class="table table-hover">
	<thead>
		<tr>
			<td>Title</td>
			<td>URI</td>
			<td> Name</td>
			<td>Template </td>
			<td> Edit</td>
			<td>Delete</td>
		</tr>
	</thead>
	<tbody> 
		@if($pages->isEmpty())
			<tr>
				<td colspan="5" align="center"> There are No pages!! </td>
			</tr>
		@else
				@foreach($pages as $page)
					<tr class="{{ $page->hidden ? 'warning' : ''}}">
						<td>{!! $page->present()->linkToPaddedTitle(route('pages.edit', $page->id)) !!} </td>
						<td><a href="{{ url($page->uri) }}"> {{ $page->present()->prettyUri }} </a></td>
						<td> {{ $page->name or 'None' }} </td>
						<td>{{ $page->template or 'None'}}</td>
						<td><a href="{{ route('pages.edit', $page->id) }}">
							<span class="glyphicon glyphicon-edit"></span></a></td>
						<td><a href="{{ route('backend.pages.confirm', $page->id)}} ">
							<span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
				@endforeach
		@endif

	</tbody>
</table>

@endsection