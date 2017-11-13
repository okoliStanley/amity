@extends('layouts.backend')

@section('title', 'Delete '.$user->name)

@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['users.destroy', $user->id]]) !!}

<div class="alert alert-danger"><strong>Warning!</strong>  You are about to delete a user. Are you sure you want to continue? </div>
{!! Form::submit('Yes, delete this User!', ['class' => 'btn btn-danger']) !!}

<a href="{{ route('users.index')}}" class="btn btn-success">
	<strong> NO!, get me out of here</strong>
</a>

{!!  Form::close() !!}
@endsection