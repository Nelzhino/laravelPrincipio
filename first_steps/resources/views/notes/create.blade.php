@extends('layout')

@section('content')
	<h1>Create a note</h1>
	@include('partials/errors')
	<form method="POST" action="{{ url('notes')}}">
		{!! csrf_field() !!}

		<div class="form-group">
  			<label for="comment">Comment:</label>
  			<textarea class="form-control" rows="5" name="note" placeholder="Write your note.. ">{{old('note')}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Create note</button>
	</form>

@endsection