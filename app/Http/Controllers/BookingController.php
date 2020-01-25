<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Booking;
use DB;
use App\Customer;
use App\City;
use App\Nation;
use App\C_route;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *.
     0.
     
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        

        $bookings = DB::table('bookings')
                    ->leftjoin('nations AS A','A.id','=','bookings.nation_id')
                    ->leftjoin('c_routes AS B','B.id','=','bookings.route_id')
                    ->leftjoin('cities AS C','C.id','=','B.to')
                    ->leftjoin('cities AS D','D.id','=','B.from')
                    ->select('bookings.*','A.type as ntype','C.name as fromname','D.name as toname')
                    ->get();
        // $bookings = DB::table('bookings')
        //     ->join('customers', 'bookings.id', '=', 'customers.booking_id')
        //     ->select('bookings.*')
        //     ->get();
        //$bookings = Booking::all();
        // $c_route = C_route::all(); //Mentor is Model class

        return view('bookings.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $bookings = Booking::all();
        // $nations = Nation::all(); 
        $nations = Nation::all();
     
        return view('bookings.create',compact('nations','bookings','nations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            //'namem'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'note'=>'required'
        ]);
        //$id,$carname,$fname,$tname,$date,$time,$price,$nation,$seatno
        $booking = new Booking;
        $booking->route_id = request('id');
        $booking->nation_id = request('nation');
        $booking->seat_no = request('seat'); 
        $booking->total_price = request('price'); 
        $booking->dept_date = request('date');
        $booking->save();
        $customers = new Customer;
        $customers->booking_id = $booking->id;
        $customers->name = request('name');
        $customers->gender = request('gender');
        $customers->email = request('email');
        $customers->phone = request('phone');
        $customers->note = request('note');
        $customers->save();
        $email = request('email');
        //email
       $booking = DB::table('customers')
                     ->leftjoin('bookings AS A','A.id','=','customers.booking_id')
                     ->leftjoin('nations AS B','B.id','=','A.nation_id')
                     ->leftjoin('c_routes AS C','C.id','=','A.route_id')
                     ->leftjoin('cities AS D','D.id','=','C.to')
                     ->leftjoin('cities AS E','E.id','=','C.from')
                     ->leftjoin('bus_types AS F','F.id','=','C.bus_type_id')
                     ->join('companies AS G', 'G.id', '=', 'C.company_id')
                    ->join('users AS H', 'H.id', '=', 'G.user_id')
                    ->where('customers.email', '=', $email)
                    ->select('A.*','B.type as ntype','D.name as toname','E.name as fromname','C.time as ctime','F.name as btname','H.name as opname','customers.name as custname')
                    ->get();
         //dd($booking);
       
       $subject = 'Online MM Bus Ticket';
       $body = '';
     //dd($email.$subject.$body);
     Mail::to($email)->send(new SendMail($subject,$body,$booking));
       
     //Session::flash("success");
        //return
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        //obj 
        return view('bookings.detail',compact('booking'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        //obj 
        return view('bookings.edit',compact('booking'));
        // compact -> to send data to edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'seatno' => 'required',
            'price' => 'required',
            'date' => 'required' 
        ]);
        $booking = Booking::find($id);
        $booking->route_id = 1;
        $booking->seat_no = request('seatno'); 
        $booking->total_price = request('price');  
        $booking->dept_date = request('date');
        $booking->save();

        // return
        return redirect()->route('bookings.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}
