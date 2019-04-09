@extends('layout')

@section('content')
	<h1>Import Student</h1>
	<hr>
	<form method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="excel">
		<br><br>
		<input type="submit" name="Save" value="save">
	</form>

@endsection