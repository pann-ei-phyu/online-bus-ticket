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
				<form method="post" action="{{route('companies.update',$company->id)}}" enctype="multipart/form-data">
				@csrf
				@Method('PUT')
				<div class="form-group">
					<label>Name:</label>
					<input type="text" name="name" value="{{$company->user->name}}" class="form-control">
					@if($errors->has('name'))<p style="color: red;">
						{{$errors->first('name')}}</p>@endif
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" name="email" value="{{$company->user->email}}" class="form-control" multiple>
				</div>
				<!-- <div class="form-group">
					<label>Namem:</label>
					<input type="text" name="namem" value="{{$company->namem}}" class="form-control" multiple>
				</div> -->
				<div class="form-group">
					<label>Phone:</label>
					<input type="text" name="phone" value="{{$company->phone}}" class="form-control">
				</div>
				<div class="form-group">
					<label>Logo:</label>
					<input type="file" name="logo" class="form-control">
					<img src="{{asset($company->logo)}}" class="img-fluid">
					<input type="hidden" name="oldlogo" value="{{$company->logo}}">
				</div>
				
				<div class="form-group">
					<label>Address:</label>
					<textarea name="address" class="form-control">{{$company->address}}</textarea>
				</div>
				<div class="form-group">
					<label>Owner Name:</label>
					<input type="text" name="owner_name" value="{{$company->owner_name}}" class="form-control">
				</div>
				<!-- <div class="form-group">
					<label>User id:</label>
					<input type="text" name="user_id" value="{{$company->user_id}}" class="form-control" multiple>
				</div> -->
				<div class="form-group">
					<input type="submit" name="btnsubmit" value="Update" class="btn btn-success">
				</div>
			</form>
					</div>
				</div>
			
	
</div>
@endsection
