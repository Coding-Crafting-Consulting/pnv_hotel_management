<?php

namespace App\Http\Controllers;

use App\BookingType;
use App\OnlinePlateform;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\BookingTypeRequest;
use Input,File;
use DB;     
use Session;

class BookingTypeController extends Controller
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
      $bookingTypes = BookingType::all();
      return view('bookingType/index', compact('bookingTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bookingType = new BookingType;
      $onlinePlateforms = OnlinePlateform::orderBy('id')->get();
      return view('bookingType/create', compact('bookingType'))->with('onlinePlateforms', $onlinePlateforms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingTypeRequest $request)
    {
      $bookingType = new BookingType($request->all());
      $bookingType->save();
      return redirect()->route('bookingTypes.index')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(BookingType $bookingType)
    {
      return view('bookingType/show', compact('bookingType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingType $bookingType)
    {
      $onlinePlateforms = OnlinePlateform::orderBy('id')->get();
      return view('bookingType/edit',compact('bookingType','onlinePlateforms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(BookingTypeRequest $request, BookingType $bookingType)
    {
      
      $bookingType->update($request->all());
      return redirect()->route('bookingTypes.index')->with('success','Update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingType $bookingType)
    {
      $bookingType->delete();
      return "ok";
    }

}
