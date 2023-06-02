@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

			<form id="editForm" enctype="multipart/form-data" method="POST" action="{{route('accountLines.edit.action')}}">

	
			

				
<div class="formLine">	
						<label class="">Titre</label>
						<input type="text" required class="form-control" name="title" value="@if(!empty($account->title)){{$account->title}}@endif" >
				
</div>
<div class="formLine">	
						<label class="">Titre alt</label>
						<input type="text"  class="form-control" name="titlealt" value="@if(!empty($account->titlealt)){{$account->titlealt}}@endif" >
				
</div>
<div class="formLine">	
						<label class="">Date</label>
						<input type="text" required class="form-control" name="datedep" value="@if(!empty($account->datedep)){{$account->datedep}}@endif" >
				
</div>	
<div class="formLine">	
						<label class="">Comment</label>
						<input type="text"  class="form-control" name="comments" value="@if(!empty($account->comments)){{$account->comments}}@endif" >
				
</div>

<div class="formLine">	
						<label class="">Montant</label>
						<input type="text"  class="form-control" name="amount" value="@if(!empty($account->amount)){{$account->amount}}@endif" >
				
</div>




<div class="formLine">	
						<label class="">Type</label>
						<div class="select"><select name="type">
					
				
					<option @if(!empty($account->type) AND $account->type=="energie") selected @endif  value="energie">Energie</option>
					<option @if(!empty($account->type) AND $account->type=="restaurants") selected @endif  value="restaurants">Restaurants sorties</option>
					<option @if(!empty($account->type) AND $account->type=="enfants") selected @endif  value="enfants">Enfants</option>
					<option @if(!empty($account->type) AND $account->type=="nourriture") selected @endif  value="nourriture">Nourriture</option>
					<option @if(!empty($account->type) AND $account->type=="emprunt") selected @endif  value="emprunt">Emprunt</option>
					<option @if(!empty($account->type) AND $account->type=="voiture") selected @endif  value="voiture">Voiture</option>
					<option @if(!empty($account->type) AND $account->type=="maison") selected @endif  value="maison">Maison</option>
					<option @if(!empty($account->type) AND $account->type=="loisirs") selected @endif  value="loisirs">loisirs</option>
					<option @if(!empty($account->type) AND $account->type=="autre") selected @endif  value="autre">autre</option>

			</select>		
</div></div>
										
					@csrf

				<div class="formLineSubmit">	<input type="hidden" name="id" value="@if(!empty($account->id)){{$account->id}}@endif"/>
					<button type="submit" class="square_btn">Envoyer</button>
</div>
					
			</form>
	
</div>
</main>

@endsection