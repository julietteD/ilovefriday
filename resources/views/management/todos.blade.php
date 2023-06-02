@extends('management.app')

@section('todotitle')
	<h3>Todos</h3>
@endsection

@section('content')
	<div class="addLine"><a href="{{route('management.todos.new')}}" class="btn cur-p btn-success">Nouveau +</a></div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Titre</th>
				
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($todos as $todo)
				<tr>
					<td>{{ $todo->title }}</td>
				
				

					<td class="mainActions">
						<a class="action btn btn-info" href="{{ route('management.todos.edit', [ 'id' => $todo->id ])}}">Edit</a>
						<a class="action btn btn-danger delete" onclick="return warning()" href="{{ route('management.todos.delete', [ 'id' => $todo['id']])}}">Delete</a>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>


@endsection
