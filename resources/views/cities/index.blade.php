@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>City List</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('cities.create')}}" class="btn btn-dark">Add New</a>
		</div>
	</div>
	<div class="container-fluid">
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >

						<thead class="table bg-info">
							<!-- compact --- mentors -->

							<tr>
								<th>No:</th>
								<th>City Name:</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>

						</thread>
						@php 
						$i = 1;
						@endphp
						<tbody>
							@foreach($cities as $city)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$city->name}}</td>
								<!-- <td><img src="{{$city->profile}}" width="100" height="100" ></td> -->

								<td>
									<a href="{{route('cities.edit',$city->id)}}"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
								</td>
								<td>
									<form method="post" action="{{route('cities.destroy',$city->id)}}">
										
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
			</div>
		</div>
	</div>
</div>
@endsection