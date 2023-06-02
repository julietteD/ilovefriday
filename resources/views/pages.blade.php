@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

<div class=""><a href="{{route('pages.new')}}" class="square_btn">Nouveau +</a></div>

    <ul class="pageslist">
@foreach($pages as $page)
<li class="">
 <h4>{{  $page['title'] }}</h4>
 <a class="action btn btn-info" href="{{ route('pages.edit', [ 'id' => $page->id ])}}">Edit</a>

<a class="delete" onclick="return warning()" href="{{ route('pages.delete', [ 'id' => $page['id']])}}">Delete x</a>

 <a href="{{ route('pages.item', [ 'id' => $page['slug']]) }}" target="_self" class="bubbleLinka">+</a>

</li>


@endforeach
</ul>
</div>
</main>

@endsection