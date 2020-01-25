@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
		<h2 class="text-left">
		New Bus Routes
	</h2>
<div class="card p-5">
	<form method="post" action="{{route('cities.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group ">		
				<label>City Name:</label>
				<input type="text" name="name" class="form-control">
				@if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
		</div>	

		<div class="form-group">
			<input type="submit" name="btnsubmit" class="btn btn-success" value="Save">         
		</div>
	</form>	
</div>
		
</div>

@endsection