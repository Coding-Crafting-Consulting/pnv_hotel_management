@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$dishType['label']}"]
  )

@endsection


@section('content')

  @include(
    'dishType/_form',
    
    [
      'errors' => $errors,
      'action' => URL::action('DishTypeController@update', $dishType->id),
      'dishType' => $dishType
    ]
  )

@endsection