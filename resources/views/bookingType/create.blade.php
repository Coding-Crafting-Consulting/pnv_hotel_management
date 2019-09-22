@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add a new booking type"]
  )

@endsection


@section('content')

  @include(
    'bookingType/_form',

    [
      'errors'             =>  $errors,
      'action'             =>  URL::action('BookingTypeController@store'),
      'bookingType'        =>  $bookingType,
      'onlinePlateforms'   =>  $onlinePlateforms
    ]
  )

@endsection