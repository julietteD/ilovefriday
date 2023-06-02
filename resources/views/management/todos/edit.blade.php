@extends('management.app')
@section('todotitle')
	<h3>Pages</h3>
	@if($todo) Editer  "{{$todo->title}}" @else Création @endif
@endsection

@section('content')




	<div class="bgc-white p-20 bd">
		
		<div class="mT-30">
			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('management.todos.edit.action')}}">

			<fieldset>
					<div class="form-group">
						<label class="">listid</label><br/>
<select name="listid">
						@foreach($daylistitems as $daylistitem)
				
					<option @if(!empty($todobyday->listid) AND $todobyday->listid==$daylistitem->id) selected @endif  value="{{ $daylistitem->id }}">{{ $daylistitem->title }}</option>
				@endforeach
			</select>

					</div>
				</fieldset>

				<fieldset>
					<div class="form-group">
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($todo->title)){{$todo->title}}@endif" >
					</div>
				
				
				</fieldset>



			

			

										
					@csrf

					<input type="hidden" name="id" value="@if(!empty($todo->id)){{$todo->id}}@endif"/>
					<button type="submit" class="btn btn-primary">Envoyer</button>
					
			</form>
		</div>
	</div>


@endsection

@section('scripts')				





@endsection
