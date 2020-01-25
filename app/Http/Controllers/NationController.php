<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nation;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $nations = Nation::all(); //Mentor is Model class

        return view('nations.index',compact('nations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nations.create');
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
            'type' => 'required'
        ]);

        // //if file, upload
        // //store data (students,student)
        $nation = new Nation;
        $nation->type = request('type'); 
        $nation->save();
        

        //return
        return redirect()->route('nations.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $nation = Nation::find($id);
        //obj 
        return view('nations.detail',compact('nation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nation = Nation::find($id);
        //obj 
        return view('nations.edit',compact('nation'));
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
            'type' => 'required'
        ]);
        $nation = Nation::find($id);
        $nation->type = request('type');
        $nation->save();

        // return
        return redirect()->route('nations.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $nation = Nation::find($id);
        $nation->delete();
        return redirect()->route('nations.index');
    }
}
