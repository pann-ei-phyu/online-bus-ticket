@extends('backendtemplate')
@section('content')
	<div class="container-fluid my-3">
		<h2>Customer Details
		</h2>
		<form action="{{route('customers.show',$customer->id)}}" 
		enctype="multipart/form-data">
			 @csrf	 
		<table class="table table-sm">
				<thread>
					<!-- compact --- mentors --> 
					<tr>
						<th>No</th>
						<th>Traveller Name:</th>
						<th>Gender:</th>
						<th>Email:</th>
						<th>Phone:</th>
						<th>Note:</th>	
					</tr>	
				</thread>
				@php 
				$i = 1;
				@endphp
				<tbody>
																						
						<tr>
							<td>{{$i++}}</td>
							<td>{{$customer->name}}</td>
							<td>{{$customer->gender}}</td>
							<td>{{$customer->email}}</td>
							<td>{{$customer->phone}}</td>
							<td>{{$customer->note}}</td>
						</tr>
	
		</tbody>	
	</table>
</form>
	</div>
@endsection