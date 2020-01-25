<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Illuminate\Support\Facades\Hash;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $companies = Company::all(); 
       return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $subjects = Subject::all();
        return view('companies.create');
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
            
            'name'=>'required',
            'email'=>'required',
            //'namem'=>'required',
            'phone'=>'required',
            'logo'=>'required',
            'address'=>'required',
            'owner_name'=>'required'
        ]);
        //If file include,upload
        if($request->hasfile('logo')){
            $photo = $request->file('logo');
            $filename =time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/company/logo/',$filename);
            $profile = '/company/logo/'.$filename;
        }
        $user = new User;
        $user->name =request('name');
        $user->email= request('email');
        $user->password=Hash::make('123456789');
        $user->save();

        $company = new Company;

        //$company->namem =request('namem');
        $company->phone =request('phone');
        $company->logo = $profile;
        $company->address =request('address');
        $company->owner_name =request('owner_name');
        $company->user_id = $user->id;
        $company->save();
        return redirect()->route('companies.index');

        //$user->assignRole('Mentor');

        //$mentor = new Mentor;
        //$mentor->user_id=$user->id;
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
         $company = Company::find($id);
         return view('companies.edit',compact('company'));

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
            
            'name'=>'required',
            'email'=>'required',
            //'namem'=>'required',
            'phone'=>'required',
            //'logo'=>'required',
            'address'=>'required',
            'owner_name'=>'required'
        ]);
        //If file include,upload
        if($request->hasfile('logo')){
            $photo = $request->file('logo');
            $filename =time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/company/logo/',$filename);
            $profile = '/company/logo/'.$filename;
        }
        else{
            $profile = request('oldlogo');
        }
        $user = User::find($id);
        $user->name =request('name');
        $user->email= request('email');
        $user->password=Hash::make('123456789');
        $user->save();

        $company =Company::find($id);

        //$company->namem =request('namem');
        $company->phone =request('phone');
        $company->logo = $profile;
        $company->address =request('address');
        $company->owner_name =request('owner_name');
        $company->user_id = $user->id;
        $company->save();
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $user_id = $company['user_id'];
        $user = User::find($user_id);
        $user->delete();
        $company->delete();
        return redirect()->route('companies.index');
    }
}
