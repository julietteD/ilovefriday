@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('todos.edit.action')}}">

	
				<div class="formLine">
						<label class="">Liste</label>
			<div class="select"><select name="listid">
						@foreach($daylistitems as $daylistitem)
				
					<option @if(!empty($todo->listid) AND $todo->listid==$daylistitem->id) selected @endif  value="{{ $daylistitem->id }}">{{ $daylistitem->title }}</option>
				@endforeach
			</select></div>
</div>
				
<div class="formLine">	
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($todo->title)){{$todo->title}}@endif" >
				
</div>	
										
					@csrf

					<input type="hidden" name="id" value="@if(!empty($todo->id)){{$todo->id}}@endif"/>
					<button type="submit" class="square_btn">Envoyer</button>
					
			</form>
	
</div>
</main>

@endsection