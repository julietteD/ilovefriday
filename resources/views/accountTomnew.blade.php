@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('accountToms.edit.action')}}">

	
			

				
<div class="formLine">	
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($accountTom->title)){{$accountTom->title}}@endif" >
				
</div>

<div class="formLine">	
						<label class="">Date</label>
						<input type="date" required class="form-control" name="dateexpense" value="@if(!empty($accountTom->dateexpense)){{$accountTom->dateexpense}}@endif" >
				
</div>	
<div class="formLine">	
						<label class="">Amount</label>
						<input type="text"  class="form-control" name="amount" value="@if(!empty($accountTom->amount)){{$accountTom->amount}}@endif" >
				
</div>

										
					@csrf

				<div class="formLineSubmit">	<input type="hidden" name="id" value="@if(!empty($accountTom->id)){{$accountTom->id}}@endif"/>
					<button type="submit" class="square_btn">Envoyer</button>
</div>
					
			</form>
	
</div>
</main>

@endsection