@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">
			Bus Type Edit Form
		</h2>
	<div class="card p-3">
		
		<form action="{{route('bustypes.update',$bustype->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')

			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="form-control" value="{{$bustype->name}}">
			</div>
			<div class="form-group">

				<input type="submit" name="btnsubmit" class="btn btn-info" value="Update">
			</div>
		</form>
	</div>
</div>
@endsection