@extends('layouts.app')

@section('content')
<div class="row">
<canvas id="pie-chart" width="800" height="450"></canvas>



</div>
@endsection
@section('script')  
<script>
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: [{!! htmlspecialchars_decode($name) !!}],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#2980b9","#27ae60","#e67e22","#95a5a6","#2c3e50"],
        data: [{{$amount}}]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Expenses'
      }
    }
});
</script>
@endsection