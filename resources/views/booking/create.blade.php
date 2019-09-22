@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add a new reservation"]
  )

@endsection


@section('content')

  @include(
    'booking/_form',

    [
      'errors'              =>  $errors,
      'action'              =>  URL::action('BookingController@store'),
      'booking'             =>  $booking,
      'users'               =>  $users,
      'bookingTypes'        =>  $bookingTypes,
      'room'                =>  $room,
      'rooms'               =>  $rooms,
      'bookingPurposes'     =>  $bookingPurposes      
    ]
  )

@endsection