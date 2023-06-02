@extends('templates.template')
@section('contenu')



<main>
<div class="wrapper">

<div class=""><a href="{{route('todos.new')}}" class="square_btn">Nouveau +</a></div>

<ul class="todolist">
        
    @foreach($todos as $todo)
    <li>

        <a class="action btn btn-info" href="{{ route('edittodostatus.edit', [ 'id' => $todo->id ])}}">
        <label class="switch @if($todo['status']=='1') checked @endif "><span class="slider"></span> </label>
        </a>

        <h4>{{  $todo['title'] }} 
        @foreach($daylistitems as $daylistitem) @if($todo->listid==$daylistitem->id)<span class="tag"> {{ $daylistitem->title }}</span>@endif @endforeach


        </h4> 
        <div class="actions">
        <a class="action btn btn-info" href="{{ route('todos.edit', [ 'id' => $todo->id ])}}">Edit</a>

        <a class="delete" onclick="return warning()" href="{{ route('todos.delete', [ 'id' => $todo['id']])}}">Delete x</a></div>

    </li>
    @endforeach

</ul>

</div>

</main>

@endsection