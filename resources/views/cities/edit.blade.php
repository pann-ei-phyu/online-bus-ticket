@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">City Edit Form
	</h2>
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{route('cities.update',$city->id)}}" 
		enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<div class="col-md-2">
				<label>City Name:</label>
			</div>
			<div class="col-md-8">
				<input type="text" name="name" id="inputName" class="form-control" value="{{$city->name}}">
			</div>
		</div>

		<!-- <div class="form-group">
			<div class="row my-5">
				<div class="col-md-2">
					<label>Profile:</label>
				</div>
				<div class="col-md-8">
					<input type="file" name="profile" class="" value="">
					<img src="{{asset($city->profile)}}" class="img-fluid" width="100" height="100">
					<input type="hidden" name="oldprofile" value="{{$city->profile}}">
				</div>
			</div>
		</div> -->


		<div class="form-group text-center">
			<input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">         
		</div>
	</form>
</div>
@endsection