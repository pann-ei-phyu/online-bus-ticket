@extends('template')
@section('content')
<!-- main content -->
<div class="container booking">
	<!-- search form -->
	<div class="card my-2 text-left">
		<div class="card-header">
			<h5 style="font-weight: normal;">Search Trip</h5>
		</div>
		<div class="card-body">
			<form action="{{route('search')}}" method="post" name="mainform" class="form">
				@csrf
				<div class="row">
					<div class="form-group col-12 col-md-3">
						<label for="leavingfrom">Leaving From</label>
						<select class="form-control" id="leavingfrom" required="required" name="leavingfrom">
							<option >{{$leavingfrom}}</option> 
							@foreach($cities as $city)
							<option value="{{$city->name}}">
								{{$city->name}}
							</option>
							@endforeach

						</select>		
					</div>
					<div class="form-group col-12 col-md-3">
						<label for="goingto">Going To</label>
									<select class="form-control" id="goingto" required="required" name="goingto">
										<option>{{$goingto}}</option>
										@foreach($cities as $city)
											<option value="{{$city->name}}">
												{{$city->name}}
											</option>
											@endforeach
									</select>
					</div>
					<div class="form-group col-6 col-md">
						<label for="depaturedate">Depature Date</label>
						<input type="text" name="date" value="{{$date}}" id="depaturedate" class="form-control" placeholder="Pick a Date" required="required">	
					</div>

					<div class="form-group col-6 col-md">
						<label for="noseats">No of Seats</label>
						<select class="form-control" id="noseats" required="required" name="noseats">
							<option >{{$noseats}}</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<div class="form-group col-6 col-md">
						<label for="nationality">Nationality</label>
						<select class="form-control" id="nationality" required="required" name="nationality">
							<option >{{$nationality}}</option>
							@foreach($nations as $nation)
							<option value="{{$nation->id}}">
								{{$nation->type}}
							</option>
							@endforeach
						</select>
					</div>
						<div class="form-group col-6 col-md">
						<label class="text-light">.</label>
						<button class="btn btn-outline-info form-control" type="submit" id="submit">SearchNow</button>
					</div>
				</div>		
			</form>
		</div>
	</div>
	<!-- time category -->
	<div class="row mb-2">
		<div class="col-lg-3 col-md-3 col-sm-12 d-none d-md-block">
			<div class="card">
				<div class="card-header">
					<h5>Time</h5>
				</div>
				<div class="card-body">
					<input type="radio" name="radio" id="anytimebtn" value="Anytime" checked="checked"> <label>Anytime</label><br>
					<input type="radio" name="radio" id="daybusbtn" value="Day Bus"> <label>Day Bus</label><br>
					<input type="radio" name="radio" id="nightbusbtn" value="Night Bus"> <label>Night Bus</label>
				</div>
			</div>
		</div>
		<!-- show routes bus -->
		<div class="col-lg-9 col-md-9 col-sm-12">
			<div class="card my-1">
				<div class="card-body" id="anytime1">
					<?php foreach ($car_routes as $key => $value ){
						if($value->fname == $leavingfrom && $value->tname == $goingto){
							?>
							<div class="row">
								<div class="col-md-4 col-12 my-3">
									{{$value->time}}
									<span>-</span>{{$value->bname}}<br>
									<p class="my-1">{{$leavingfrom}}-{{$goingto}}</p>
									<p><span class="mx-2"></span>Evening Bus</p>
								</div>
								<div class="col-md-4 col-6 text-center my-3">
									<img src="{{$value->clogo}}" width="100px" height="50px;">
									<p class="my-2">{{$value->cname}}</p>
								</div>
								<div class="col-md-4 col-6 text-center">
									<p class="text-info" style="font-size:25px;">{{$price=$noseats * $value->price}}MMK</p>
									<p>{{$noseats}}seats <span>x</span>{{$value->price}}</p>
									<a href="{{route('routedetail',['id'=>$value->id,'total'=>$price,'date'=>$date,'noseats'=>$noseats])}}" class="btn btn-info selectseat">Select Seats</a>
								</div>
							</div>
						<?php }
					} ?>
				</div>
				<!-- morning -->
				<div class="card-body" id="morning1">
					<?php foreach ($morning_car_routes as $key => $value ){
						if($value->fname == $leavingfrom && $value->tname == $goingto){
							?>
							<div class="row">
								<div class="col-md-4 col-12 my-3">
									{{$value->time}}
									<span>-</span>{{$value->bname}}<br>
									<p class="my-1">{{$leavingfrom}}-{{$goingto}}</p>
									<p><span class="mx-2"></span>Morning Bus</p>
								</div>
								<div class="col-md-4 col-6 text-center my-3">
									<img src="{{$value->clogo}}" width="100px" height="50px;">
									<p class="my-2">{{$value->cname}}</p>
								</div>
								<div class="col-md-4 col-6 text-center">
									<p class="text-info" style="font-size:25px;">{{$price=$noseats * $value->price}}MMK</p>
									<p>{{$noseats}}seats <span>x</span>{{$value->price}}</p>
									<a href="{{route('routedetail',['id'=>$value->id,'total'=>$price,'date'=>$date,'noseats'=>$noseats])}}" class="btn btn-info selectseat">Select Seats</a>
									
								</div>
						</div>
						<?php }
					} ?>
				</div>
				<!-- evening -->
				<div class="card-body" id="evening1">
					<?php foreach ($evening_car_routes as $key => $value ){
						if($value->fname == $leavingfrom && $value->tname == $goingto){
							?>
							<div class="row">
								<div class="col-md-4 col-12 my-3">
									{{$value->time}}
									<span>-</span>{{$value->bname}}<br>
									<p class="my-1">{{$leavingfrom}}-{{$goingto}}</p>
									<p><span class="mx-2"></span>Evening Bus</p>
								</div>
								<div class="col-md-4 col-6 text-center my-3">
									<img src="{{$value->clogo}}" width="100px" height="50px;">
									<p class="my-2">{{$value->cname}}</p>
								</div>
								<div class="col-md-4 col-6 text-center">
									<p class="text-info" style="font-size:25px;">{{$price=$noseats * $value->price}}MMK</p>
									<p>{{$noseats}}seats <span>x</span>{{$value->price}}</p>
									<a href="{{route('routedetail',['id'=>$value->id,'total'=>$price,'date'=>$date,'noseats'=>$noseats])}}" class="btn btn-info selectseat">Select Seats</a>
								</div>
							</div>
						<?php }
					} ?>
				</div>
			</div>		
		</div>
	</div>
</div>
@endsection	
@section('script')
<script type="text/javascript">
	$('document').ready(function(){
		$('#anytime1').show();
		$('#morning1').hide();
		$('#evening1').hide();
		$('#anytimebtn').click(function(){
			$('#anytime1').show();
			$('#morning1').hide();
			$('#evening1').hide();
		});
		$('#daybusbtn').click(function(){
			$('#anytime1').hide();
			$('#morning1').show();
			$('#evening1').hide();
		});
		$('#nightbusbtn').click(function(){
			$('#anytime1').hide();
			$('#morning1').hide();
			$('#evening1').show();
		});
	})
</script>
@endsection
