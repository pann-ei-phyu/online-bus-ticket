@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Booking List</h2>
		</div>
		<div class="col-lg-2">
			<!-- <a href="{{route('bookings.create')}}" class="btn btn-dark">Add New</a> -->
		</div>
	</div>
	<div class="container-fluid">
		

	<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="table bg-info">
					<tr>
						<th>No</th>
						<th>Route</th>
						<th>Seat No:</th>
						<th>Total Price:</th>
						<th>Dept Date:</th>
						<th>Nationality:</th>
						<th style="width: 60px;">Edit</th>
						<th style="width: 60px;">Detail</th>
						<th style="width: 60px;">Delete</th>	
					</tr>	
				</thread>

		@php 
		$i = 1;
		@endphp
		<tbody>
			@foreach($bookings as $booking)
		
			<tr>
				<td>{{$i++}}</td>
				<td>{{$booking->fromname}} - {{$booking->toname}}</td>
				<td>{{$booking->seat_no}}</td>
				<td>{{$booking->total_price}}</td>
				<td>{{$booking->dept_date}}</td>
				<td>{{$booking->ntype}}</td>
				<td>
					<a href="{{route('bookings.edit',$booking->id)}}" class="text-info"><i class="fas fa-user-edit" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<a href="{{route('bookings.show',$booking->id)}}" class="text-info" ><i class="fas fa-tasks" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<form method="post" action="{{route('bookings.destroy',$booking->id)}}" class="d-inline">
						<!-- $mentor->id  -->
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-link"><i class="fas fa-trash-alt text-danger" style="font-size: 25px;"></i> </button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>	
	</table>
</div>
@endsection