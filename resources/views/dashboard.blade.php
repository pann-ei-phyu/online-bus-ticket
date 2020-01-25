@extends('backendtemplate')
@section('content')


<div class="container-fluid my-3">

  <!-- Page Heading -->
  <h2 class="ml-3"><i class="fas fa-fw fa-tachometer-alt 5x pr-3" ></i>Dashboard</h2>
          <div class="row">

            <!--  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-primary text-uppercase mb-1">TODAY BOOKING</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bookingcount}}</div>
                    </div>
                    <div class="col-auto">
                      <a class="nav-link" href="dashboard"><i class="fas fa-address-book fa-2x text-gray-300">
                      </i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-success text-uppercase mb-1">ROUTE LIST</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$routecount}}</div>
                    </div>
                    <div class="col-auto">
                      <a class="nav-link" href="car_routes"><i class="fas fa-route fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-info text-uppercase mb-1">CITIES LIST</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$citycount}}</div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <a class="nav-link" href="cities"><i class="fas fa-city fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-m font-weight-bold text-warning text-uppercase mb-1">COMPANIES LIST</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$companycount}}</div>
                    </div>
                    <div class="col-auto">
                      <a class="nav-link" href="companies"><i class="fas fa-building fa-2x text-gray-300"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-10">
                  <h4 class="m-0 font-weight-bold text-info">Today Booking Lists</h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                  <thead class="table bg-info">
                    <tr>
                      <th>No</th>
                      <th>Route</th>
                      <th>Seat No</th>
                      <th>Total Price</th>
                      <th>Dept Date</th>
                      <th>Nationality</th>
                      <th style="width: 60px;">Edit</th>
                      <th style="width: 60px;">Detail</th>
                      <th style="width: 60px;">Delete</th>  
                    </tr> 
                  </thread>

                  @php 
                  $i = 1;
                  @endphp
                  <tbody>
                    @foreach($bookings as $booking)

                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$booking->toname}} - {{$booking->fromname}}</td>
                      <td>{{$booking->seat_no}}</td>
                      <td>{{$booking->total_price}}</td>
                      <td>{{$booking->dept_date}}</td>
                      <td>{{$booking->ntype}}</td>
                      <td>
                        <a href="{{route('bookings.edit',$booking->id)}}" class="text-info"><i class="fas fa-user-edit" style="font-size: 30px;"></i>Edit</a>
                      </td>
                      <td>
                        <a href="{{route('bookings.show',$booking->id)}}" class="text-info" ><i class="fas fa-tasks" style="font-size: 30px;"></i></a>
                      </td>
                      <td>
                        <form method="post" action="{{route('bookings.destroy',$booking->id)}}" class="d-inline">
                          <!--   -->
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

        <!-- /.container-fluid -->
@endsection