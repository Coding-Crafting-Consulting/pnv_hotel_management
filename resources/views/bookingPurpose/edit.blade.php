@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$bookingPurpose['label']}"]
  )

@endsection


@section('content')

  @include(
    'bookingPurpose/_form',
    
    [
      'errors' => $errors,
      'action' => URL::action('BookingPurposeController@update', $bookingPurpose->id),
      'bookingPurpose' => $bookingPurpose
    ]
  )

@endsection