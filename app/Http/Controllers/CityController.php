<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cities = City::all(); //City is Model class

        return view('cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
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
            // 'profile' => 'required'
        ]);

        // //if file, upload

        // If file include, upload

        // if($request->hasFile('profile'))
        // {
        //  $photo = $request->file('profile');
        // $filename = time().'.'.$photo->getClientOriginalExtension();
        // $photo->move(public_path().'/storage/profile/',$filename);
        // $profile = '/storage/profile/'.$filename;
        // }

        // //store data (students,student)
        $city = new City ;
        $city->name = request('name'); 
        // $city->profile = $profile;
        $city->save();
        
        //return
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cities.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $city = City::find($id);
        //obj 
        return view('cities.edit',compact('city'));
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
            // 'profile' => 'required'
        ]);

        // //if file, upload

        // If file include, upload
        // if($request->hasFile('profile'))
        // {
        //  $photo = $request->file('profile');
        // $filename = time().'.'.$photo->getClientOriginalExtension();
        // $photo->move(public_path().'/storage/profile/',$filename);
        // $profile = '/storage/profile/'.$filename;
        // }else{
        //     $profile = request('oldprofile');

        // }
        
        // //store data (students,student)
        $city = City::find($id);
        $city->name = request('name'); 
        // $city->profile = $profile;
        $city->save();
        
        //return
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->route('cities.index');
    }
}
