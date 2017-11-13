@extends('layouts.backend')

@section('title', 'Delete '.$post->name)

@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['blog.destroy', $post->id]]) !!}

<div class="alert alert-danger"><strong>Warning!</strong>  You are about to delete a page. Are you sure you want to continue? </div>
{!! Form::submit('Yes, delete this Page!', ['class' => 'btn btn-danger']) !!}

<a href="{{ route('blog.index')}}" class="btn btn-success">
	<strong> NO!, get me out of here</strong>
</a>

{!!  Form::close() !!}
@endsection