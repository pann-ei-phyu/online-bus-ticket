<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus_type;
class BusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bustypes=Bus_type::all();
        return view('bustypes.index',compact('bustypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bustypes=Bus_type::all();
        return view('bustypes.create',compact('bustypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name'=>'required'
        ]);
        $bustype= new Bus_type;
        $bustype->name=request('name');
        $bustype->save();

        return redirect()->route('bustypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bustype= Bus_type::find($id); //get object
        return view('bustypes.edit',compact('bustype'));
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
        //dd($request);
        $request->validate([
            'name'=>'required'
        ]);
        $bustype= Bus_type::find($id);
        $bustype->name=request('name');
        $bustype->save();

        return redirect()->route('bustypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bustype = Bus_type::find($id);
        $bustype->delete();
        return redirect()->route('bustypes.index');
    }
}
