@extends('layouts.backend')

@section('title', $user->exists ? 'Editing '.$user->name : 'Create New User')

@section('content')
	{!! Form::model($user, [
		'method' => $user->exists ? 'Put' : 'Post',
		'route' => $user->exists ? ['users.update', $user->id] : ['users.store']
	]) !!}

	<div class="form-group">
		{!! Form::label('name') !!}

		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email') !!}

		{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password') !!}

		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password_confirmation') !!}

		{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
	</div>

		{!! Form::submit($user->exists ? 'Save User' : 'Create new User', ['class'=> 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection