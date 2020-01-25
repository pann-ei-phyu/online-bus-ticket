@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Customer List</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('customers.create')}}" class="btn btn-dark">Add New</a>
		</div>
	</div>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
		<thead class="table bg-info">
			<!-- compact --- mentors -->
			<tr>
				<th>No</th>
				<th>Traveller Name:</th>
				<th>Gender:</th>
				<th>Email:</th>
				<th>Phone:</th>
				<th>Note:</th>
				<th>Edit:</th>
				<th>Detail:</th>
				<th>Detail:</th>
			</tr>	
		</thread>
		@php 
		$i = 1;
		@endphp
		<tbody>
			@foreach($customers as $customer)
		
			<tr>
				<td>{{$i++}}</td>
				<td>{{$customer->name}}</td>
				<td>{{$customer->gender}}</td>
				<td>{{$customer->email}}</td>
				<td>{{$customer->phone}}</td>
				<td>{{$customer->note}}</td>
				<td>
					<a href="{{route('customers.edit',$customer->id)}}"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<a href="{{route('customers.show',$customer->id)}}"><i class="fas fa-tasks text-info" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<form method="post" action="{{route('customers.destroy',$customer->id)}}">
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