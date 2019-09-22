<?php

namespace App\Http\Controllers;

use App\OnlinePlateform;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\OnlinePlateformRequest;
use Input,File;
use DB;     
use Session;

class OnlinePlateformController extends Controller
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
        $onlinePlateforms = OnlinePlateform::all();
        return view('onlinePlateform/index', compact('onlinePlateforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $onlinePlateform = new OnlinePlateform;
        return view('onlinePlateform/create', compact('onlinePlateform'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OnlinePlateformRequest $request)
    {
        OnlinePlateform::create($request->all()); 
        
        return redirect()->route('onlinePlateforms.index')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OnlinePlateform  $onlinePlateform
     * @return \Illuminate\Http\Response
     */
    public function show(OnlinePlateform $onlinePlateform)
    {
        return view('onlinePlateform/show',compact('onlinePlateform'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OnlinePlateform  $onlinePlateform
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlinePlateform $onlinePlateform)
    {
        return view('onlinePlateform/edit',compact('onlinePlateform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OnlinePlateform  $onlinePlateform
     * @return \Illuminate\Http\Response
     */
    public function update(OnlinePlateformRequest $request, OnlinePlateform $onlinePlateform)
    {
        $onlinePlateform->update($request->all());
        return redirect()->route('onlinePlateforms.index')->with('success','Update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OnlinePlateform  $onlinePlateform
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlinePlateform $onlinePlateform)
    {
        $onlinePlateform->delete();
        return "ok";
    }
}
