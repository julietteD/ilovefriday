@extends('templates.template')
@section('contenu')


{{ Auth::user()->type }}
<div class="bigDashboardTitle" style="text-align:center"><h1>Hi!</h1></div>
@endsection

