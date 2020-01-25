@extends('backendtemplate')
@section('content')
<div class="container-fluid my-3">
	<div class="row">
		<div class="col-lg-10">
			<h2>
			<i class="fas fa-tasks"></i>Bus Type Lists
			</h2>
		</div>
		<div class="col-lg-2">
			<a href="{{route('bustypes.create')}}" class="btn btn-dark">Add New</a>
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
                      <th style="width: 60px;">Edit</th>
                     <!--  <th style="width: 60px;">Detail</th> -->
                      <th style="width: 60px;">Delete</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @php
			$i=1;
			@endphp
			@foreach($bustypes as $bustype)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$bustype->name}}</td>
				<td><a href="{{route('bustypes.edit',$bustype->id)}}" class="text-info"><i class="fas fa-user-edit text-success" style="font-size: 30px;"></i></a></td>
				<!-- <td><a href="" class="text-warning"><i class="fas fa-info-circle" style="font-size: 30px;"></i></a></td> -->
				<td><form action="{{route('bustypes.destroy',$bustype->id)}}" method="post" class="d-inline">
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
</div>
@endsection