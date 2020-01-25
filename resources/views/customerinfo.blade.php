@extends('template')
@section('content')
<div class="container booking">
	<div class="row my-5">
		<div class="col-12 col-md-7 col-lg-7">
			<h3 class="text-center" style="color: #808b96;">Customer Information</h3>
			<div class="container">
				<form action="{{route('bookings.store')}}" method="post">
					@csrf
					<input type="hidden" name="id" value="{{$id}}">
					<input type="hidden" name="carname" value="{{$carname}}">
					<input type="hidden" name="fname" value="{{$fname}}">
					<input type="hidden" name="tname" value="{{$tname}}">
					<input type="hidden" name="price" value="{{$price}}">
					<input type="hidden" name="date" value="{{$date}}">
					<input type="hidden" name="time" value="{{$time}}">
					<input type="hidden" name="nation" value="{{$nation}}">
					<input type="hidden" name="seat" value="{{$seat}}">
					<div class="form-group">
						<label>Name:</label>
						<input type="text" name="name" class="form-control">
						@if($errors->has('name'))<p style="color: red;">
						{{$errors->first('name')}}</p>@endif
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="email" class="form-control">
						@if($errors->has('email'))<p style="color: red;">
						{{$errors->first('email')}}</p>@endif
					</div>
					<div class="form-group">
						<label>Phone:</label>
						<input type="text" name="phone" class="form-control">
						@if($errors->has('phone'))<p style="color: red;">
						{{$errors->first('phone')}}</p>@endif
					</div>
					<div class="form-group">
							<div class="row">
								<div class="col">
									<label>Gender:</label>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<select class="form-control" name="gender">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
									@if($errors->has('gender'))<p style="color: red;">
									{{$errors->first('gender')}}</p>@endif
								</div>
							</div>
					</div>
					<div class="form-group">
						<label>Note:</label>
						<input type="text" name="note" class="form-control">
						@if($errors->has('note'))<p style="color: red;">
						{{$errors->first('note')}}</p>@endif
					</div>
					<input type="submit" name="" class="btn btn-info form-control" value="Continue to Booking">
				</form>
			</div>
		</div>
		<div class="offset-md-1 col-12 col-md-4 col-lg-4">
			<h3 class="text-center" style="color: #808b96;">Trip Information</h3>
			<div class="row my-4">
				<table class="table">
					<tr>
						<td>Operator:</td>
						<td>{{$carname}}</td>
					</tr>
					<tr>
						<td>Route:</td>
						<td>{{$fname}}-{{$tname}}</td>
					</tr>
					<tr>
						<td>Departure Date:</td>
						<td>{{$date}}/{{$time}}</td>
					</tr>
					<tr>
						<td>Total:</td>
						<td>{{$price}}</td>
					</tr>
					<!-- <tr>
						<td>Nation:</td>
						<td>{{$nation}}</td>
					</tr> -->
					<tr>
						<td>Seat No:</td>
						<td>{{$seat}}</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
</div>
@endsection




<?php 
	//dd($carname,$fname,$tname,$date,$time,$price,$nation,$seat);
?>