@extends('templates.template')
@section('contenu')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Types de dépenses', '€'],
          ['energie',  <?php echo $typeArray['energie']; ?>],
          ['restaurants',  <?php echo $typeArray['restaurants']; ?>],
          ['enfants',  <?php echo $typeArray['enfants']; ?>],
          ['nourriture',  <?php echo $typeArray['nourriture']; ?>],
          ['emprunt',  <?php echo $typeArray['emprunt']; ?>],
          ['voiture',  <?php echo $typeArray['voiture']; ?>],
          ['maison',  <?php echo $typeArray['maison']; ?>],
          ['loisirs',  <?php echo $typeArray['loisirs']; ?>],
          ['autres',  <?php echo $typeArray['autres']; ?>]
        ]);

        var options = {
          title: 'Types de dépenses',
          is3D: true,
          colors: ['#ffbab3', '#668ad8', '#00ffff', '#36528c', '#039cae','#ee2295', '#ff96a8','#9dd7de','#cccccc']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(drawChart2);

  function drawChart2() {
    var oldData = google.visualization.arrayToDataTable([
          ['Name', 'total'],
          ['energie',  200],
          ['restaurants', 100],
          ['enfants',  800],
          ['nourriture',  500],
          ['emprunt',  1140],
          ['voiture',  400],
          ['maison',  100],
          ['loisirs',  100],
          ['autres',  100]
    ]);

    var newData = google.visualization.arrayToDataTable([
      ['Name', 'total'],
      ['energie',  <?php echo $typeArray['energie']; ?>],
          ['restaurants',  <?php echo $typeArray['restaurants']; ?>],
          ['enfants',  <?php echo $typeArray['enfants']; ?>],
          ['nourriture',  <?php echo $typeArray['nourriture']; ?>],
          ['emprunt',  <?php echo $typeArray['emprunt']; ?>],
          ['voiture',  <?php echo $typeArray['voiture']; ?>],
          ['maison',  <?php echo $typeArray['maison']; ?>],
          ['loisirs',  <?php echo $typeArray['loisirs']; ?>],
          ['autres',  <?php echo $typeArray['autres']; ?>]
    ]);


    var barChartDiff = new google.visualization.BarChart(document.getElementById('barchart_diff'));

    var options2 = { legend: { position: 'top' } };


var diffData = barChartDiff.computeDiff(oldData, newData);
    barChartDiff.draw(diffData, options2);
  }
</script>


<div class="wrapper" id="accountPage">
    <h1> <?php 
   
    $month_name = date("F", mktime(0, 0, 0, $month, 10)); 2021;
    echo  $month_name; ?> 2021</h1>


   


    <div id="totalPercent" >
        <b style="width:<?php echo  $sum*100/3100 ?>%"> TOTAL = {{ $sum }}€ / <?php echo round($sum*100/3100); ?>%</b>
    </div>


<div id="piechart_3d" style="width: 45%; height: 500px; display: inline-block; vertical-align:center"></div>

<span id='barchart_diff' style='width: 45%; height: 500px; display: inline-block; vertical-align:center'></span>



<?php echo $typeArray['loisirs']; ?>

      <table class="todolist">
      @foreach($accounts as $account) 
        <tr>

      
       

        <td><h2> {{ $account->amount }}€ </h2> </td>
        <td>{{ $account->datedep}}  </td> 
        <td><small>@if($account->titlealt!=''){{ $account->titlealt }} 
        @else {{ $account->title }}
        @endif</small>
			       
<div class="mobileOnly"><b class="tag_{{ $account->type}} tag">{{ $account->type}}</b></div></td>
       
<td class="desktopOnly"><b class="tag_{{ $account->type}} tag">{{ $account->type}}</b></td>
        <td class="">
        <a class="actionBtn" href="{{ route('accountLines.edit', [ 'id' => $account->id ])}}">Edit</a>

        <a onclick="return confirm('Sure about that?')" class="actionBtn delete" onclick="return warning()" href="{{ route('accountLines.delete', [ 'id' => $account['id']])}}">Delete</a>

</td>
</tr>
    @endforeach
   
    
</table>
</div>
@endsection