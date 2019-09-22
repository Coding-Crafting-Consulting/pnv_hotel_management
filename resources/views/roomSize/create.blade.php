@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add a new room size"]
  )

@endsection


@section('content')

  @include(
    'roomSize/_form',
    ['errors' => $errors, 'action' => URL::action('RoomSizeController@store'), 'roomSize' => $roomSize]
  )

@endsection