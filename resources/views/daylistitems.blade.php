@extends('templates.template')
@section('contenu')



<main>
	<div class="addLine"><a href="{{route('daylistitems.new')}}" class="btn cur-p btn-success">Nouveau +</a></div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Titre</th>
				
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($daylistitems as $daylistitem)
				<tr>
					<td>{{ $daylistitem->title }}</td>
				
				

					<td class="mainActions">
						<a class="action btn btn-info" href="{{ route('daylistitems.edit', [ 'id' => $daylistitem->id ])}}">Edit</a>
						<a class="action btn btn-danger delete" onclick="return warning()" href="{{ route('daylistitems.delete', [ 'id' => $daylistitem['id']])}}">Delete</a>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>




	</main>

@endsection
