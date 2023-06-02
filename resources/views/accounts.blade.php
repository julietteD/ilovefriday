@extends('templates.template')
@section('contenu')

<div class="wrapper">
          
<div class="uploadBox">
                    @if(Session::has("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Success!</strong> {{Session::get("success")}}
                        </div>
                    @elseif(Session::has("failed"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Alert!</strong> {{Session::get("failed")}}
                    </div>

                    @endif
                    <form method="post" action="{{url('parse-csv')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card shadow">
                           
                                <h4 style="display:inline-block">Import CSV File </h4>
                            
                             
                                    <input type="file" name="csv_file" class="form-control">
                                    {!!$errors->first("csv_file", '<small class="text-danger">:message</small>') !!}
                                
                            
                                <button type="submit" class="square_btn" name="submit">Import Data </button>
                            
                        </div>
                    </form>
              
      </div>      </div>
<div class="wrapper">
<ul class="todolist">
    
  <?php   
  for($month=1; $month<13; $month++){ 
    
    $month_name = date("F", mktime(0, 0, 0, $month, 10));
    $sum = 0; 
    foreach($accounts as $account) {
        if( $account->month==$month){ 
       $sum += $account->amount;
    }
     }
 
   ?>
   <li><a href="/accountByMonth/<?php  echo $month; ?>"><?php   echo $month_name; ?> | <b><?php   echo -$sum; ?>€</b></a></li>
<?php
}
    ?>
    


</ul>


</div>
@endsection