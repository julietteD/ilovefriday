@extends('templates.template')
@section('contenu')

<main>
<div class="wrapper">


       
  <div class="fromWYSIWYG"> 
  <h1>{{ $page['title'] }}</h1>
  {!! $page['body'] !!}</div>
  </div>

</main>

@endsection

