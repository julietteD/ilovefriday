@extends('templates.template')
@section('contenu')



<main>
	<h3>Daylistitems</h3>
	@if($daylistitem) Editer  "{{$daylistitem->title}}" @else Création @endif





	<div class="bgc-white p-20 bd">
		
		<div class="mT-30">
			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('daylistitems.edit.action')}}">

				

				<fieldset>
					<div class="form-group">
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($daylistitem->title)){{$daylistitem->title}}@endif" >
					</div>
				</fieldset>

				<fieldset>
					<div class="form-group">
						<label class="">Type</label>
						<input type="text" required class="form-control" name="type" value="@if(!empty($daylistitem->type)){{$daylistitem->type}}@endif" >
					</div>
				
			</fieldset>

				<fieldset>
					<div class="form-group">
						<label class="">Duration</label>
						<input type="text" required class="form-control" name="duration" value="@if(!empty($daylistitem->duration)){{$daylistitem->duration}}@endif" >
					</div>
				
			
				</fieldset>


				</fieldset>

<fieldset>
	<div class="form-group">
		<label class="">Order elt</label>
		<input type="text"  class="form-control" name="orderelt" value="@if(!empty($daylistitem->orderelt)){{$daylistitem->orderelt}}@endif" >
	</div>

	<div class="form-group">
		<label class="">Status</label>
		<input type="text"  class="form-control" name="status" value="@if(!empty($daylistitem->status)){{$daylistitem->status}}@endif" >
	</div>


	<div class="form-group">
		<label class="">Page id</label>
		<input type="text"  class="form-control" name="pageid" value="@if(!empty($daylistitem->pageid)){{$daylistitem->pageid}}@endif" >
	</div>


</fieldset>

			

			

										
					@csrf

					<input type="hidden" name="id" value="@if(!empty($daylistitem->id)){{$daylistitem->id}}@endif"/>
					<button type="submit" class="btn btn-primary">Envoyer</button>
					
			</form>
		</div>
	</div>


	</main>

@endsection