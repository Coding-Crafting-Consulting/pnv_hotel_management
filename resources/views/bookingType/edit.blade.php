@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$bookingType['label']}"]
  )

@endsection


@section('content')

  @include(
    'bookingType/_form',
    
    [
      'errors' => $errors,
      'action' => URL::action('BookingTypeController@update', $bookingType->id),
      'bookingType' => $bookingType,
      'onlinePlateforms' => $onlinePlateforms
    ]
  )

@endsection