@extends('layout')

@section('content')


<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<a href="{{ url('client/add') }}" class="btn btn-info">
						<i class="fa fa-user-plus"></i>Nouveau Client
					</a>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Gender</th>
								<th>CIN</th>
								<th>Date de naissance</th>
								<th>Points</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($clients as $client)
							<tr>
								<td>{{ $client->firstname }}</td>
								<td>{{ $client->lastname  }}</td>
								<td>{{ $client->gender }}</td>
								<td>{{ $client->cin }}</td>
								<td>{{  date('d/m/Y', strtotime($client->birthdate)) }}</td>
								<td>{{ $client->points }}</td>
								<td>
									<a href="{{ url('client/edit',[$client->id]) }}" class="btn btn-success">
										<i class="fa fa-edit"></i>
									</a>
									<a href="{{ url('client/delete',[$client->id]) }}" class="btn btn-danger">
										<i class="fa fa-trash"></i>
									</a>
									<a href="{{ action('OperationController@add',[$client->id]) }}" class="btn btn-info">
										<i class="fa fa-money"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Gender</th>
								<th>CIN</th>
								<th>Date de naissance</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div><!-- /.box-body -->
			</div><!-- /.box -->      
		</div><!-- /.col -->
	</div><!-- /.row -->
</section><!-- /.content -->

@stop
@section('javascripts')
<script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
	$(function () {
		$("#example1").dataTable();
		$('#example2').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": false
		});
	});
</script>
@stop