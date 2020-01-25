@extends('template')
@section('content')
	<div class="container booking my-5">
		<h1 class="text-center mb-3 text-info">Booking Table</h1>
		<div class="row">
			<div class="col-12 col-md-6 col-lg-6">
				<h3 class="text-center">Select Seats</h3>
			</div>
			<div class="col-12 col-md-6 col-lg-6">
				<form action="" method="" class="form">
					<div class="form-group">
						<label for="total">Total</label>
						<input type="text" value="" name="total" id="total" class="form-control">
					</div>
					<div class="form-group">
						<label for="seatno">Seat Numbers</label>
						<input type="text" name="seatno" id="seatno" class="form-control">
					</div>
					<div class="form-group">
						<label for="carname">Car Name</label>
						<input type="text" value="{{$value->cname}}" name="carname" id="carname" class="form-control">
					</div>
					<div class="form-group">
						<label for="route">Route</label>
						<input type="text" value="{{$value->fname}}-{{$value->tname}}" name="route" id="route" class="form-control">
					</div>
					<div class="form-group">
						<label for="time">Time</label>
						<input type="text" name="time" value="{{$value->time}}" id="time" class="form-control">
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="Email" name="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="form-control">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="mixgroup">Mixed Group</option>
						</select>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control">
					</div>
					<div>
						<button class="btn btn-info" type="submit" style="width: 100%; height:50px; font-size: 24px;">Booking</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
@endsection