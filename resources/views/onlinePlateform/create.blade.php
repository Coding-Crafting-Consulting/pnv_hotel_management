@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Add an online booking plateform"]
  )

@endsection


@section('content')

  @include(
    'onlinePlateform/_form',
    ['errors' => $errors, 'action' => URL::action('OnlinePlateformController@store'), 'onlinePlateform' => $onlinePlateform]
  )

@endsection