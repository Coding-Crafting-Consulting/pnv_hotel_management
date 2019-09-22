@extends('_layouts.app')

@section('header')

  @include(
    '_layouts.showHeader',
    ['title' => "Edit {$company['label']}"]
  )

@endsection


@section('content')

  @include(
    'company/_form',

    [
      'errors'      =>  $errors,
      'action'      =>  URL::action('CompanyController@update', $company->id),
      'company'        =>  $company
    ]
  )

@endsection