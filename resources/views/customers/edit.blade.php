@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
<h4>Enter Traveller Information </h4>
<br>
<form method="post" action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
	 @csrf
	  @method('PUT')
	 	<div class="form-group">
		<div class="container">
			<div class="row ">
				<div class="col">
					<label>Traveller Name:</label>
					</div>
				</div>
				<div class="row">
				<div class="col">
					<input type="text" name="name" class="form-control" value="{{$customer->name}}">
					@if ($errors->has('customer name')) <p style="color:red;">{{ $errors->first('customer name') }}</p> @endif
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Gender:</label>
				</div>
			</div>
				<div class="row">
				<div class="col">
					<select class="form-control" name="gender" value="{{$customer->gender}}">
					<option value="Male">Male</option>
					<option value="Male">Female</option>
					<option value="Male">Other</option>
				</select>
					
					@if ($errors->has('gender')) <p style="color:red;">{{ $errors->first('gender') }}</p> @endif
				</div>
			</div>
		</div>
	</div>	
	<div class="form-group">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Email:</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
					<input type="email" name="email" class="form-control" value="{{$customer->email}}">
					@if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Phone:</label>
					</div>
				</div>
				<div class="row">
				<div class="col">
					<div class="col">
					<input type="text" name="phone" class="form-control" value="{{$customer->phone}}">
					@if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="container">
			<div class="row">
				<div class="col">
					<label>Note:</label>
					</div>
				</div>
				<div class="row">
				<div class="col">
					<div class="col">
					<input type="text" name="note" class="form-control" value="{{$customer->note}}">
					@if ($errors->has('price')) <p style="color:red;">{{ $errors->first('price') }}</p> @endif
				</div>
			</div>
		</div>
	</div>
	
	<br>
	<div class="form-group" align="right">
          <input type="submit" name="btnsubmit" class="btn btn-primary" value="Submit and Continue">         
        </div>
</form>		
</div>
@endsection