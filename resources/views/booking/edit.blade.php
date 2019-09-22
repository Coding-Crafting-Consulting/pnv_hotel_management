@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit reservation {$booking['id']}"]
  )

@endsection


@section('content')

  @include(
    'booking/_form',

    [
      'errors'           =>  $errors,
      'action'           =>  URL::action('BookingController@update', $booking->id),
      'booking'             =>  $booking,
      'rooms'        =>  $rooms,
      'bookingTypes'       =>  $bookingTypes,
      'bookingPurposes' =>  $bookingPurposes
    ]
  )

@endsection