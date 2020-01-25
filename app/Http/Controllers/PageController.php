<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Nation;
use DB;
use App\Booking;
use App\C_route;

class PageController extends Controller
{
    public function home($value='')
    {
        $cities = City::all();
        $nations = Nation::all();
    	return view('index',compact('cities','nations'));
    }
    public function contact($value='')
    {
    	return view('contact');
    }
  public function search(Request $request)
    {   

        $cities = City::all();
        $nations = Nation::all();
        $leavingfrom = request('leavingfrom');
        $goingto = request('goingto');
        $date = request('date');
        $noseats = request('noseats');
        $nationality = request('nationality');
        //dd($leavingfrom);
        /*$car_routes = DB::table('c_routes')
                    ->leftjoin('cities AS A','A.id','=','c_routes.to')
                    ->leftjoin('cities AS B','B.id','=','c_routes.from')
                    ->select('c_routes.*','A.name as cname','B.name as fname')
                    ->get();*/
        /*$croutes = DB::table('c_routes')
            ->join('companies', 'companies.id', '=', 'c_routes.company_id')
            ->join('users', 'users.id', '=', 'companies.user_id')
            ->select('c_routes.*', 'users.name as cname', 'companies.logo as clogo')
            ->get();*/

        $car_routes = DB::table('c_routes')
                    ->leftjoin('cities AS A','A.id','=','c_routes.to')
                    ->leftjoin('cities AS B','B.id','=','c_routes.from')
                    ->join('companies', 'companies.id', '=', 'c_routes.company_id')
                    ->join('users', 'users.id', '=', 'companies.user_id')
                    ->join('bus_types','bus_types.id','=','c_routes.bus_type_id')
                    ->select('c_routes.*','A.name as tname','B.name as fname', 'users.name as cname', 'companies.logo as clogo','bus_types.name as bname')
                    ->get();


        $morning_car_routes = DB::table('c_routes')
                    ->leftjoin('cities AS A','A.id','=','c_routes.to')
                    ->leftjoin('cities AS B','B.id','=','c_routes.from')
                    ->join('companies','companies.id','=','c_routes.company_id')
                    ->join('users','users.id','=','companies.user_id')
                    ->join('bus_types','bus_types.id','=','c_routes.bus_type_id')
                    ->select('c_routes.*','A.name as tname','B.name as fname','users.name as cname','companies.logo as clogo','bus_types.name as bname')
                    ->where('time','LIKE','%AM%')
                    ->get();
        $evening_car_routes = DB::table('c_routes')
                    ->leftjoin('cities AS A','A.id','=','c_routes.to')
                    ->leftjoin('cities AS B','B.id','=','c_routes.from')
                    ->join('companies','companies.id','=','c_routes.company_id')
                    ->join('users','users.id','=','companies.user_id')
                    ->join('bus_types','bus_types.id','=','c_routes.bus_type_id')
                    ->select('c_routes.*','A.name as tname','B.name as fname','users.name as cname','companies.logo as clogo','bus_types.name as bname')
                    ->where('time','LIKE','%PM%')
                    ->get(); 
            //dd($car_routes);
            /*$bus_type = DB::table('c_routes')
                    ->join('bus_types','bus_types.id','=','c_routes.bus_type_id')
                    ->select('c_routes.*','bus_types.name')
                    ->get();*/

            /*foreach ($croutes as $key => $value) {
            $croute = $value->cname;

        }*/
        //dd($nationality);
        return view('search',compact('leavingfrom','goingto','date','noseats','nationality','cities','nations','car_routes','bus_type','morning_car_routes','evening_car_routes'));
    }

    public function routedetail($id,$total,$date,$noseats)
    {   
        //dd($id,$total,$date);
         $route = C_route::find($id);
         $seats = $route->seat;
         $company_id = $route->company_id;
         $price = $total;
         $date = $date;
         $id = $id;
         $noseats = $noseats;
         //$bookings = Booking::all();
         //dd($bookings);
         $booking = DB::table('bookings')->where([
            ['dept_date','=',$date],
            ['route_id','=',$id]
         ])
         ->select('bookings.seat_no as seatno')
         ->get();
         // dd($booking);

         $bookseatno = array();
         foreach($booking as $b){
            $bookseatno = array_merge($bookseatno,explode(',', $b->seatno));
         }
         //$arr = Array($booking);
         // $bookseatno = explode(',', $booking);
         // dd($bookseatno);
        // dd($seats);
         //return view('vieww');
        return view('selectseat',compact('route','seats','price','date','id','noseats','bookseatno'));
    }
    public function customerinfo(Request $request)
    {  
        $id =request('id');
        $carname = request('carname');
        $fname = request('fname');
        $tname = request('tname');
        $date = request('date');
        $price = request('price');
        $time = request('time');
        $nation = request('nation');
        //dd($nation);
        $seat = request('seatno');

        //$i = $seat;
        // dd($seats);
        return view('customerinfo',compact('id','carname','fname','tname','date','price','time','nation','seat'));
    }
    
     public function dashboard($value='')
    {
        
        $bookingcount=DB::table('bookings')->whereDate('created_at','=',today()->toDateString())->count();
        $bookings = DB::table('bookings')
                    ->leftjoin('nations AS A','A.id','=','bookings.nation_id')
                    ->leftjoin('c_routes AS B','B.id','=','bookings.route_id')
                    ->leftjoin('cities AS C','C.id','=','B.to')
                    ->leftjoin('cities AS D','D.id','=','B.from')

                    ->select('bookings.*','A.type as ntype','C.name as fromname','D.name as toname')
                    ->whereDate('bookings.created_at','=',today()->toDateString())
                    ->get();
        $routecount=DB::table('c_routes')->count();
        $citycount=DB::table('cities')->count();
        $companycount=DB::table('companies')->count();

        
        return view('dashboard',compact('bookings','bookingcount','routecount','citycount','companycount'));
    }
}
