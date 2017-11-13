@extends('layouts.backend')

@section('title', 'Delete '.$page->name)

@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['pages.destroy', $page->id]]) !!}

<div class="alert alert-danger"><strong>Warning!</strong>  You are about to delete a page. Are you sure you want to continue? </div>
{!! Form::submit('Yes, delete this Page!', ['class' => 'btn btn-danger']) !!}

<a href="{{ route('pages.index')}}" class="btn btn-success">
	<strong> NO!, get me out of here</strong>
</a>

{!!  Form::close() !!}
@endsection