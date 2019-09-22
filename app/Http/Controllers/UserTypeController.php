<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\UserTypeRequest;
use Input,File;
use DB;     
use Session;

class UserTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAllowed');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::all();
        return view('userType/index', compact('userTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userType = new UserType;
        return view('userType/create',compact('userType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeRequest  $request)
    {
        UserType::create($request->all());
        return redirect()->route('userTypes.index')->with('success','Success'); // Lay dia chi cua phan as ben route
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        // $userType = UserType::find($id); => NO NEED BECAUSE YOU ALREADY HAVE IT
        return view('userType/show',compact('userType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit(UserType $userType)
    {
        // $userType = UserType::find($id); => NO NEED BECAUSE YOU ALREADY HAVE IT
        return view('userType/edit',compact('userType'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeRequest $request, UserType $userType)
    {
        $userType->update($request->all());
        return redirect()->route('userTypes.index')->with('success','Update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $userType)
    {
        $userType->delete();
        return "ok";
    }
}
