@extends('layouts.backend')

@section('title', $page->exists ? 'Editing '.$page->title : 'Create new page')

@section('content')

{!! Form::model($page, [
	'method' => $page->exists ? 'put' : 'post',
	'route' => $page->exists ? ['pages.update', $page->id] : ['pages.store']

	]) !!}

<div class="form-group">
	{!! Form::label('title') !!}
	{!! FORM::text('title', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('uri', 'URI') !!}
	{!! FORM::text('uri', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('name') !!}
	{!! FORM::text('name', null, ['class'=> 'form-control']) !!}
	<p class="help-block"> This name is used to generate links to the page </p>
</div>

<div class="form-group row">
	<div class="col-md-12"> {!! Form::label('template') !!}</div>
	<div class="col-md-4"> {!! Form::select('template', $templates, null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group row">
	<div class="col-md-12">{!! Form::label('order') !!}</div>
	<div class="col-md-2">{!! Form::select('order', [
		''=> '',
		'before' => 'Before',
		'after' => 'After',
		'childOf' => 'Child Of'
	], null, ['class' => 'form-control']) !!}</div>
	<div class="col-md-5"> {!! Form::select('orderPage', ['' => ''] 
		+ $orderPages->pluck('title', 'id')->toArray(), null, ['class' => 'form-control']) !!}</div>
</div>

<div class="form-group">
	{!! Form::label('content') !!}
	{!! FORM::textarea('content', null, ['class'=> 'form-control']) !!}
</div>
	<div class="checkbox">
		<label>
		{!! Form::checkbox('hidden') !!}
			Hide Page from navigation

			<span class="help-block"> checking this will hide the page from navigation. can only be applied to pages without children  </span>
		</label>

	</div>
{!! Form::submit($page->exists ? 'Save Page' : 'Create new page', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

<script>
	new SimpleMDE().render();
	</script>
@endsection