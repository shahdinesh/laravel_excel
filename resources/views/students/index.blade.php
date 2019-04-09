@extends('layout')

@section('content')
	<h1 style="width: 60%;float: left;">List of Stduents</h1>
	<a href="<?= url('/students/import')?>" class="btn btn-warning" style="float: right;">Import</a>
	<hr>

	<table class="table">
		<thead>
			<tr>
				<th>S.N.</th>
				<th>Name</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Date of birth</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			@foreach($students as $student)
			<tr>
				<td> {{ $i++ }} </td>
				<td> {{ $student->name }} </td>
				<td> {{ $student->address }} </td>
				<td> {{ $student->phone }} </td>
				<td> {{ $student->dob }} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection