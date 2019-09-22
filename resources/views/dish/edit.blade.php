@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$dish['name']}"]
  )

@endsection


@section('content')

  @include(
    'dish/_form',

    [
      'errors'      =>  $errors,
      'action'      =>  URL::action('DishController@update', $dish->id),
      'dish'        =>  $dish,
      'dishTypes'   =>  $dishTypes
    ]
  )

@endsection