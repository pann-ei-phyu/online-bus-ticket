@extends('backendtemplate')
@section('content')
	<div class="container-fluid my-3">
		<h2>Nation Details
		</h2>
		<form action="{{route('nations.show',$nation->id)}}" 
		enctype="multipart/form-data">
			 @csrf	 
		<table class="table table-sm">
				<thread>
					<!-- compact --- mentors --> 
					<tr>
						<th>No</th>
						<th>Type</th>	
					</tr>	
				</thread>
				@php 
				$i = 1;
				@endphp
				<tbody>
																						
						<tr>
							<td>{{$i++}}</td>
							<td>{{$nation->type}}</td>
						</tr>
		</tbody>	
	</table>
</form>
	</div>
@endsection