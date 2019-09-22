@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.header',
    ['title' => "Add a new VIP card"]
  )

@endsection


@section('content')

  @include(
    'vipCard/_form',

    [
      'errors'      =>  $errors,
      'action'      =>  URL::action('VipCardController@store'),
      'vipCard'     =>  $vipCard,
      'users'       =>  $users
    ]
  )

@endsection