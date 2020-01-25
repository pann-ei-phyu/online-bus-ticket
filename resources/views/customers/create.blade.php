@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">Enter Traveller Information </h4>
	<div class="card p-5">
			<form method="POST" action="{{route('customers.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<div class="container">
				<div class="row ">
					<div class="col">
						<label>Traveller Name:</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<input type="text" name="name" class="form-control">
						@if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
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
						<select class="form-control" name="gender">
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
						<input type="email" name="email" class="form-control">
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
							<input type="text" name="phone" class="form-control">
							@if ($errors->has('phone')) <p style="color:red;">{{ $errors->first('phone') }}</p> @endif
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
								<input type="text" name="note" class="form-control">
								@if ($errors->has('price')) <p style="color:red;">{{ $errors->first('price') }}</p> @endif
							</div>
						
					</div>
				</div>

				<br>
				<div class="form-group" align="left">
					<input type="submit" name="btnsubmit" class="btn btn-success" value="Submit and Continue">         
				</div>
			</form>	
	</div>
</div>
		@endsection