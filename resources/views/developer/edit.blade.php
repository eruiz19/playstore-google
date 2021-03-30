@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar App</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('developer.update',$app->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<!-- <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="nombre" class="form-control input-sm" value="{{$app->name}}">
									</div>
								</div> -->
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Precio</label>
									<div class="form-group">
										<input type="text" name="price" id="precio" class="form-control input-sm" value="{{$app->price}}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen</label>
									<div class="form-group">
										<input type="text" name="picture" id="logo" class="form-control input-sm" value="{{$app->picture}}">
									</div>
								</div>
								<!-- <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="category_id" id="categoria" class="form-control input-sm" value="{{$app->category_id}}">
									</div> -->
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción</label>
								<textarea name="description" class="form-control input-sm" placeholder="Descripción">{{$app->description}}</textarea>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('developer.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection