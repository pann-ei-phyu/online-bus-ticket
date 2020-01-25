@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Contacts List</h2>
		</div>
		<div class="col-lg-2">
			<!-- <a href="{{route('contacts.create')}}" class="btn btn-dark">Add New</a> -->
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
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Message</th>
								<!-- <th>Reply</th> -->
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i = 1;
							@endphp
							@foreach($contacts as $contact)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$contact->name}}</td>
								<td>{{$contact->email}}</td>								
								<td>{{$contact->phone}}</td>								
								<td>{{$contact->note}}</td>
								<!-- <td>
									<a href="mail"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
								</td> -->
								<td>
									<form method="post" action="{{route('contacts.destroy',$contact->id)}}">
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
