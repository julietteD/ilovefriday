@extends('management.app')

@section('todobydaytitle')
	<h3>Daylistitems</h3>
@endsection

@section('content')
	<div class="addLine"><a href="{{route('management.todobydays.new')}}" class="btn cur-p btn-success">Nouveau +</a></div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Titre</th>
				
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($todobydays as $todobyday)
				<tr>
					<td>{{ $todobyday->title }}</td>
				
				

					<td class="mainActions">
						<a class="action btn btn-info" href="{{ route('management.todobydays.edit', [ 'id' => $todobyday->id ])}}">Edit</a>
						<a class="action btn btn-danger delete" onclick="return warning()" href="{{ route('management.todobydays.delete', [ 'id' => $todobyday['id']])}}">Delete</a>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>


@endsection
