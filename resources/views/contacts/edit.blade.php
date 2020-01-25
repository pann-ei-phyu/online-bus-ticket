@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i></h2>
		</div>
		<div class="col-lg-2">
			<!-- <a href="{{route('contacts.create')}}" class="btn btn-dark">Add New</a> -->
		</div>
	</div>
	<div class="container-fluid">
		<form>
			<div class="form-group">
				<label>Email:</label>
			<input type="Email" name="email" class="form-control" value="{{$contacts->email}}">
			</div>

			<div class="form-group">
				<label>Message:</label>
				<textarea class="form-control" style="height: 200px;"></textarea>
			</div>
			<div class="form-group">
				<button class="btn btn-info">Send</button>
			</div>
		</form>
	</div>
</div>
@endsection
