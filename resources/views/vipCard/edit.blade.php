@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.header',
    ['title' => "Edit VIP card"]
  )

@endsection


@section('content')

  @include(
    'vipCard/_form',

    [
      'errors'      =>  $errors,
      'action'      =>  URL::action('VipCardController@update', $vipCard->id),
      'vipCard'     =>  $vipCard
    ]
  )

@endsection