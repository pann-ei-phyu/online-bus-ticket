@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Route List</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('car_routes.create')}}" class="btn btn-dark">Add New</a>
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
								<th>Conpany</th>
								<th>From</th>
								<th>To</th>
								<th>Time</th>
								<th>Price</th>
								<th>Bus Type</th>
								<th>Total Seats</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i = 1;
							@endphp
							@foreach($car_routes as $car_route)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$car_route->dname}}</td>
								<td>{{$car_route->fname}}</td>								
								<td>{{$car_route->cname}}</td>								
								<td>{{$car_route->time}}</td>
								<td>{{$car_route->price}}</td>
								<td>{{$car_route->bname}}</td>
								<td>{{$car_route->seat}}</td>
								<td>
									<a href="{{route('car_routes.edit',$car_route->id)}}"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
								</td>
								<td>
									<form method="post" action="{{route('car_routes.destroy',$car_route->id)}}">
										@csrf
										@method("DELETE")
										
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
