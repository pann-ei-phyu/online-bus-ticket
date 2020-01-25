@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<h2 class="text-left">
		New Bus Type Create
	</h2>
	<div class="card p-5">

		<form action="{{route('bustypes.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Bus Type Name:</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">	
					<input type="submit" name="btnsubmit" class="btn btn-success" value="Submit">
				</div>		
		</form>
	</div>
</div>
@endsection