@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Nationality List</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('nations.create')}}" class="btn btn-dark">Add New</a>
		</div>
	</div>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
		<thead class="table bg-info">
			<tr>
				<th>No:</th>
				<th>Name:</th>
				<th>EditL:</th>	
				<th>Detail:</th>
				<th>Delete:</th>	
			</tr>
		</thread>
		@php 
		$i = 1;
		@endphp
		<tbody>
			@foreach($nations as $nation)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$nation->type}}</td>
				
				<td>
					<a href="{{route('nations.edit',$nation->id)}}"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<a href="{{route('nations.show',$nation->id)}}"><i class="fas fa-tasks text-info" style="font-size: 30px;"></i></a>
				</td>
				<td>
					<form method="post" action="{{route('nations.destroy',$nation->id)}}">
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