@extends('backendtemplate')
@section('content')
	<div class="container-fluid my-3">
		<h2>Booking Details
		</h2>
		<form action="{{route('bookings.show',$booking->id)}}" 
		enctype="multipart/form-data">
			 @csrf	 
		<table class="table table-sm">
				<thread>
					<!-- compact --- mentors --> 
					<tr>
						<th>No</th>
						<th>Seat No:</th>
						<th>Total Price:</th>
						<th>Dept Date</th>
						<th>Nationality</th>	
					</tr>	
				</thread>
				@php 
				$i = 1;
				@endphp
				<tbody>
																						
						<tr>
							<td>{{$i++}}</td>
							<td>{{$booking->seat_no}}</td>
							<td>{{$booking->total_price}}</td>
							<td>{{$booking->dept_date}}</td>
							<td>{{$booking->nation_id}}</td>
						</tr>
	
		</tbody>	
	</table>
</form>
	</div>
@endsection