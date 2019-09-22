@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$equipment['label']}"]
  )

@endsection


@section('content')

  @include(
    'equipment/_form',
    
    [
      'errors' => $errors,
      'action' => URL::action('EquipmentController@update', $equipment->id),
      'equipment' => $equipment
    ]
  )

@endsection