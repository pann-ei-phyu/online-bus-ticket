@extends('backendtemplate')
@section('content')
	<div class="container-fluid my-3">
		<h2>Booking Edit Form
		</h2>
		<form method="post" action="{{route('nations.update',$nation->id)}}" enctype="multipart/form-data">
	 @csrf
	 @method('PUT')
	<div class="form-group ">
		<div class="container">
			<div class="row my-5">
				<div class="col-md-2">
					<label>Nationality:</label>
				</div>
				<div class="col-md-10">
					<input type="text" name="type" class="form-control" value="{{$nation->type}}">
					@if ($errors->has('type')) <p style="color:red;">{{ $errors->first('type') }}</p> @endif
 				</div>
				</div>

				</div>
			</div>
		</div>
	</div>		
	<div class="form-group">
	 <input type="submit" name="btnsubmit" class="btn btn-primary" value="Save">         
	</div>
</form>		

		
	</div>
@endsection
