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
					<h3 class="box-title">Débiter Compte Client </h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<!-- <form role="form" method="POST" action="{{  url('client/add') }}"> -->
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				{!! Form::open(array('method' => 'POST')) !!}
				<div class="box-body">
					<div class="form-group">
						<label>Préstation :</label>
						<input class="form-control" type="text" name="prestation">
					</div>
					<label>Montant :</label>
					<div class="input-group">
						<input class="form-control" type="text" name="montant"> 
						<span class="input-group-addon">Dhs</span>
					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				{!! Form::close() !!}
				<!-- </form> -->
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	<!--/.col (left) -->
	<div class="col-md-6">
		<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Historique du client</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  @foreach ($operations as $operation)
                    <li class="item">
                        <a href="javascript::;" class="product-title">{{$operation->created_at}} <span class="label label-warning pull-right">{{$operation->montant}}</span></a>
                        <span class="product-description">
                          {{$operation->prestation}}
                        </span>
                    </li><!-- /.item -->
                    @endforeach
                  </ul>
                </div><!-- /.box-body -->
              </div>
	</div>
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