@extends('layout')
@section('stylesheets')
<link href="/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
@stop
@section('content')
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Nouveu Client</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<!-- <form role="form" method="POST" action="{{  url('client/add') }}"> -->
				{!! Form::open(array('method' => 'PUT')) !!}
				<div class="box-body">
					<div class="form-group">
						<label>Nom :</label>
						<input class="form-control" type="text" name="firstname" value="{{ $client->firstname }}">
					</div>
					<div class="form-group">
						<label>Prenom :</label>
						<input class="form-control" type="text" name="lastname" value="{{ $client->lastname }}">
					</div>
					<div class="form-group">
						<label>CIN/Passport :</label>
						<input class="form-control" type="text" name='cin' value="{{ $client->cin }}">
					</div>
					<div class="form-group">
						<label>Email :</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" class="form-control" placeholder="Email" name='email' value="{{ $client->email }}">
						</div>
					</div>
					<div class="form-group">
						<label>Date de naissance :</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text" name='birthdate' value="{{ date('d/m/Y', $client->birthdate) }}">
						</div><!-- /.input group -->
					</div>
					<div class="form-group">
						<label>Homme
							<input type="radio" name="gender" class="minimal-red" value="H" @if ($client->gender =='H') checked @endif />
						</label>
						<label>Femme
							<input type="radio" name="gender" class="minimal-red"  value="F" @if ($client->gender =='F') checked @endif />
						</label>
					</div>
					<!-- phone mask -->
					<div class="form-group">
						<label>Telephone :</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-phone"></i>
							</div>
							<input type="text" class="form-control" data-inputmask='"mask": "(+212)9 99 99 99 99"' data-mask name='phonenumber' value="{{ $client->phonenumber}}"/>
						</div><!-- /.input group -->
					</div><!-- /.form group -->


					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				{!! Form::close() !!}
				<!-- </form> -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</div><!--/.col (left) -->
</div>   <!-- /.row -->
</section><!-- /.content -->
@stop
@section('javascripts')
<script src="/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	$("[data-mask]").inputmask();
	$('input[type="radio"].minimal-red').iCheck({
		radioClass: 'iradio_minimal-red'
	});
</script>
@stop