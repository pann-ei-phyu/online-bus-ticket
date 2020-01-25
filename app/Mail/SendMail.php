<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sub;
    public $message;
    public $booking;
    public function __construct($subject,$body,$booking)
    {
      $this->sub = $subject;
      $this->message= $body;
      $this->booking= $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_body = $this->message;
        $e_booking = $this->booking;
        foreach ($e_booking as $booking){
            $bookings=$booking;

        }
        
        $from=$bookings->fromname;
        $to=$bookings->toname;
        $seatno=$bookings->seat_no;
        $price=$bookings->total_price;
        $deptdate=$bookings->dept_date;
        $ctime=$bookings->ctime;
        $bustype=$bookings->btname;
        $operatorname=$bookings->opname;
        $customername=$bookings->custname;
        //dd($customername,$operatorname,$bustype);
        
        //dd($from,$to,$seatno,$price,$deptdate);
        //dd($book);
        //dd($e_booking);
        return $this->view('mail.sendmail',compact("e_body"))
            ->subject($e_subject)
            ->with(compact('from','to','seatno','price','deptdate','ctime','bustype','operatorname','customername'));
    }
    public function booking()
    {
        return $this->belongsTo('App\Bookings');
    }
    
}
