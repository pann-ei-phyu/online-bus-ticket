@extends('backendtemplate')
@section('content')
<div class="container">
	<h2 class="text-center">
		New Bus Routes
	</h2>
	<div class="card p-5">
		<form action="{{route('car_routes.store')}}" method="post" enctype="multipart/form-data">
			@csrf
				
			<div class="form-group">
				<label for="name">Company ID:</label>
				<select class="form-control" name="company_id">
					@foreach($companies as $company)
					<option value="{{$company->id}}">
						{{$company->user->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="Form">From:</label>
				<select class="form-control" name="from">
					@foreach($cities as $city)
					<option value="{{$city->id}}">
						{{$city->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="To">To:</label>
				<select class="form-control" name="to">
					@foreach($cities as $city)
					<option value="{{$city->id}}">
						{{$city->name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="time">Time:</label>
				<input type="text" name="time" id="time" class="form-control">


				 <!-- <select class="form-control" id="time" required="required" name="time">
					<option disabled="disabled">Select</option>
					<option value="7:00 AM">7:00 AM</option>
					<option value="8:00 AM">8:00 AM</option>
					<option value="6:00 PM">6:00 PM</option>
					<option value="7:00 PM">7:00 PM</option>
					</select>  -->

					<!-- for time picker -->
            		<!-- <div class="form-group">
                		<div class='input-group date' id='datetimepicker3'>
                   			<input type='text' class="form-control" />
                   			 <span class="input-group-addon">
                        	<span class="glyphicon glyphicon-time"></span>
                    		</span>
                		</div>
           			</div> -->
        	</div> 
	       
			<div class="form-group">
				<label for="bus_type_id">Bus Type ID:</label>
				<select class="form-control" name="bus_type_id">
					@foreach($bustypes as $bustype)
					<option value="{{$bustype->id}}">
						{{$bustype->name}}
					</option>
					@endforeach
				</select>
			
			</div>
			<div class="form-group">
				<label for="phone">Price:</label>
				<input type="text" class="form-control" name="price">
			</div>
			<div class="form-group">
				<label for="photo">Seats</label>
				<input type="text" class="form-control"  name="seat">
			</div>
			<div class="form-group">
				<input type="submit" name="btnsave" value="Save" class="btn btn-success">
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