<?php

namespace App\Http\Controllers;

use App\Dish;
use App\DishType;
use App\Http\Requests\DishRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAllowed', ['except' => ['index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishTypes = DishType::with(['dishes' => function ($dish) { $dish->orderBy('name'); }])
          ->orderBy('id')
          ->get();

      return view('dish/index', compact('dishTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $dish = new Dish;
      $dishTypes = DishType::orderBy('id')->get();
      return view('dish/create', compact('dish'))->with('dishTypes', $dishTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
      $dish = new Dish($request->all());


      if ($request->hasFile('image')) {
        
        $image = $request->file('image');
        $validator = Validator::make($request->all(), $dish->rules, $dish->messages);

        if ($validator->fails()) {
          return redirect()->route('dishes.create')->withErrors($validator)->withInput();
        }

        elseif ($image->isValid()) {
          $dish->image = $image->store('public/images/dish');
        }

      }


      $dish->save();
      return redirect()->route('dishes.index')->with('success','Add success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
      $dishTypes = DishType::orderBy('id')->get();
      return view('dish/edit',compact('dish'))->with('dishTypes', $dishTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, Dish $dish)
    {
      if (!$request->is_available) {
        $request->merge(['is_available' => false]);
      }


      $dish->update($request->all());


      if ($request->hasFile('image')) {
        
        $image = $request->file('image');
        $validator = Validator::make($request->all(), $dish->rules, $dish->messages);

        if ($validator->fails()) {
          return redirect()->route('dishes.edit', $dish->id)->withErrors($validator)->withInput();
        }

        elseif ($image->isValid()) {
          Storage::delete($dish->image);
          $dish->image = $image->store('public/images/dish');
          $dish->save();
        }

      }


      return redirect()->route('dishes.index')->with('success','Edit is success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
      if ($dish->image != NULL)
      {
        Storage::delete($dish->image);
      }

      $dish->delete();
      return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function discardPicture(Dish $dish)
    {
      if ($dish->image != NULL)
      {
        Storage::delete($dish->image);
      }

      $dish->image = NULL;
      $dish->save();
      return "ok";
    }
}
