<?php

namespace App\Http\Controllers;

use App\VipCard;
use App\UserType;
use App\User;
use App\Http\Requests\VipCardRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class VipCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vipCards = VipCard::orderBy('point', 'desc')->get();
      return view('vipCard/index', compact('vipCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $vipCard = new vipCard;

      $users = user::orderBy('last_name')
        ->orderBy('middle_name')
        ->orderBy('first_name')
        ->orderBy('title_id')
        ->get();
      
      return view('vipCard/create', compact('vipCard'))->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VipCardRequest $request)
    {
      $vipCard = new VipCard($request->all());
      $vipCard->save();
      return redirect()->route('vipCards.index')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vipCard  $vipCard
     * @return \Illuminate\Http\Response
     */
    public function show(vipCard $vipCard)
    {
      return view('vipCard/show', compact('vipCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vipCard  $vipCard
     * @return \Illuminate\Http\Response
     */
    public function edit(vipCard $vipCard)
    {
      return view('vipCard/edit',compact('vipCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vipCard  $vipCard
     * @return \Illuminate\Http\Response
     */
    public function update(VipCardRequest $request, vipCard $vipCard)
    {
      $vipCard->update($request->all());
      return redirect()->route('vipCards.index')->with('success','Edit successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vipCard  $vipCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(vipCard $vipCard)
    {
      if ($vipCard->image != NULL)
      {
        Storage::delete($vipCard->image);
      }

      $vipCard->delete();
      return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vipCard  $vipCard
     * @return \Illuminate\Http\Response
     */
    public function discardPicture(vipCard $vipCard)
    {
      if ($vipCard->image != NULL)
      {
        Storage::delete($vipCard->image);
      }

      $vipCard->image = NULL;
      $vipCard->save();
      return "ok";
    }
}
