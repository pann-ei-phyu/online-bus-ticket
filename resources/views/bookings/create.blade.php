@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">
		New Booking Create
	</h2>
	<div class="card p-5">

		<form method="post" action="{{route('bookings.store')}}" enctype="multipart/form-data">
			 @csrf
			 	<!-- <div class="form-group">
					<label>Customer Name:</label>
					<input type="text" name="name" class="form-control">
					@if ($errors->has('customer name')) <p style="color:red;">{{ $errors->first('customer name') }}</p> @endif
				</div>

				<div class="form-group">
					<label>Email:</label>
					<input type="email" name="email" class="form-control">
					@if ($errors->has('customer email')) <p style="color:red;">{{ $errors->first('customer email') }}</p> @endif
				</div>

				<div class="form-group">
					<label>Phone:</label>
					<input type="text" name="phone" class="form-control">
					@if ($errors->has('customer phone')) <p style="color:red;">{{ $errors->first('customer phone') }}</p> @endif
				</div> -->

				<div class="form-group">
					<label>Seat Qty:</label>
					<input type="text" name="seatno" class="form-control">
					@if ($errors->has('customer seatno')) <p style="color:red;">{{ $errors->first('customer seatno') }}</p> @endif
				</div>

				<div class="form-group">
					<label>Total Price:</label>
					<input type="number" name="price" class="form-control">
					@if ($errors->has('customer total price')) <p style="color:red;">{{ $errors->first('customer total price') }}</p> @endif
				</div>

				<div class="form-group">
					<label>Nationality:</label>
					<select name="nation_id" class="form-control">
						@foreach($nations as $nation)
							<option value="{{ $nation->id }}">
								{{$nation->type}}
							</option>
						@endforeach
					</select>	
					@if ($errors->has('customer nationality')) <p style="color:red;">{{ $errors->first('customer nationality') }}</p> @endif
				</div>

				<div class="form-group">
					<label>Department Date:</label>
					<input type="date" name="date" class="form-control">
					@if ($errors->has('customer department date')) <p style="color:red;">{{ $errors->first('customer department date') }}</p> @endif
				</div>

				<div class="form-group">	
					<input type="submit" name="btnsubmit" class="btn btn-info" value="Submit">
					
				</div>		
</form>		
</div>
@endsection