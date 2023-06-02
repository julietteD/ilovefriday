@extends('templates.template')
@section('contenu')



<main>
<a href="daylistitems">Gestion planning</a>
<a href="#">< {{ date('Y-m-d', strtotime('-1 day', strtotime(now()))) }} </a><br/>
<div class="dateBox"><div class="wrapper"><h2>{{ now() }}</h2></div></div>
<div class="wrapper">
            <div id="dayFlow">
                <div id="timeline">
                    <ul>
                        <li><strong>6h</strong></li>
                        <li><strong>7h</strong></li>
                        <li><strong>8h</strong></li>
                        <li><strong>9h</strong></li>
                        <li><strong>10h</strong></li>
                        <li><strong>11h</strong></li>
                        <li><strong>12h</strong></li>
                        <li><strong>13h</strong></li>
                        <li><strong>14h</strong></li>
                        <li><strong>15h</strong></li>
                        <li><strong>16h</strong></li>
                        <li><strong>17h</strong></li>
                        <li><strong>18h</strong></li>
                        <li><strong>19h</strong></li>
                    </ul>
                </div>

                <div id="dayList">

@foreach($daylistitems as $daylistitem)

 


<div class="item" style="height:{{ $daylistitem['duration']*4 }}px">
    <a class="action btn btn-info" href="{{ route('edittodobyday.edit', [ 'id' => $daylistitem->id ])}}">
                
                    <label class="switch  @foreach($todobydays as $todobyday)
                    @if($todobyday->listid==$daylistitem['id'] AND $todobyday->day==date('Y-m-d'))
                        @if($todobyday['status']=='1') checked @endif
                    @endif
                @endforeach ">
                    <span class="slider"></span>
                    </label>
               
                   
                </a>
                        <div class="element">{{ $daylistitem['title'] }}</div>
                        @if($daylistitem['pageid'])<div class="actions"><a href="{{ route('pages.item', [ 'id' => $daylistitem['pageid']]) }}">Detail Page</a></div>@endif
                        @if($todos)<div class="actions"><a href="{{ route('todobylistid.item', [ 'id' => $daylistitem->id]) }}">TODO</a></div>@endif

                    </div>

@endforeach
                   
                  
                </div>
            </div>

        </div>


</main>

@endsection