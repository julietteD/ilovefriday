@extends('management.app')

@section('pagetitle')
	<h3>Pages</h3>
@endsection

@section('content')
	<div class="addLine"><a href="{{route('management.pages.new')}}" class="btn cur-p btn-success">Nouveau +</a></div>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Titre</th>
				
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->title }}</td>
				
				

					<td class="mainActions">
						<a class="action btn btn-info" href="{{ route('management.pages.edit', [ 'id' => $page->id ])}}">Edit</a>
						<a class="action btn btn-danger delete" onclick="return warning()" href="{{ route('management.pages.delete', [ 'id' => $page['id']])}}">Delete</a>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>


@endsection
