<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Booking;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $customers = Customer::all(); //Mentor is Model class

        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $bookings = Booking::all();
        //Mentor is Model class

        return view('customers.create',compact('customers','bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'note' => 'required' 
        ]);
        //if file, upload
        //store data (students,student)  

    
       

        $customer = new Customer;
        $customer->booking_id  = 1;
        $customer->name = request('name');
        $customer->gender = request('gender'); 
        $customer->email = request('email'); 
        $customer->phone = request('phone'); 
        $customer->note = request('note'); 
        $customer->save();
        //return
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        //obj 
        return view('customers.detail',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        //obj 
        return view('customers.edit',compact('customer'));
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'note' => 'required' 
        ]);
        $customer = Customer::find($id);
        $customer->name = request('name'); 
        $customer->gender = request('gender');  
        $customer->email = request('email'); 
        $customer->phone = request('phone'); 
        $customer->note = request('note');
        $customer->save();

        // return
        return redirect()->route('customers.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
