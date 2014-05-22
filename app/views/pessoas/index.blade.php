@section('main')


<div class="page-header">
     <h1 class="">
       Lista de pessoas
     </h1>
</div><!-- /.page-header -->
<!-- <div class="row">
	<div class="col-md-12 pull-right">
		<form class="form-horizontal" role="form" action="/pesquisas/produtos" method="get">
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" id="form-field-1" placeholder="Digite o produto" class="col-md-12" name="q">
				</div>
			</div>

			<div class="space-4"></div>

		</form>							
	</div>
</div> -->
@if ($pessoas->count())
<div class="panel panel-default">
<!-- <div class="panel-heading">
    DataTables Advanced Tables
</div> -->
<!-- /.panel-heading -->
	<div class="table-responsive">

	 <table id="sample-table-2"  class="table table-striped table-bordered table-hover" id="dataTables-example">
	
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th></th>
				

			</tr>
		</thead>

		<tbody>
			@foreach ($pessoas as $pessoa)
				<tr>
					<td>{{{ $pessoa->id }}}</td>
					<td>
						<img src="{{$pessoa->foto}}" width="100"/>
						{{{ $pessoa->nome }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	</div>
</div> <!-- panel-->
@else
	There are no pessoas
@endif

@stop