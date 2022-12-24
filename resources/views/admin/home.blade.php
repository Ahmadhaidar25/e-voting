@extends('layout.admin')
@section('content')
<div class="section-title">
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
	<div id="container"></div>

</figure>
<script type="text/javascript">
	// Data retrieved from https://www.ssb.no/statbank/table/10467/
	var chart = Highcharts.chart('container', {

		chart: {
			type: 'cylinder'
		},

		title: {
			text: 'Hasil Voting Sementara'
		},

		legend: {
			align: 'right',
			verticalAlign: 'middle',
			layout: 'vertical'
		},

		

		series: [
			@foreach($data as $x)
			{name: '{{$x->nama_calon_ketua}},{{$x->nama_calon_wakil_ketua}}',data: [{{$x->voting->count()}}]},
			@endforeach
			],

		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						align: 'center',
						verticalAlign: 'bottom',
						layout: 'horizontal'
					},
					yAxis: {
						labels: {
							align: 'left',
							x: 0,
							y: -5
						},
						title: {
							text: null
						}
					},
					subtitle: {
						text: null
					},
					credits: {
						enabled: false
					}
				}
			}]
		}
	});

	
</script>
@endsection