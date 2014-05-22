//@extends('layouts.scaffold')
@section('main')

<div class="page-header">
	 <h1 class="">
	 	Dashboard
	 </h1>
</div><!-- /.page-header -->
	<div class="row">
		<div class="col-sm-12 infobox-container">
			<div class="infobox infobox-green  ">
				<div class="infobox-icon">
					<i class="icon-desktop"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{ $totalProdutos }}</span>
					<div class="infobox-content">Produtos</div>
				</div>
			<!-- 	<div class="stat stat-success">8%</div -->>
			</div>

			<div class="infobox infobox-blue  ">
				<div class="infobox-icon">
					<i class="icon-building"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{$totalLojasProdutos}}</span>
					<div class="infobox-content">lojas/produtos</div>
				</div>

				<!-- <div class="badge badge-success">
					+32%
					<i class="icon-arrow-up"></i>
				</div> -->
			</div>

			<div class="infobox infobox-pink  ">
				<!-- <div class="infobox-icon">
					<i class="icon-shopping-cart"></i>
				</div> -->

				<div class="infobox-data">
					<span class="infobox-data-number">{{$lastUpdate}}</span>
					<div class="infobox-content">última atualização</div>
				</div>
				<!-- <div class="stat stat-important">4%</div> -->
			</div>

			<div class="infobox infobox-red  ">
				<div class="infobox-icon">
					<i class="icon-beaker"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{ $totalLojas }}</span>
					<div class="infobox-content">lojas cadastradas</div>
				</div>
			</div>

			<div class="infobox infobox-orange2  ">
				<!-- <div class="infobox-chart">
					<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas width="44" height="28" style="display: inline-block; width: 44px; height: 28px; vertical-align: top;"></canvas></span>
				</div> -->
				<div class="infobox-icon">
					<i class="icon-sitemap"></i>
				</div>

				<div class="infobox-data">
					<span class="infobox-data-number">{{$totalCategoriasLojas}}</span>
					<div class="infobox-content">categorias/lojas</div>
				</div>

				<!-- <div class="badge badge-success">
					7.2%
					<i class="icon-arrow-up"></i>
				</div> -->
			</div>

			<div class="infobox infobox-blue2  ">
				<div class="infobox-progress">
					<div class="easy-pie-chart percentage easyPieChart" data-percent="42" data-size="46" style="width: 46px; height: 46px; line-height: 46px;">
						<span class="percent">42</span>%
					<canvas width="46" height="46"></canvas></div>
				</div>

				<div class="infobox-data">
					<span class="infobox-text">traffic used</span>

					<div class="infobox-content">
						<span class="bigger-110">~</span>
						58GB remaining
					</div>
				</div>
			</div>
<div class="space-10"></div>
			<!-- <div class="space-6"></div>

			<div class="infobox infobox-green infobox-small infobox-dark">
				<div class="infobox-progress">
					<div class="easy-pie-chart percentage easyPieChart" data-percent="61" data-size="39" style="width: 39px; height: 39px; line-height: 39px;">
						<span class="percent">61</span>%
					<canvas width="39" height="39"></canvas></div>
				</div>

				<div class="infobox-data">
					<div class="infobox-content">Task</div>
					<div class="infobox-content">Completion</div>
				</div>
			</div>

			<div class="infobox infobox-blue infobox-small infobox-dark">
				<div class="infobox-chart">
					<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas width="39" height="17" style="display: inline-block; width: 39px; height: 17px; vertical-align: top;"></canvas></span>
				</div>

				<div class="infobox-data">
					<div class="infobox-content">Earnings</div>
					<div class="infobox-content">$32,000</div>
				</div>
			</div>

			<div class="infobox infobox-grey infobox-small infobox-dark">
				<div class="infobox-icon">
					<i class="icon-download-alt"></i>
				</div>

				<div class="infobox-data">
					<div class="infobox-content">Downloads</div>
					<div class="infobox-content">1,205</div>
				</div>
			</div> -->
		</div>
	
		<!-- <div class="col-lg-5">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	             <h4>  <i class="fa fa-shopping-cart"></i> Lojas </h4>
	            </div>
	            <div class="panel-body">
	             
	                	<p><em class="font25 text-primary">{{ $totalLojas }}</em> lojas cadastradas em <em class="font25 text-primary">{{$totalCategoriasLojas}}</em> categrorias</p> 

	     
	            </div>
	          
	       </div>
	       
		</div> -->
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-flat">
					<h4 class="lighter">
						<i class="icon-star orange"></i>
						Dólar
					</h4>

					<div class="widget-toolbar">
						<a href="#" data-action="collapse">
							<i class="icon-chevron-up"></i>
						</a>
					</div>
				</div>

				<div class="widget-body">
					<p>
						
	              		Mín. <em class="font25 text-primary">{{$cotacaoDolar[0]->min}}</em> | Máx. <em class="font25 text-primary">{{$cotacaoDolar[0]->max}}</em> em <em class="text-primary"> {{$cotacaoDolar[0]->data}}</em></p>

	              		<div class="cl clearfix" style="margin-top:20px"></div>
						<script type="text/javascript" src="https://www.google.com/jsapi"></script>
						<script type="text/javascript">

						      // Load the Visualization API and the piechart package.
						      google.load('visualization', '1.0', {'packages':['corechart']});

						      // Set a callback to run when the Google Visualization API is loaded.
						      google.setOnLoadCallback(drawChart);

						      // Callback that creates and populates a data table,
						      // instantiates the pie chart, passes in the data and
						      // draws it.
						      function drawChart() {

						        // Create the data table.
						        var data = google.visualization.arrayToDataTable([
						          ['Data', 'Cotação máx.(R$)', 'Cotação mín.(R$)'],
								@foreach ($cotacaoDolar as $cotacao)
									
								  ['{{ $cotacao->data }}',  {{ $cotacao->max }},      {{ $cotacao->min }}],
								@endforeach
							    ]);

						        var options = {
						          title: 'Cotação do dólar no Paraguai(Ciudad del Este) últimos 30 dias',
						          width: '100%',
						          height: '400'
						          
						        };

						        // Instantiate and draw our chart, passing in some options.
						        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
						        chart.draw(data, options);
						      }
						    </script>
						    
						  
						   
						 <div id="chart_div" style="margin-top:20px"><span style="font-size:30px">Carregando...</span></div>
				</div><!-- /widget-body -->
			</div><!-- /widget-box -->
		</div>
		
	</div>




		
</div>
@stop