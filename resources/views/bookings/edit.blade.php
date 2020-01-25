@extends('backendtemplate')
@section('content')
	<div class="container-fluid my-3">
		<h2 class="text-left">Booking Edit Form
		</h2>
		<form method="post" action="{{route('bookings.update',$booking->id)}}" 
		enctype="multipart/form-data">
			 @csrf
			 @method('PUT')
		    <div class="form-group">
		      	<label>Seat No:</label>
		      	<input type="text" name="seatno" id="inputSeat" class="form-control" value="{{$booking->seat_no}}">
		    </div>
			 <div class="form-group">
		      	<label>Total Price:</label>
		      	<input type="number" name="price" id="inputDurations" class="form-control" value="{{$booking->total_price}}">
		    </div>
			 <div class="form-group">
		      	<label>Department Date:</label>
		      	<input type="date" name="date" id="inputDate" class="form-control" value="{{$booking->dept_date}}">
		    </div>
			<div class="form-group">
			    <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">         
			</div>
		</form>
	</div>
@endsection
