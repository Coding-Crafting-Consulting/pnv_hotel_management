<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomSize;
use App\Equipment;
use App\RoomsEquipment;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\EquipmentRequest;
use App\Http\Requests\RoomSizeRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use Input,File;
use DB;     
use Session;     


class roomController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAllowed', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roomSizes = RoomSize::with(['rooms' => function ($room) { $room->orderBy('number'); }])
          ->orderBy('id')
          ->get();

      return view('room/index', compact('roomSizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $room = new Room;
      $roomSizes = RoomSize::orderBy('id')->get();
      $equipments = Equipment::orderBy('label')->get();

      $roomEquipmentIds = $room->equipments
        ->map(function($equipment, $key){
          return $equipment->id;
        })
      ->toArray();

      return view(
        'room/create',
        compact('room', 'roomSizes', 'equipments', 'roomEquipmentIds')
      );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
      $room = new Room($request->all());
      $room->save();

      // saving equipment linked to the room
      if ($request->input('equipment_id') != NULL) {
        foreach ($request->input('equipment_id') as $equipmentId) {
          $roomsEquipment = new RoomsEquipment;
          $roomsEquipment->room_id = $room->id;
          $roomsEquipment->equipment_id = $equipmentId;
          $roomsEquipment->save();
        }
      }

      return redirect()->route('rooms.index')->with('success','Add success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
      return view('room/show', compact('room'));
      return redirect()->route('rooms.index')->with('success','Add success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
      $roomSizes = RoomSize::orderBy('id')->get();
      $equipments = Equipment::orderBy('label')->get();
        
      $roomEquipmentIds = $room->equipments
        ->map(function($equipment, $key){
          return $equipment->id;
        })
      ->toArray();
      return view(
        'room/edit',
        compact('room', 'roomSizes', 'equipments', 'roomEquipmentIds')
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
      $room->update($request->all());

      $equipmentIds = $request->input('equipment_id');

      $roomEquipmentIds = $room->equipments
          
          ->map(function($equipment, $key){
              return $equipment->id;
            })

          ->toArray();


      if ($equipmentIds == NULL) {
        $equipmentIds = [];
      }

      foreach ($equipmentIds as $equipmentId) {
        if(!in_array($equipmentId, $roomEquipmentIds)) {
          $roomsEquipment = new RoomsEquipment;
          $roomsEquipment->room_id = $room->id;
          $roomsEquipment->equipment_id = $equipmentId;
          $roomsEquipment->save();
        }
      }

      foreach ($roomEquipmentIds as $roomEquipmentId) {
        if(!in_array($roomEquipmentId, $equipmentIds)) {
          $roomsEquipments = RoomsEquipment::where('room_id', $room->id)->where('equipment_id', $roomEquipmentId)->get();

          foreach ($roomsEquipments as $roomsEquipment) {
            $roomsEquipment->delete();
          }
        }
      }

      return redirect()->route('rooms.index')->with('success','Edit is success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
      $room->delete();
      return "ok";
    }
}
