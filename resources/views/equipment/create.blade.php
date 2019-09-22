@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add a piece of equipment"]
  )

@endsection


@section('content')

  @include(
    'equipment/_form',
    ['errors' => $errors, 'action' => URL::action('EquipmentController@store'), 'equipment' => $equipment]
  )

@endsection