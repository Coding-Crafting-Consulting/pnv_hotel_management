<?php

namespace App\Http\Controllers;

use App\RoomSize;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Requests\RoomSizeRequest;
use Input,File;
use DB;     
use Session;

class RoomSizeController extends Controller
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
      $roomSizes = RoomSize::all();
      return view('roomSize/index', compact('roomSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roomSize = new RoomSize;
      return view('roomSize/create', compact('roomSize'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomSizeRequest $request)
    {
        RoomSize::create($request->all());
        return redirect()->route('roomSizes.index')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomSize  $roomSize
     * @return \Illuminate\Http\Response
     */
    public function show(RoomSize $roomSize)
    {
        return view('roomSize/show',compact('roomSize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomSize  $roomSize
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomSize $roomSize)
    {
        return view('roomSize/edit',compact('roomSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomSize  $roomSize
     * @return \Illuminate\Http\Response
     */
    public function update(RoomSizeRequest $request, RoomSize $roomSize)
    {
        $roomSize->update($request->all());
        return redirect()->route('roomSizes.index')->with('success','Edit is success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomSize  $roomSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomSize $roomSize)
    {
        $roomSize->delete();
        return "ok";
    }
}
