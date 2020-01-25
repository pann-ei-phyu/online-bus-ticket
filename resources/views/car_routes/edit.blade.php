@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">
		Update Bus Routes
	</h2>
	<div class="card p-5">
		<form action="{{route('car_routes.update',$car_route->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
				
			<div class="form-group">
				<label for="name">Company ID:</label>
				<select class="form-control" name="company_id">
					@foreach($companies as $company)
					<option value="{{$company->id}}" {{$company->id == $car_route->company_id ? 'selected' : '' }}>
						{{$company->user->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="email">From:</label>
				<select class="form-control" name="from">
					@foreach($cities as $city)
					<option value="{{$city->id}}" {{$city->id == $car_route->from ? 'selected' : '' }}>
						{{$city->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="website">To:</label>
				<select class="form-control" name="to">
					@foreach($cities as $city)
					<option value="{{$city->id}}" {{$city->id == $car_route->to ? 'selected' : '' }}>
						{{$city->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="phone">Time:</label>
				<input type="text" class="form-control" id="time" name="time" value="{{$car_route->time}}">
			</div>
			<div class="form-group">
				<label for="bus_type_id">Bus Type ID:</label>
				<select class="form-control" name="bus_type_id">
					@foreach($bustypes as $bustype)
					<option value="{{$bustype->id}}" {{$bustype->id == $car_route->bus_type_id ? 'selected' : '' }}>
						{{$bustype->id}}
					</option>
					@endforeach
				</select>
			
			</div>
			<div class="form-group">
				<label for="phone">Price:</label>
				<input type="text" class="form-control" name="price" value="{{$car_route->price}}">
			</div>
			<div class="form-group">
				<label for="photo">Seats</label>
				<input type="text" class="form-control"  name="seat" value="{{$car_route->seat}}">
			</div>
			<div class="form-group">
				<input type="submit" name="btnsave" value="Update" class="btn btn-success">
			</div>
		</form>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('document').ready(function () {
				$('#time').timepicker({
				timeFormat: 'h:mm p',
			    interval: 30,
			    minTime: '6',
			    maxTime: '10:00pm',
			 	scrollbar: true
			});
	})
</script>	
@endsection