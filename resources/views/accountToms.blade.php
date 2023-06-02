@extends('templates.template')
@section('contenu')
<main>
<div class="wrapper">
<div class=""><a href="{{route('accountToms.new')}}" class="square_btn">Nouveau +</a></div>


<ul class="todolist" style="margin:40px 0 0 0">
    
  <?php   
 $sum=0;
    foreach($accountToms as $accountTom) {
       
       $sum += intval($accountTom->amount);
  
    
   ?>
   <li>



<h4 style="width: 50%"><b>{{  $accountTom['dateexpense'] }} | {{  $accountTom['title'] }} </b></h4> 
<b  style="width: 30%; padding-right: 20px">{{  $accountTom['amount'] }} €</b>
 
<div class="actions" style="width: 20%">
<a class="action btn btn-info" href="{{ route('accountToms.edit', [ 'id' => $accountTom->id ])}}">Edit</a>

<a class="delete" onclick="return warning()" href="{{ route('accountToms.delete', [ 'id' => $accountTom['id']])}}">Delete x</a></div>

</li>
  
<?php
}
    ?>
    


</ul>

<strong style="font-size:30px; margin-top: 30px; display:block; text-align:right">TOTAL = <?php   echo $sum; ?>€</b></strong>
</div>
</main>
@endsection