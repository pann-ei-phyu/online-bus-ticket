<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\C_route;
use App\Bus_type;
use App\City;
use DB;
use App\Company;

class car_routeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth',['index']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_routes = DB::table('c_routes')
                    ->leftjoin('cities AS A','A.id','=','c_routes.to')
                    ->leftjoin('cities AS B','B.id','=','c_routes.from')
                    ->join('bus_types AS C','C.id' ,'=','c_routes.bus_type_id')
                    ->join('companies', 'companies.id', '=', 'c_routes.company_id')
                    ->join('users', 'users.id', '=', 'companies.user_id')
                    ->select('c_routes.*','A.name as cname','B.name as fname','C.name as bname','users.name as dname')
                    ->get();
        return view('car_routes.index',compact('car_routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car_routes = C_route::all();
        $bustypes = Bus_type::all();
        $cities = City::all();
        // $bustype = Bus_type::orderBy('name')->get();
        // $cities = City::orderBy('name')->get();
        $companies = Company::all();
        return view('car_routes.create',compact('car_routes','bustypes','companies','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car_routes = new C_route;
        $car_routes->company_id= request('company_id');
        $car_routes->from= request('from');
        $car_routes->to= request('to');
        $car_routes->time= request('time');
        $car_routes->bus_type_id= request('bus_type_id');
        $car_routes->price= request('price');
        $car_routes->seat= request('seat');

        $car_routes->save();

        return redirect()->route('car_routes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $car_routes = C_route::find($id);
        //obj 
        return view('car_routes.detail',compact('car_routes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car_route = C_route::find($id);
        $companies = Company::all();
        $bustypes = Bus_type::all();
        $cities = City::all();
        return view('car_routes.edit',compact('car_route','companies','bustypes','cities'));
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
            'company_id'    =>'required',
            'from'          =>'required',
            'to'            =>'required',
            'time'          =>'required',
            'bus_type_id'   =>'required',
            'price'         =>'required',
            'seat'          =>'required'
        ]);

        $car_routes = C_route::find($id);
        $car_routes->company_id= request('company_id');
        $car_routes->from= request('from');
        $car_routes->to= request('to');
        $car_routes->time= request('time');
        $car_routes->bus_type_id= request('bus_type_id');
        $car_routes->price= request('price');
        $car_routes->seat= request('seat');
        $car_routes->save();

        return redirect()->route('car_routes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_routes = C_route::find($id);
        $car_routes->delete();
        return redirect()->route('car_routes.index');
    }
}
