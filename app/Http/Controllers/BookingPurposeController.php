<?php

namespace App\Http\Controllers;

use App\BookingPurpose;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\BookingPurposeRequest;
use Input,File;
use DB;     
use Session;

class BookingPurposeController extends Controller
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
        $bookingPurposes = BookingPurpose::all();
        return view('bookingPurpose/index', compact('bookingPurposes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookingPurpose = new BookingPurpose;
        return view('bookingPurpose/create', compact('bookingPurpose'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingPurposeRequest $request)
    {
        $bookingPurpose = new BookingPurpose($request->all()); // ten model
        $bookingPurpose->save();
        return redirect()->route('bookingPurposes.index')->with('success','Success!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function show(BookingPurpose $bookingPurpose)
    {
        return view('bookingPurpose/show',compact('bookingPurpose'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingPurpose $bookingPurpose)
    {
        return view('bookingPurpose/edit',compact('bookingPurpose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function update(BookingPurposeRequest $request, BookingPurpose $bookingPurpose)
    {
        $bookingPurpose->update($request->all());
        return redirect()->route('bookingPurposes.index')->with('success','Update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingPurpose  $bookingPurpose
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingPurpose $bookingPurpose)
    {
        $bookingPurpose->delete();
        return "ok";
    }
}
