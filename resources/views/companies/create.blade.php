@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h1 class="text-left">New Member Form</h1>
			
		<div class="card">
		<div class=" offset-md-2 col-md-6">
				<!-- @if ($errors->any())
					<div class="alert alert-danger">
	    				<ul>
	        			@foreach ($errors->all() as $error)
	            			<li>{{ $error }}</li>
	        			@endforeach
	    				</ul>
					</div>
				@endif -->
				<form method="post" action="{{route('companies.store')}}" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" class="form-control">
					@if($errors->has('name'))<p style="color: red;">
						{{$errors->first('name')}}</p>@endif
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" name="email" class="form-control" multiple>
				</div>
				<!-- <div class="form-group">
					<label>Namem:</label>
					<input type="text" name="namem" class="form-control" multiple>
				</div> -->
				<div class="form-group">
					<label>Phone:</label>
					<input type="text" name="phone" class="form-control">
				</div>
				<div class="form-group">
					<label>Logo:</label>
					<input type="file" name="logo" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Address:</label>
					<textarea name="address" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Owner Name:</label>
					<input type="text" name="owner_name" class="form-control">
				</div>
				
				<div class="form-group">
					<input type="submit" name="btnsubmit" class="btn btn-success">
				</div>
			</form>
					</div>
				</div>
			
	
</div>
@endsection