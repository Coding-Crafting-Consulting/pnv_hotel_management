@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit room {$room['number']}"]
  )

@endsection


@section('content')

  @include(
    'room/_form',

    [
      'errors'           =>  $errors,
      'action'           =>  URL::action('RoomController@update', $room->id),
      'room'             =>  $room,
      'roomSizes'        =>  $roomSizes,
      'equipments'       =>  $equipments,
      'roomEquipmentIds' =>  $roomEquipmentIds
    ]
  )

@endsection