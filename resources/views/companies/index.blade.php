@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2 class="text-left"><i class="fas fa-tasks"></i>Companies List</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('companies.create')}}" class="btn btn-dark">Add New</a>
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
								<th>Phone</th>
								<th>Logo</th>
								<th>Address</th>
								<th>User_id</th>
								<!-- <th>Detail</th> -->
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i = 1;
							@endphp
							@foreach($companies as $company)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$company->user->name}}</td>
								<td>{{$company->phone}}</td>
								<td><img src="{{$company->logo}}" width="80" height="70"></td>
								<td>{{$company->address}}</td>
								<td>{{$company->user_id}}</td>
								<!-- <td>
									<a href="#detailModal" class="btn btn-info detail" >Detail</a>
								</td> -->
								<td>
									<a href="{{route('companies.edit',$company->id)}}"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a>
								</td>
								<td>
									<form action="{{route('companies.destroy',$company->id)}}" method="post" class="d-inline">
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
			</div>
		</div>
	</div>
				<div class="modal" tabindex="-1" role="dialog" id="detailModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Modal body text goes here.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>

				@section('script')
				<script type="text/javascript">
					$(document).ready(function () {
						$('.detail').click(function () {
			//alert('0k');
			$('#detailModal').modal('show');
		})

					})
				</script>
				@endsection
				@endsection
