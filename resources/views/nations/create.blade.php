@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
<h2 class="text-left"> Nationality Form</h2>

<form method="post" action="{{route('nations.store')}}" enctype="multipart/form-data">
	 @csrf
	 <div class="card p-5">
	 	<div class="form-group">
			<label>Type of Nationality:</label>
			<input type="text" name="type" class="form-control">
			@if ($errors->has('type')) <p style="color:red;">{{ $errors->first('type') }}</p> @endif
		</div>
		<div class="form-group">
	 		<input type="submit" name="btnsubmit" class="btn btn-success" value="Save">         
		</div>				
	 </div>	
</form>		
</div>
@endsection