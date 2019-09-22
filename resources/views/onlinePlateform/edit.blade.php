@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$onlinePlateform['label']}"]
  )

@endsection

@section('content')

  @include(
    'onlinePlateform/_form',
    
    [
      'errors' => $errors,
      'action' => URL::action('OnlinePlateformController@update', $onlinePlateform->id),
      'onlinePlateform' => $onlinePlateform
    ]
    
  )

@endsection