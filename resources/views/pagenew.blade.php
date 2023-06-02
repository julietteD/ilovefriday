@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('pages.edit.action')}}">

	
				
<div class="formLine">	
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($page->title)){{$page->title}}@endif" >
				
</div>	

				
<div class="formLine">	

				
						<label>Contenu</label>
						<textarea class="summernote form-control" name="body">
							@if(!empty($page->body)){{$page->body}}@endif
						</textarea>
				
			
					
		
</div>	
										
					@csrf

					<input type="hidden" name="id" value="@if(!empty($page->id)){{$page->id}}@endif"/>
					<button type="submit" class="square_btn">Envoyer</button>
					
			</form>
	
</div>
</main>

@endsection