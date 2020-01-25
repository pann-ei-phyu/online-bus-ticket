@extends('template')
@section('content')
<div class="container booking">
	<div class="row my-5">
		<div class="col-12 col-md-7 col-lg-7">
			<h3 class="text-center" style="color: #808b96;">Please Select {{$noseats}} Seats</h3>
			<div class="row p-2 pl-5">
				<input type="text" name="" value="{{$noseats}}" id="countno" hidden="">
				<?php 
				//$j=2;
				for ($i = 1; $i <= $seats; $i++) {
					//dd($noseats);
					if (in_array($i, $bookseatno)) { ?>
						
						<div class="col-md-3 col-lg-3 my-2 w-25 h-25" >
							<input type="button" name="seat" value="{{$i}}" id="{{$i}}" class="btn btn-danger w-50 h-25 shadow text-center" disabled="disabled">
						</div>
						<?php 

					} else{ ?>

						<div class="col-md-3 col-lg-3 my-2 w-25 h-25" >
							<input type="button" name="seat" value="{{$i}}" id="{{$i}}" class="btn w-50 h-25 seat shadow text-center" style="border: solid 1px black;">
						</div>
						<?php
					}
				}
				?>
			</div>
			<div class="container my-5">
				<table class="table">
				<tr>
					<td><button class="btn btn-danger text-danger w-50 h-50  my-1" disabled="">12</button></td>
					<td class="pt-4"><span class=" mr-3">-</span>Already Selected Seats</td>
				</tr>
				<tr>
					<td><button class="btn w-50 h-50  choose my-1" style="color: #2E86C1">12</button></td>
					<td class="pt-4"><span class=" mr-3">-</span>Your Selected Seats</td>
				</tr>
				<tr>
					<td><button class="btn w-50 h-50  my-1" disabled="" style="border: solid 1px black; color: white;">12</button></td>
					<td class="pt-4"><span class=" mr-3">-</span>Available Seats</td>
				</tr>
			</table>
			</div>
		</div>
				<div class="offset-md-1 col-12 col-md-4 col-lg-4">
					<h3 class="text-center" style="color: #808b96;">Trip Information</h3>
					<div class="row my-4">
						<table class="table">
							<tr>
								<td>Operator:</td>
								<td>{{$carname=$route->company->User->name}}</td>
							</tr>
							<tr>
								<td>Route:</td>
								<td>{{$fname=$route->from_city->name}}-{{$tname=$route->to_city->name}}</td>
							</tr>
							<tr>
								<td>Date:</td>
								<td>{{$date}}</td>
							</tr>
							<tr>
								<td>Time:</td>
								<td>{{$time=$route->time}}</td>
							</tr>
							<tr>
								<td>Total:</td>
								<td>{{$price}}</td>
							</tr>
							<tr>
								<td>Seat No:</td>
								<td>
									<form method="get" action="{{route('customerinfo')}}">
										@csrf
										<input type="hidden" name="id" value="{{$id}}">
										<input type="hidden" name="carname" value="{{$carname}}">
										<input type="hidden" name="fname" value="{{$fname}}">
										<input type="hidden" name="tname" value="{{$tname}}">
										<input type="hidden" name="price" value="{{$price}}">
										<input type="hidden" name="date" value="{{$date}}">
										<input type="hidden" name="time" value="{{$time}}">
										<input type="hidden" name="nation" value="2">
										<input type="text" name="seatno" value="" class="form-control seatno" readonly="">
										@if($errors->has('seatno'))<p style="color: red;">
											{{$errors->first('seatno')}}</p>@endif
											
										</td>
										<tr>
											<td colspan="2"><input type="submit" value="Continue to Booking" class="form-control btn btn-info">
											</form></td>
										</tr>
									</tr>
								</table>

							</div>
						</div>
					</div>
				</div>
				@endsection