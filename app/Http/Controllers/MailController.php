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


class MailController extends Controller
{
   public function mail(){
   	return view('mail.index');
   }
   public function sendmail(Request $get){
   	 $email = $get->email;
   	 $subject = $get->subject;
   	 $body = $get->body;
       

       
       $booking = DB::table('customers')
                     ->leftjoin('bookings AS A','A.id','=','customers.booking_id')
                     ->leftjoin('nations AS B','B.id','=','A.nation_id')
                     ->leftjoin('c_routes AS C','C.id','=','A.route_id')
                     ->leftjoin('cities AS D','D.id','=','C.to')
                     ->leftjoin('cities AS E','E.id','=','C.from')
                    ->where('customers.email', '=', $email)
                    ->select('A.*','B.type as ntype','D.name as toname','E.name as fromname','C.time as ctime')
                    ->get();
         //dd($booking);
       
       
   	 //dd($email.$subject.$body);
   	 Mail::to($email)->send(new SendMail($subject,$body,$booking));
       
   	 //Session::flash("success");

       
       
     

   }
}
