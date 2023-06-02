<header>


<div class="logo">
<a href="{{ url('/') }}"  class="{{ Request::is('/') ? 'active' : '' }}">ILF</a>
</div>
<nav>
    <ul class="navigation">
        <li class="{{ Request::is('account*') ? 'active' : '' }}"> <a href="{{ url('/accounts') }}">COMPTES</a></li>
        <li class="{{ Request::is('accountTom*') ? 'active' : '' }}"> <a href="{{ url('/accountToms') }}">COMPTE TOM</a></li>
       @if(Auth::user()->type=='full')
		<li class="{{ Request::is('todo*') ? 'active' : '' }}"> <a href="{{ url('/todos') }}">TODO</a></li>
        <li class="{{ Request::is('day*') ? 'active' : '' }}"> <a href="{{ url('/day') }}">DAY</a></li>
        <li class="{{ Request::is('page*') ? 'active' : '' }}"> <a href="{{ url('/pages') }}">PAGES</a></li>
        @endif
    </ul>
    
   </div>
</nav>

<!--<div class="navaside"> <a href="{{ url('/management') }}">management</a></div>-->




</header>